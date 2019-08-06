<?php

/* 
 * Database connections
 */
function acmeConnect(){
$server="localhost";
$database="leonidas_acme";
$user="leonidas_iClient";
$password="OLACbjYwaduxAxpZ";
$dsn='mysql:host='.$server.';dbname='.$database;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
   $acmeLink = new PDO($dsn, $user, $password, $options);
   return $acmeLink;
} catch (PDOException $exc) {
   header('location:/view/500.php');
   exit;
}
}

