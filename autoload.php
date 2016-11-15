<?php
/*
Plugin Name: Nobilis Health - Programmatic Forms
Plugin URI:  http://dev.northamericanspine.com/nobilishealth/programmatic-forms
Description: Programmatic forms, for better development.
Version:     1.0.0
Author:      Thomas Ibarra
Author URI:  http://dev.northamericanspine.com/u/thomas
Text Domain: nobilis.progforms
Domain Path: /languages
*/
$ignore_files = [
    'demo.php'
];

if ( ! function_exists('glob_recursive')) {
    function glob_recursive($pattern, $flags = 0) {
        $files = glob($pattern, $flags);

        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
            $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
        }

        return $files;
    }
}

foreach (glob_recursive(dirname(__FILE__) . "/*.php") as $file) {
    foreach ($ignore_files as $ignored) {
        if (pathinfo($file)['basename'] !== $ignored) {
            require_once($file);
        }
    }
}
