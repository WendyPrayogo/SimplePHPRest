<?php
defined("BASE_PATH") OR  exit("Direct Access Forbidden");

class Core {
    /**
     * 
     * Core Controller
     */

    private $log = NULL;
    public  $rest = NULL;
    public  $database = NULL;
    public  $libraries = NULL;

    public function ___init() {
        $this->log  = new Logger();
        $this->log->logText("CoreController.Thread","Init Core Controller");
        $this->rest = new RestController();
    }


}

?>