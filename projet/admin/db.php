<?php
$server = 'localhost';
$login='root';
$pass="";
try {
	$pdo=new PDO("mysql:host=$server;dbname=try",$login,$pass);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);}
catch(PDOException $e){
	echo 'echec de la connexion' .$e->getMessage();
}
?>