<?php
namespace classes;
require_once 'includes/Autoloader.php';

use interface\configInterface;
use \PDO;

class config implements configInterface{
  private $servername ;
  private $username ;
  private $password ;
  private $dbname ;

  function __construct(){
   $this->servername = "localhost";
   $this->username = "root";
   $this->password = "";
   $this->dbname = "scandiweb";
  }

  function connect(){
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    
    } catch(PDOException $e) {
      echo "connection failed";
    }
    return $conn ;
  }


}
?>