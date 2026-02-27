#!/usr/bin/env php
<?php
/**
 * Joomla Translation Helper Script for ms-MY (Bahasa Melayu)
 * 
 * This script helps you manage translation progress by:
 * 1. Showing overall translation statistics
 * 2. Identifying untranslated strings in each file
 * 3. Generating a report of translation completeness
 * 
 * Usage:
 *   php translate_helper.php stats       - Show translation statistics
 *   php translate_helper.php missing     - Show missing translations per file
 *   php translate_helper.php file <name> - Show untranslated strings for a specific file
 *   php translate_helper.php copy        - Copy missing source strings to translation files (as English placeholders)
 */

$baseDir = __DIR__;
$sourceBase = $baseDir . '/joomla_v5/source';
$translationBase = $baseDir . '/joomla_v5/translations/package/ms-MY';

// Map source directories to translation directories
$mappings = [
    'language/en-GB' => [
        'source' => $sourceBase . '/language/en-GB',
        'target' => $translationBase . '/language/ms-MY',
        'label' => 'Site (Frontend)',
    ],
    'administrator/language/en-GB' => [
        'source' => $sourceBase . '/administrator/language/en-GB',
        'target' => $translationBase . '/administrator/language/ms-MY',
        'label' => 'Administrator (Backend)',
    ],
    'api/language/en-GB' => [
        'source' => $sourceBase . '/api/language/en-GB',
        'target' => $translationBase . '/api/language/ms-MY',
        'label' => 'API',
    ],
];

function parseIniStrings($filePath) {
    $strings = [];
    if (!file_exists($filePath)) return $strings;
    
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || $line[0] === ';') continue;
        if (preg_match('/^([A-Z][A-Z0-9_.-]*)="(.*)"$/', $line, $m)) {
            $strings[$m[1]] = $m[2];
        }
    }
    return $strings;
}

function getIniFiles($dir) {
    $files = [];
    if (!is_dir($dir)) return $files;
    
    $iterator = new DirectoryIterator($dir);
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'ini') {
            $files[] = $file->getFilename();
        }
    }
    sort($files);
    return $files;
}

$command = $argv[1] ?? 'stats';

