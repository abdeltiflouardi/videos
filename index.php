<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

if(!file_exists('server')):
    $env = 'development';
    $libZend = "";
    define("_BBCLONE_DIR", "../bbclone/");
else:
    $env = 'production';
    $libZend = '../www/library';
    define("_BBCLONE_DIR", "bbclone/");
endif;

define("_BBC_PAGE_NAME", $_SERVER['REQUEST_URI']);
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : $env));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
    $libZend,
)));
/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();

            
foreach($GLOBALS as $obj=>$val)
    unset($$obj);
