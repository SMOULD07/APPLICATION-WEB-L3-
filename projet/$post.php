<?php

@$ch=$_POST["ch"];
@$valider=$_POST['recherche'];
if (isset($valider)){

  print 'Vous avez coché les cases suivantes: <br />';
  $liste_ingredients= @implode(" and ",$ch);
$server = 'localhost';
$login='root';
$pass="";
try {
	$connexion=new PDO("mysql:host=$server;dbname=try",$login,$pass);
	$connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo 'echec de la connexion' .$e->getMessage();
}
  $chs=@implode(" or ingredient =",$ch);
  print($liste_ingredients);
}
?>