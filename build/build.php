<?php
/**
 * Script used to build Joomla language packages based on the core-translations repo
 * Final packages will be placed into build/tmp/packages
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
 * 1. Run from CLI as: 'php buid/build.php --lpackages --cmsversion "4.3.3" --dodelcopy"
 * 2. Check the tmp/packages directory.
 *
 * Notes:
 *  There is an "dodelcopy" option for a reason. When you build the packages more than once using that
 *  option you can avoid the deletion and copy of the tmp folder over and over again which
 *  can take a significant amout of time. In that case the recommendation would be do a mannually copy
 *  of the files and folders into the tmp folder. When this option is set the 'time' folder directly
 *  under 'build/tmp' is set to the name "20230817", please create it and put the copy there.
 *
 * Examples:
 * - php build/build.php --lpackages --v --cmsversion "4.3.3"
 * - php build/build.php --lpackages --v --cmsversion "4.3.3" --languages "de-DE"
 * - php build/build.php --lpackages --v --cmsversion "4.3.3" --languages "de-DE,de-AT,fr-FR"
 * - php build/build.php --lpackages --v --cmsversion "4.3.3" --languages "de-DE,de-AT,fr-FR" --dodelcopy
 * 
 * @package    Joomla.Language
 * @copyright  (C) 2023 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// This script is largly based on the Joomla CMS build Script and on the JGerman Build Script
// https://github.com/joomla/joomla-cms/blob/4.0.0/build/build.php
// https://github.com/joomlagerman/joomla/blob/4.3.2v1/build/build.php

const PHP_TAB = "\t";

// Set path to git binary (e.g., /usr/local/git/bin/git or /usr/bin/git)
ob_start();
passthru('which git', $systemGit);
$systemGit = trim(ob_get_clean());

// Make sure file and folder permissions are set correctly
umask(022);

// Parse input options
$options = getopt('vh', ['help', 'lpackages', 'v', 'dodelcopy', 'cmsversion:', 'languages:', 'lpackageversion:']);

$showHelp          = isset($options['help']);
$languagePackages  = isset($options['lpackages']);
$verbose           = isset($options['v']);
$cmsVersion        = $options['cmsversion'] ?? false;
$optBuildLanguages = $options['languages'] ?? false;
$lpackVersion      = $options['lpackageversion'] ?? '1';
$doDelCopy         = isset($options['dodelcopy']) ?? false;

if ($languagePackages === false)
{
    printMessage('ERROR: The --lpackages option is for now the only feature so therefor required!');
    printUsage($argv[0]);
    exit;
}

if ($cmsVersion === false)
{
    printMessage('ERROR: The --cmsversion option is required!');
    printUsage($argv[0]);
    exit;
}

// Shortcut the paths to the repository root and build folder
$repo = dirname(__DIR__);
$here = __DIR__;
$time = time();

if ($doDelCopy === false)
{
    // Set a fixed date when we dont copy all the time: 17. August 2005
    $time = '20050817';
}

// Set paths for the build packages
$tmp      = $here . '/tmp';
$fullpath = $tmp . '/' . $time;

if ($showHelp)
{
    printUsage($argv[0]);
    exit;
}

$remote = 'HEAD';
chdir($here);

printMessage('Start build based on "'. $remote . '"');
printMessage('The build base CMS version is "'. $cmsVersion . '"');

if ($doDelCopy)
{
    printMessage('Delete old release folder. This will take a while!');
    system('rm -rf ' . $tmp);
    mkdir($tmp);
    mkdir($fullpath);
}
else
{
    printMessage('WARNING!: The tmp folder has NOT been deleted! Reusing the existing files!');
}

chdir($repo);

if ($doDelCopy)
{
    printMessage('Copy the files from the git repository. This will take a while!');
    system($systemGit . ' archive ' . $remote . ' | tar -x -C ' . $fullpath);
}
else
{
    printMessage('WARNING!: The files have NOT been copied fresh. Reusing the existing files!');

    // Delete the packages we are about to build
    system('rm -rf ' . $tmp . '/packages');
    system('rm -rf ' . $tmp . '/tmp_packages');
    printMessage('The packages and tmp_packages folder have been deleted!');
}

// We only need this when we are building packages and it does not exist already
if ($languagePackages)
{
    system('mkdir packages');
    system('mkdir tmp_packages');
}

chdir($fullpath);

printMessage('Prepare the variables', $verbose);

$versionParts = explode('.', $cmsVersion);

$languagePackAndPatchVersion = $cmsVersion . 'v' . $lpackVersion;

// Set version information for the build
$majorVersion    = $versionParts[0];
$minorVersion    = $majorVersion . '.' . $versionParts[1];
$patchVersion    = $minorVersion . '.' . $versionParts[2];
$lreleaseVersion = $patchVersion . 'v' . $lpackVersion;

// The folder where we find the language packages
$lpackFolder = $fullpath . '/joomla_v' . $majorVersion . '/translations/package';

// Collect the languages to build based on the major version
$buildLanguages = array_filter(glob($lpackFolder . '/*'), 'is_dir');

// Reduce the full paths to just the language code by using the last folder in the path
array_walk(
    $buildLanguages,
    function (&$value, $key) {
        $valueParts = explode('/', $value);
        $value = end($valueParts);
    }
);

// Overwire the build languages when requested
if ($optBuildLanguages)
{
    // Make sure the list is an array
    $buildLanguages = explode(',', $optBuildLanguages);
}

chdir($tmp);

/*
 * Here we set the files/folders which should not be packaged at any time
 * These paths are from the repository root without the leading slash
 * Because this is a fresh copy from a git tag, local environment files may be ignored
 */
