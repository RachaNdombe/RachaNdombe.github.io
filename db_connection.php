<?php
// Paramètres de connexion

$servername = "localhost"; 
$username = "root";         
$password = "";             
$dbname = "yetuveka"; 
$db_host = "127.0.0.1";
$DB_PORT=8090;

//essai wtih db
/*
$servername = "localhost"; 
$username = "root";         
$password = "";             
$dbname = "contact_db"; 
$db_host = "127.0.0.1";
$DB_PORT=8090;
*/
// Création de la connexion


try{
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
}
catch (PDOException $e){
    echo"la connexion a echoue:" .$e->getMessage();
}



?>