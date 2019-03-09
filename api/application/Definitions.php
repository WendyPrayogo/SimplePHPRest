<?php
    defined("BASE_PATH") OR exit("Direct Access Forbidden");
    define("CORE_APPLICATION_PATH", APPLICATION_ROOT_PATH.CORE_APPLICATION_DIR.DIRECTORY_SEPARATOR);
    define("CORE_CONFIGURATION_PATH", CORE_APPLICATION_PATH.CORE_CONFIGURATION_DIR.DIRECTORY_SEPARATOR);
    define("CORE_FUNCTION_PATH", CORE_APPLICATION_PATH.CORE_FUNCTION_DIR.DIRECTORY_SEPARATOR);
    define("CORE_CONTROLLER_PATH", CORE_APPLICATION_PATH.CORE_CONTROLLER_DIR.DIRECTORY_SEPARATOR);
    define("CORE_LIBRARIES_PATH", CORE_APPLICATION_PATH.CORE_LIBRARIES_DIR.DIRECTORY_SEPARATOR);
    define("CONTROLLER_PATH", APPLICATION_ROOT_PATH.CONTROLLER_DIR.DIRECTORY_SEPARATOR);
    define("LIBRARIES_PATH", APPLICATION_ROOT_PATH.LIBRARIES_DIR.DIRECTORY_SEPARATOR);
    define("TEMPLATE_PATH", APPLICATION_ROOT_PATH.TEMPLATE_DIR.DIRECTORY_SEPARATOR);
    define("MODEL_PATH", APPLICATION_ROOT_PATH.MODEL_DIR.DIRECTORY_SEPARATOR);
    define("LOGGER_PATH", LOGGER_DIR.DIRECTORY_SEPARATOR);
    define("CLASS_NOT_FOUND_MESSAGE", array("status"=> "ok", "status"=>CLASS_NOT_FOUND_STATUS));
    define("METHOD_NOT_FOUND_MESSAGE", array("status"=> "ok", "status"=>METHOD_NOT_FOUND_STATUS));
    /**  */
    define("BASE_URL", SERVER_URL.APP_DIR);
    define("FULL_URL", PROTOCOL."://".BASE_URL);
    $base_url_length = explode('/', BASE_URL);
    $uri_start = count($base_url_length);
    define("API_CLASS", $uri_start);
    define("API_METHOD_PARAM", $uri_start+1);
    define("API_METHOD", 0);
    define("API_PARAM", 1);
?>