switch ($command) {
    case 'stats':
        echo "=== Joomla 5 ms-MY Translation Statistics ===\n\n";
        
        $grandTotalSource = 0;
        $grandTotalTranslated = 0;
        $grandTotalFiles = 0;
        $grandTotalFilesComplete = 0;
        
        foreach ($mappings as $key => $mapping) {
            echo "--- {$mapping['label']} ---\n";
            
            $sourceFiles = getIniFiles($mapping['source']);
            $totalSource = 0;
            $totalTranslated = 0;
            $filesCount = 0;
            $filesComplete = 0;
            
            foreach ($sourceFiles as $file) {
                $sourceStrings = parseIniStrings($mapping['source'] . '/' . $file);
                $targetFile = $mapping['target'] . '/' . $file;
                $targetStrings = parseIniStrings($targetFile);
                
                $sourceCount = count($sourceStrings);
                $translatedCount = 0;
                
                foreach ($sourceStrings as $key2 => $value) {
                    if (isset($targetStrings[$key2]) && $targetStrings[$key2] !== $value) {
                        $translatedCount++;
                    }
                }
                
                $totalSource += $sourceCount;
                $totalTranslated += $translatedCount;
                $filesCount++;
                
                if ($translatedCount === $sourceCount && $sourceCount > 0) {
                    $filesComplete++;
                }
            }
            
            $pct = $totalSource > 0 ? round(($totalTranslated / $totalSource) * 100, 1) : 0;
            echo "  Files: {$filesCount} | Strings: {$totalTranslated}/{$totalSource} ({$pct}%)\n";
            echo "  Complete files: {$filesComplete}/{$filesCount}\n\n";
            
            $grandTotalSource += $totalSource;
            $grandTotalTranslated += $totalTranslated;
            $grandTotalFiles += $filesCount;
            $grandTotalFilesComplete += $filesComplete;
        }
        
        $grandPct = $grandTotalSource > 0 ? round(($grandTotalTranslated / $grandTotalSource) * 100, 1) : 0;
        echo "=== TOTAL ===\n";
        echo "  Files: {$grandTotalFiles} | Strings: {$grandTotalTranslated}/{$grandTotalSource} ({$grandPct}%)\n";
        echo "  Complete files: {$grandTotalFilesComplete}/{$grandTotalFiles}\n";
        break;
        
    case 'missing':
        echo "=== Files with Missing Translations ===\n\n";
        
        foreach ($mappings as $key => $mapping) {
            echo "--- {$mapping['label']} ---\n";
            
            $sourceFiles = getIniFiles($mapping['source']);
            
            foreach ($sourceFiles as $file) {
                $sourceStrings = parseIniStrings($mapping['source'] . '/' . $file);
                $targetFile = $mapping['target'] . '/' . $file;
                $targetStrings = parseIniStrings($targetFile);
                
                $missing = 0;
                foreach ($sourceStrings as $key2 => $value) {
                    if (!isset($targetStrings[$key2]) || $targetStrings[$key2] === $value) {
                        $missing++;
                    }
                }
                
                if ($missing > 0) {
                    $total = count($sourceStrings);
                    $done = $total - $missing;
                    $pct = round(($done / $total) * 100, 1);
                    echo "  {$file}: {$missing} missing ({$done}/{$total} = {$pct}%)\n";
                }
            }
            echo "\n";
        }
        break;
        
    case 'file':
        $fileName = $argv[2] ?? null;
        if (!$fileName) {
            echo "Usage: php translate_helper.php file <filename.ini>\n";
            echo "Example: php translate_helper.php file com_content.ini\n";
            exit(1);
        }
        
        echo "=== Untranslated strings in {$fileName} ===\n\n";
        
        foreach ($mappings as $key => $mapping) {
            $sourcePath = $mapping['source'] . '/' . $fileName;
            $targetPath = $mapping['target'] . '/' . $fileName;
            
            if (!file_exists($sourcePath)) continue;
            
            echo "--- {$mapping['label']} ---\n";
            $sourceStrings = parseIniStrings($sourcePath);
            $targetStrings = parseIniStrings($targetPath);
            
            $count = 0;
            foreach ($sourceStrings as $key2 => $value) {
                if (!isset($targetStrings[$key2]) || $targetStrings[$key2] === $value) {
                    echo "  {$key2}=\"{$value}\"\n";
                    $count++;
                }
            }
            
            if ($count === 0) {
                echo "  All strings translated!\n";
            } else {
                echo "\n  Total: {$count} untranslated strings\n";
            }
            echo "\n";
        }
        break;
        
    case 'copy':
        echo "=== Copying English source strings as placeholders ===\n\n";
        echo "This will add missing strings from the English source to your ms-MY files.\n";
        echo "The strings will be in English - you need to translate them afterwards.\n\n";
        
        foreach ($mappings as $key => $mapping) {
            echo "--- {$mapping['label']} ---\n";
            
            $sourceFiles = getIniFiles($mapping['source']);
            
            foreach ($sourceFiles as $file) {
                $sourcePath = $mapping['source'] . '/' . $file;
                $targetPath = $mapping['target'] . '/' . $file;
                
                $sourceStrings = parseIniStrings($sourcePath);
                $targetStrings = file_exists($targetPath) ? parseIniStrings($targetPath) : [];
                
                $missing = [];
                foreach ($sourceStrings as $key2 => $value) {
                    if (!isset($targetStrings[$key2])) {
                        $missing[$key2] = $value;
                    }
                }
                
                if (empty($missing)) continue;
                
                // Read source file to preserve comments and structure
                $sourceLines = file($sourcePath, FILE_IGNORE_NEW_LINES);
                
                if (!file_exists($targetPath)) {
                    // Create new file based on source structure
                    $output = [];
                    foreach ($sourceLines as $line) {
                        $trimmed = trim($line);
                        if (empty($trimmed) || $trimmed[0] === ';') {
                            $output[] = $line;
                        } elseif (preg_match('/^([A-Z][A-Z0-9_.-]*)="(.*)"$/', $trimmed, $m)) {
                            if (isset($targetStrings[$m[1]])) {
                                $output[] = $m[1] . '="' . $targetStrings[$m[1]] . '"';
                            } else {
                                $output[] = $line; // English placeholder
                            }
                        }
                    }
                    file_put_contents($targetPath, implode("\n", $output) . "\n");
                    echo "  Created: {$file} (" . count($missing) . " strings to translate)\n";
                } else {
                    // Append missing strings to existing file
                    $append = "\n; === UNTRANSLATED (from English source) ===\n";
                    foreach ($missing as $key2 => $value) {
                        $append .= "{$key2}=\"{$value}\"\n";
                    }
                    file_put_contents($targetPath, $append, FILE_APPEND);
                    echo "  Updated: {$file} (" . count($missing) . " strings added)\n";
                }
            }
            echo "\n";
        }
        
        echo "Done! Now edit the .ini files and replace English text with Bahasa Melayu translations.\n";
        break;
        
    default:
        echo "Joomla Translation Helper for ms-MY\n\n";
        echo "Commands:\n";
        echo "  stats   - Show translation statistics\n";
        echo "  missing - Show files with missing translations\n";
        echo "  file    - Show untranslated strings for a specific file\n";
        echo "  copy    - Copy English source strings as placeholders\n";
        break;
}
