<?php

/**
 * Simple PSR-4 Style Autoloader
 */

spl_autoload_register(function ($class) {

    // Base directory
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;

    // Convert namespace to file path
    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Load file if exists
    if (file_exists($file)) {
        require_once $file;
    }
});
