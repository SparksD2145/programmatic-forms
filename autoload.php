<?php
/*
Plugin Name:    Programmatic Forms
Plugin URI:     http://dev.northamericanspine.com/nobilishealth/programmatic-forms
Description:    An environment-agnostic, form-focused project aimed at delivering a better form development experience.
Version:        1.1.0
Author:         Thomas Ibarra
Author URI:     https://github.com/SparksD2145
Text Domain:    com.sparksd2145.programmatic-forms
Domain Path:    /languages
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

foreach (glob_recursive(dirname(__FILE__) . '/src' . "/*.php") as $file) {
    require_once($file);
}
