<?php
final class mysqli_DBConnection
{
    static private $DBinstance = NULL;
    private $MySqliOBj = NULL;

	private function __construct(){
	$this->MySqliOBj = new mysqli(PROJ_DBHOSTNAME,PROJ_DBUSER,PROJ_DBPASS,PROJ_DBNAME);
    }

    static public function getDBInstance(){
       if (self::$DBinstance == NULL) self::$DBinstance = new self;
       return self::$DBinstance;
    }

    public function __clone(){
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }


    public function getDBObj(){
        return $this->MySqliOBj;
    }
}
?>
