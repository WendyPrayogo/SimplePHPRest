<?php
defined("BASE_PATH") OR  exit("Direct Access Forbidden");
require_once CORE_FUNCTION_PATH."Logger.php";

class Databases extends PDO {

    private $log        = NULL;
    private $dbh        = NULL;
    private $dbHost     = NULL;
    private $dbUsername = NULL;
    private $dbPassword = NULL;
    private $dbDriver   = NULL;
    private $dbDatabase = NULL;
    private $connDSN    = NULL;

    private function queryClean() {

    }

    private function queryEscaping() {

    }

    public function __construct($DBSetting, $userDSN = NULL) {
        $this->log = new Logger();
        $this->log->logText("Databases.Function","Init Databases");
        if ($userDSN == NULL) {
            $this->dbDriver   = $DBSetting["driver"];
            $this->dbHost     = $DBSetting["server"];
            $this->dbDatabase = $DBSetting["database"];
            $this->dbUsername = $DBSetting["username"];
            $this->dbPassword = $DBSetting["password"];
            $this->dbhDSN    = $this->dbDriver.":host=".$this->dbHost.";dbname=".$this->dbDatabase;
        } else $this->dbhDSN = $userDSN;
        try {
            $this->log->logText("Databases.Function","Try connect to DB...");
            $this->dbh = new PDO($this->dbhDSN, $this->dbUsername, $this->dbPassword);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->log->logText("Databases.Function","DB Connection Success..!!");
        } catch (PDOException $pdoException) {
            $this->log->logText("Databases.Function","DB Connection Failed >> ".$pdoException->getMessage());
        }
    }

    public function query($query) {
        $stmt = $this->dbh->prepare($query);
        return $stmt->execute();
    }

    public function select($table, $fields = "*", $options = "") {
        $stmt = $this->dbh->prepare("SELECT $fields FROM $table $options");
        return $stmt->execute();
    }

    public function insert($table, $fields, $values, $options = "") {
        $field = ""; $value = ""; $dLoop = 0;
        $fieldsCount = count($fields);
        $valuesCount = count($values);
        if ($fieldsCount != $valuesCount) return FALSE;
        $this->dbh->beginTransaction();
        try {
            for ($dLoop; $dLoop < $valuesCount; $dLoop++) {
                $field = "(".$fields[$dLoop].")";
                $value = "(".$values[$dLoop].")";
                $this->dbh->exec("INSERT INTO $table $field VALUES $value $options");
            }
            $this->dbh->commit();
        } catch (Exception $exception) {
            $this->dbh->rollBack();
            return FALSE;
        }
        return TRUE;
    }

    public function delete($table, $selection = NULL, $options = "") {
        if ($selection != NULL) {
            $stmt = $this->dbh->prepare("DELETE FROM $table WHERE $id $options");
            return $stmt->execute();    
        } else return FALSE;
    }

    public function desctruct() {
        $this->dbh = NULL;
    }

    public function __desctruct() {
        $this->dbh = NULL;
    }

}

?>