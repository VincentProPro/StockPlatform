<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'clinicdb');
 
/* Attempt to connect to MySQL database */
try{
    $pdoob = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdoob->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}



// class Dbconfig{



// /* Database credentials. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'clinicstdb');
// private  $pdo;
 
// /* Attempt to connect to MySQL database */
// try{
//     $this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
// }
// public function returnpdo(){
// 	return $this->pdo;

// }


// }


?>