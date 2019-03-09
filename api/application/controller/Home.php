<?php
defined("BASE_PATH") OR  exit("Direct Access Forbidden");

class Home extends Core {

    public function default() {
        $this->rest->put(array("default"=>"ok", "url"=>FULL_URL));
    }

}

?>