$doNotPackage = [
    '.git',
    '.github',
    '.gitattributes',
    '.gitignore',
    '.editorconfig',
    'Configurations',
    'joomla_v3', // That folder was never used
    'README.md',
    'build',
];

// Delete the files and folders we exclude from the packages (tests, docs, build, etc.).
printMessage('Delete folders not included in packages.', $verbose);

foreach ($doNotPackage as $removeFile)
{
    system('rm -rf ' . $time . '/' . $removeFile);
}

printMessage('Prepare packages.', $verbose);

if ($languagePackages)
{
    chdir('tmp_packages');

    foreach ($buildLanguages as $languageCode)
    {
        system('mkdir ' . $languageCode);
        chdir($languageCode);

        $lpackLanguageSourceFolder = $lpackFolder . '/'. $languageCode;
        // Set the admin, site, api folders
        $adminFolder = $lpackLanguageSourceFolder . '/administrator/language/' . $languageCode;
        $siteFolder  = $lpackLanguageSourceFolder . '/language/' . $languageCode;
        $apiFolder   = $lpackLanguageSourceFolder . '/api/language/' . $languageCode;
        
        printMessage('Build package: ' . $languageCode, $verbose);

        foreach (['full', 'admin', 'site', 'api'] as $folder)
        {
            $tmpLanguagePath = $tmp . '/tmp_packages/' . $languageCode;
            $tmpLanguagePathFolder = $tmp . '/tmp_packages/' . $languageCode . '/' . $folder;

            system('mkdir ' . $tmpLanguagePathFolder);

			if ($folder === 'full')
			{
				printMessage('Start prepare: "full" folder', $verbose);

                // Copy the pkg_[languageCode].xml file
                system('cp ' . $lpackLanguageSourceFolder . '/pkg_' . $languageCode . '.xml ' . $tmpLanguagePathFolder . '/pkg_' . $languageCode . '.xml');

                // Copy the script.php file when its supported.
                if (is_file($lpackLanguageSourceFolder . '/script.php'))
                {
                    system('cp ' . $lpackLanguageSourceFolder . '/script.php ' . $tmpLanguagePathFolder . '/script.php');
                }

                printMessage('End prepare: "full" folder', $verbose);

                // Skip to the next item this run is done
                continue;
            }

            if ($folder === 'admin' && is_dir($adminFolder))
            {
                printMessage('Start Build: admin_' . $languageCode . '.zip', $verbose);

                system('cp -r ' . $adminFolder . '/* ' . $tmpLanguagePathFolder);
                chdir($tmpLanguagePathFolder);
                system('zip -r ' . $tmpLanguagePath . '/full/admin_' . $languageCode . '.zip * > /dev/null');
                
                printMessage('End Build: admin_' . $languageCode . '.zip', $verbose);

                // Skip to the next item this run is done
                continue;
            }

            if ($folder === 'site' && is_dir($siteFolder))
            {
                printMessage('Start Build: site_' . $languageCode . '.zip', $verbose);
                
                system('cp -r ' . $siteFolder . '/* ' . $tmpLanguagePathFolder);
                chdir($tmpLanguagePathFolder);
                system('zip -r ' . $tmpLanguagePath . '/full/site_' . $languageCode . '.zip * > /dev/null');

                printMessage('End Build: site_' . $languageCode . '.zip', $verbose);

                // Skip to the next item this run is done
                continue;
            }

            if ($folder === 'api' && is_dir($apiFolder))
            {
                printMessage('Start Build: api_' . $languageCode . '.zip', $verbose);

                system('cp -r ' . $apiFolder . '/* ' . $tmpLanguagePathFolder);
                chdir($tmpLanguagePathFolder);
                system('zip -r ' . $tmpLanguagePath . '/full/api_' . $languageCode . '.zip * > /dev/null');
                
                printMessage('End Build: api_' . $languageCode . '.zip', $verbose);

                // Skip to the next item this run is done
                continue;
            }

            chdir('..');
        }

        // Build zip package
        chdir($tmpLanguagePath);

        printMessage('Start Build: ' . $languageCode . '_joomla_lang_full_' . $lreleaseVersion . '.zip', $verbose);

        system('zip -r ' . $tmpLanguagePath . '/full/full_' . $languageCode . '.zip * > /dev/null');
        system('cp ' . $tmpLanguagePath . '/full/full_' . $languageCode . '.zip ' . $tmp . '/packages/' . $languageCode . '_joomla_lang_full_' . $lreleaseVersion . '.zip');

        printMessage('End Build: ' . $languageCode . '_joomla_lang_full_' . $lreleaseVersion . '.zip', $verbose);

        chdir('../..');
    }
}

