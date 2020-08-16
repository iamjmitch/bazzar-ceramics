<?php
//database handler
class db {
    protected $servername;
    protected $username;
    protected $password ;
    protected $database;
    public $connection;
    

    protected function connect() {
        $this->servername = "localhost";
        $this->username = "db_login";
        $this->password = "k8aQTSSzHrITZrEu";
        $this->database = "bazaarceramics_db";

        $connection = new mysqli($this->servername, $this->username, $this->password,  $this->database) or die("Unable to connect to Database");
        return $connection;
       
    }

    function __destruct() {
        //disconnect DB connection on destruct
        $this->connection = NULL;
    }

}

?>