<?php
defined("BASE_PATH") OR  exit("Direct Access Forbidden");
session_start(); $_SESSION['processing_tick_count_start'] = microtime(TRUE);
/** include files */
include CORE_CONFIGURATION_PATH."Default.php";
include CORE_FUNCTION_PATH."Logger.php";
include CORE_FUNCTION_PATH."AutoloaderClass.php";
include CORE_FUNCTION_PATH."Loader.php";
include CORE_CONTROLLER_PATH."RestController.php";
include CORE_CONTROLLER_PATH."Core.php";
/** variable definition */
$classCall   = null; $methodCall  = "default"; $paramCall   = null; $methodParam = null;
/** object definition for logger, first loaded*/
$log   = new Logger(); $start_microtime = microtime(TRUE); $log->logStart($start_microtime);
$appConfiguration = parse_ini_file(CORE_CONFIGURATION_PATH."config.ini", TRUE);
$rest  = new RestController();
/** start app */
$requestMethod = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "none";
$iRequestURI   = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "/";
$requestURI    = explode("/", $iRequestURI);
$aClassCall    = isset($requestURI[API_CLASS]) ? $requestURI[API_CLASS] : null;
$aClassCall    = $aClassCall != '' ? $aClassCall: null;
if ($aClassCall == null) {
    $log->logText("Main.Thread","Controller NOT FOUND");
    $rest->put(CLASS_NOT_FOUND_MESSAGE);
} else {
    $rClassCall = explode('?', $aClassCall);
    $classCall  = $rClassCall[0];
    if (isset($rClassCall[1])) $paramCall  = $rClassCall[1];
    else {
        $methodParam      = isset($requestURI[API_METHOD_PARAM]) ? $requestURI[API_METHOD_PARAM] : null;
        if ($methodParam != null OR $methodParam != '') {
            $methodParamCall  = explode('?', $methodParam);
            $methodCall       = isset($methodParamCall[API_METHOD]) ? $methodParamCall[API_METHOD] : "default";
            $methodCall       = $methodCall !== '' ? $methodCall: 'default'; 
            $paramCall        = isset($methodParamCall[API_PARAM])  ? $methodParamCall[API_PARAM] : null;
            $paramCall        = $paramCall !== '' ? $paramCall : null;
        }
    }
    /** logging all request */
    $log->logText("Main.Thread","Started ...".
                                "\n\t\tFull Request > ".$iRequestURI.
                                "\n\t\tClass        > ".$classCall.
                                "\n\t\tMethodParam  > ".$methodParam.
                                "\n\t\tMethod       > ".$methodCall.
                                "\n\t\tParameter    > ".$paramCall);
    /** check method and param */
    $aload = new AutoloaderClass();
    $aload->loadController();
    if ($loadedClass = $aload->isCallable($classCall, $methodCall)) {
        $log->logText("Main.Thread","Class and Method available, call it..!!");
        $loadedClass->___init();
        $paramPassed = explode('&', $paramCall);
        $params = null;
        for ($paramLoop = 0; $paramLoop < count($paramPassed); $paramLoop++) {
            $ptemp = explode('=', $paramPassed[$paramLoop]);
            $pIndex = $ptemp[0];
            $pValue = isset($ptemp[1]) ? $ptemp[1] : null;
            $params[$pIndex] = $pValue;
        }
        $loadedClass->$methodCall($params);
    } else {
        $log->logText("Main.Thread","Class Found, but Method Not Found..!!");
        $rest->put(METHOD_NOT_FOUND_MESSAGE);
    }
    $aload->unloadController(); $aload = NULL;
}
//** destructor, freeeeee */
$rest->destruct();  $rest = NULL;
//** uncomment if single session */
session_unset();
//** logg processing time */
$end_microtime = microtime(TRUE); $log->logEnd($end_microtime-$start_microtime);
$log->destruct();   $log = NULL;
?>