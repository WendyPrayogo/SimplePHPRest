<?php

/** APP CONFIGURATION
 */

/** default server protocol https, enabled on .htaccess file */
define("SERVER_URL", "localhost");
define("PROTOCOL", "https");
define("APP_DIR", "/api"); /** use this if api inside folder */
// define("APP_DIR", "");    /** or user this if api on root folder */
define("APPLICATION_ROOT_DIR", "application");
define("CORE_APPLICATION_DIR", "app-core");
define("CORE_CONFIGURATION_DIR", "config");
define("CORE_FUNCTION_DIR", "core-function");
define("CORE_CONTROLLER_DIR", "core-controller");
define("CORE_LIBRARIES_DIR", "core-libraries");
define("CONTROLLER_DIR", "controller");
define("MODEL_DIR", "model");
define("TEMPLATE_DIR", "template");
define("LIBRARIES_DIR", "libraries");
define("LOGGER_DIR", "looooggggeeeers");
define("LOGGER_PREFIX_NAME", "loooog__");
define("LOGGER_EXTENTION_FILE", "logger");
define("LOGGER_DATE_FORMAT", "Ymd"); /* logger ==> <LOGGER_BASE_PATH>/<LOGGER_PREFIX_NAME><LOGGER_DATE_FORMAT>.<LOGGER_EXT_FILE>  */
define("CLASS_NOT_FOUND_STATUS", "controller not found!");
define("METHOD_NOT_FOUND_STATUS", "method not found!");


/**  */
/* DO NOT CHANGE THIS DEFINITONS AND DEFAULT DIRECTORY TREE! YOU CAN CHANGE THE DIR NAME TO MAKE IT */
/* DO NOT CHANGE THIS DEFINITONS AND DEFAULT DIRECTORY TREE! YOU CAN CHANGE THE DIR NAME TO MAKE IT */
    define("BASE_PATH", __DIR__.DIRECTORY_SEPARATOR);
    define("APPLICATION_ROOT_PATH", BASE_PATH.APPLICATION_ROOT_DIR.DIRECTORY_SEPARATOR);
    include APPLICATION_ROOT_PATH."Definitions.php";
    include APPLICATION_ROOT_PATH."Main.php";
/* DO NOT CHANGE THIS DEFINITONS AND DEFAULT DIRECTORY TREE! YOU CAN CHANGE THE DIR NAME TO MAKE IT */
/* DO NOT CHANGE THIS DEFINITONS AND DEFAULT DIRECTORY TREE! YOU CAN CHANGE THE DIR NAME TO MAKE IT */
?>