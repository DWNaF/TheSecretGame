<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "autoload.php";

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
}

if (!defined('ABS_PATH')){
    define('ABS_PATH', DIRECTORY_SEPARATOR . basename(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
}

if (!defined('CSS_PATH')) {
    define('CSS_PATH', ABS_PATH . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR);
}

if (!defined('JS_PATH')) {
    define('JS_PATH', ABS_PATH . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR);
}

if (!defined('INCLUDES_PATH')) {
    define('INCLUDES_PATH', ROOT_PATH . 'includes' . DIRECTORY_SEPARATOR);
}

if (!defined('PUBLIC_PATH')){
    define('PUBLIC_PATH', ABS_PATH . 'public' . DIRECTORY_SEPARATOR);
}