// Cleanup
printMessage('Remove tmp packages folder', $verbose);
system('rm -rf ' . $tmp . '/tmp_packages/');

printMessage('The Build of version ' . $patchVersion . ' has been successfully completed!');
printMessage('The following language code packages have been build:', $verbose);

foreach ($buildLanguages as $languageCode) {
    printMessage($languageCode, $verbose);
}

function printMessage(string $messagetext, $verbose = true) {
    if ($verbose)
    {
        echo '[' . date('d/m/Y H:i:s') . '] - ' . $messagetext . PHP_EOL;
    }
}

function printUsage(string $command) {
    echo PHP_EOL;
    echo 'Usage: php ' . $command . ' [options]' . PHP_EOL;
    echo '[options]:' . PHP_EOL;
    echo PHP_TAB . '--lpackages' . PHP_TAB . PHP_TAB . PHP_TAB . '(required) Build the language packages' . PHP_EOL;
    echo PHP_TAB . '--cmsversion "4.3.3"' . PHP_TAB . PHP_TAB . '(required) The base CMS Version this language pack build run is against.' . PHP_EOL;
    echo PHP_TAB . '--languages "de-DE,fr-FR,de-AT"' . PHP_TAB . 'Specify a comma seperated list of language packs to build. When its not set every aviable package is build' . PHP_EOL;
    echo PHP_TAB . '--lpackageversion "2"' . PHP_TAB . PHP_TAB . 'Set a specific language pack version when its not the first. When its not set we will use "1".' . PHP_EOL;
    echo PHP_TAB . '--dodelcopy' . PHP_TAB . PHP_TAB . PHP_TAB . 'Rebuild the tmp folder. Takes some time!' . PHP_EOL;
    echo PHP_TAB . '-v --verbose' . PHP_TAB . PHP_TAB . PHP_TAB . 'Show more detailed progress messages' . PHP_EOL;
    echo PHP_TAB . '-h --help' . PHP_TAB . PHP_TAB . PHP_TAB . 'Show this help output' . PHP_EOL;
    echo PHP_EOL;
}
