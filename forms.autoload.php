<?php

$ignore_files = [
    'forms.autoload.php',
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
        if (!strpos($file, $ignored)) {
            include_once $file;
        }
    }
}
