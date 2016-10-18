<?php
foreach (glob(dirname(__FILE__) . "/**/*.php") as $filename) {
    include_once $filename;
}