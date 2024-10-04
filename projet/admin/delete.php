<?php
 $db=new mysqli("localhost","root","","try");
 mysqli_set_charset($db, "utf8");
 if(isset($_GET['iduser'])){
 $id_rec=$_GET['iduser'];
 $req="DELETE FROM recette where id=$id_rec";
 $stmt=$db->prepare($req);
    $stmt->execute();
    header('Location:../inscription/espaceuser.php');}
    if(isset($_GET['id'])){
 $id_recette=$_GET['id'];
 $req="DELETE FROM recette where id=$id_recette";
 $stmt=$db->prepare($req);
    $stmt->execute();
    header('Location:index.php');
    $id_user=$_GET['id'];
$requete="DELETE FROM utilisateurs where id=$id_user";
$stm=$db->prepare($requete);
$stm->execute();
header('Location:index.php');}
?>