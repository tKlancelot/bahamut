<?php

class Database{
    protected $bdd;

    //dev
    // private $host = 'localhost';
    // private $dbname = 'leviatf42';
    // private $username = 'root';
    // private $password = 'root';
    
    //prod
    private $host = 'leviatf42.mysql.db';
    private $dbname = 'leviatf42';
    private $username = 'leviatf42';
    private $password = 'cGma7HtzkMND';


    public function __construct(){
        try{
            $this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->username,$this->password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e) {
                die('Erreur '.$e->getMessage());
        }
    }
}

?>