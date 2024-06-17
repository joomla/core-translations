<?php
/**
 * Script used to build Joomla distribution archive packages
 * Builds packages in tmp/packages folder (for example, 'build/tmp/packages')
 *
 * Note: the new package must be tagged in your git repository BEFORE doing this
 * It uses the git tag for the new version, not trunk.
 *
 * This script is designed to be run in CLI on Linux, Mac OS X and WSL.
 * Make sure your default umask is 022 to create archives with correct permissions.
 *
 * For WSL based setups make sure there is a /etc/wsl.conf with the following content:
 * [automount]
 * enabled=true
 * options=metadata,uid=1000,gid=1000,umask=022
 *
 * Steps:
 * 1. Run the bump script
 * 2. Commit the version changes
 * 3. Tag new release in the local git repository (for example, "git tag -s 4.1.0v1")
 * 3. Run from CLI as: 'php buid/build.php --lpackages"
 * 4. Check the tmp directory.
 *
 * Examples:
 * - php build/build.php --lpackages --v
 * - php build/build.php --crowdin --v
 * - php build/build.php --install --v
 * - php build/build.php --fullurl "https://github.com/joomla/joomla-cms/releases/download/4.1.0-rc1/Joomla_4.1.0-rc1-Release_Candidate-Full_Package.zip" --v
 * - php build/build.php --lpackages --v --tagversion "4.1.4v1"
 * - php build/build.php --crowdin --v --tagversion "4.1.4v1"
 * - php build/build.php --install --v --tagversion "4.1.4v1"
 * - php build/build.php --fullurl "https://github.com/joomla/joomla-cms/releases/download/4.1.0-rc1/Joomla_4.1.0-rc1-Release_Candidate-Full_Package.zip" --v  --tagversion "4.1.4v1"
 *
 * @package    Joomla.Language
 * @copyright  (C) 2023 J!German <https://www.jgerman.de>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// This script is largly based on the Joomla CMS build Script
// https://github.com/joomla/joomla-cms/blob/4.0-dev/build/build.php

const PHP_TAB = "\t";

// Make sure file and folder permissions are set correctly
umask(022);

// Set paths for the build packages
$tmp = __DIR__ . '/tmp';
$folderPackages = $tmp . '/packages';

// Parse input options
$options = getopt('', ['help', 'language:', 'v', 'lpversion:']);

// Get option variables
$showHelp    = isset($options['help']);
$language     = $options['language'] ?? 'all';
$lpVersion   = $options['lpversion'] ?? false;
$verbose     = isset($options['v']);

if ($showHelp)
{
    usage($argv[0]);
    exit;
}

if (!$lpVersion)
{
    message('The option "--lpversion" is required', true);
    exit;
}

$mainVersion = $lpVersion[0];
$creationDate = date('Y-m-d');
$buildPackageFolder = $folderPackages . $mainVersion;

message('Cleanup tmp folder', $verbose);
rmdir_recursive($tmp);

message('Start build of language packages: ' . $lpVersion . ' / ' . $language, $verbose);
mkdir($tmp);
mkdir($buildPackageFolder);

message('Prepare packages.', $verbose);

$sourceFolder = dirname(__DIR__) . '/joomla_v' . $mainVersion . '/translations/package';

// Get all files and directories inside the current directory
$allItems = scandir($sourceFolder);

// Initialize an array to hold only the directories
$directories = [];

// Loop through all items
foreach ($allItems as $item)
{
    // Ignore the current directory (.) and parent directory (..)
    if ($item === '.' || $item === '..')
    {
        continue;
    }

    if ($language !== 'all' && !(strpos($item, $language) === 0))
    {
        continue;
    }

    // Get the full path of the item
    $itemPath = $sourceFolder . DIRECTORY_SEPARATOR . $item;
    
    // Check if the item is a directory
    if (is_dir($itemPath))
    {
        // Add the directory to the array
        $directories[] = $item;
    }
}

// Show a message when more than one language code is going to be generated
if (count($directories) > 1)
{
    $message = '';

    foreach ($directories as $key => $languageCode)
    {
        $message .= $languageCode . ', ';
    }

    message('Build following languages: ' . substr_replace($message, '', -1), $verbose);
}

// Build the defined languages
foreach ($directories as $key => $languageCode)
{
    message('----- ' . $languageCode . ' -----', $verbose);
    message($languageCode . ': Build package: ' . $languageCode, $verbose);

    // Switch to the source folder
    chdir($sourceFolder . '/' . $languageCode);

    $buildPackageFolderTmp = $buildPackageFolder . '/tmp' . $languageCode;
    mkdir($buildPackageFolderTmp);

    // Copy all files to the tmp folder
    message($languageCode . ': Copy all files to the tmp folder', $verbose);
    system('cp -r * ' . $buildPackageFolderTmp);
    message($languageCode . ': Copied all files to the tmp folder', $verbose);

    // Generate the localise.php class name
    $localise = ucfirst(str_replace('-', '_', $languageCode)) . 'Localise';

    // Make sure the version and creation date is set.
    message($languageCode . ': Prepare XML and PHP files', $verbose);
    searchAndReplaceStringInXMLFiles($buildPackageFolderTmp, '<version/>', '<version>' . $lpVersion . '</version>');
    searchAndReplaceStringInXMLFiles($buildPackageFolderTmp, '<creationDate/>', '<creationDate>' . $creationDate . '</creationDate>');
    renameStringInFile($buildPackageFolderTmp . '/administrator/language/' . $languageCode . '/localise.php', 'En_GBLocalise', $localise);
    renameStringInFile($buildPackageFolderTmp . '/language/' . $languageCode . '/localise.php', 'En_GBLocalise', $localise);

    chdir($buildPackageFolder);

    // Build the language zip package
    message($languageCode . ': Build the language package zip file', $verbose);
    system('zip -r ' . $buildPackageFolder . '/' . $languageCode . '_joomla_lang_full_' . $lpVersion . '.zip * > /dev/null');

    // Remove tmp folder
    message($languageCode . ': Remove tmp folder', $verbose);
    rmdir_recursive($buildPackageFolderTmp);

    message($languageCode . ': The Build of ' . $languageCode . ' has been completed!', $verbose);
}

function message(string $messagetext, $verbose)
{
    if ($verbose)
    {
        echo $messagetext . PHP_EOL;
    }
}

function usage(string $command)
{
    echo PHP_EOL;
    echo 'Usage: php ' . $command . ' [options]' . PHP_EOL;
    echo PHP_TAB . '[options]:' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--fullurl "[URL]"' . PHP_TAB . 'The URL to the full en-GB package; When provided we also build a new full package' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--install' . PHP_TAB . PHP_TAB . 'Build the installation files' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--lpackages' . PHP_TAB . PHP_TAB . 'Build the language packages' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--v' . PHP_TAB . PHP_TAB . PHP_TAB . 'Show progress messages' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--crowdin' . PHP_TAB . PHP_TAB . 'Build the folder structure for crowdin updates' . PHP_EOL;
    echo PHP_TAB . PHP_TAB . '--help:' . PHP_TAB . PHP_TAB . PHP_TAB . 'Show this help output' . PHP_EOL;
    echo PHP_EOL;
}

function searchAndReplaceStringInXMLFiles($pathToFolder, $search, $replace)
{
	$directory = new RecursiveDirectoryIterator($pathToFolder);
	$iterator  = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::SELF_FIRST);

	foreach ($iterator as $file)
	{
		if ($file->isFile() && $file->getExtension() === 'xml')
		{
			renameStringInFile($file->getPathname(), $search, $replace);
		}
	}
}

function renameStringInFile($pathToFile, $search, $replace)
{
	// Read the entire string
	$str = file_get_contents($pathToFile);

	// Replace something in the file string - this is a VERY simple example
	$str = str_replace($search, $replace, $str);

	// Write the entire string
	file_put_contents($pathToFile, $str);
}

function rmdir_recursive($dir) {
    $it = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $it = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach($it as $file) {
        if ($file->isDir()) rmdir($file->getPathname());
        else unlink($file->getPathname());
    }
    rmdir($dir);
}
