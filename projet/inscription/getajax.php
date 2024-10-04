<?php
session_start();
$pseudo=$_SESSION['user'];
try 
{
    $bdd = new PDO("mysql:host=localhost;dbname=try;charset=utf8", "root", "");
}
catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}



if (isset($_POST['how'] ))
{     $recette_id=$_POST['data'];
    //recuperer id de lutilisateur ayant commencé une session
    $data=new mysqli("localhost","root","","try");
    $requete="select id from utilisateurs where pseudo= ?";
    $stmt=$data->prepare($requete);
    $stmt->bind_param("s",$pseudo);
    $stmt->execute();
    $resulta=$stmt->get_result()->fetch_assoc();
    $id_user=$resulta['id'];

    //user liked or not!

    $st=$bdd->prepare("select * from likes where recette_id=$recette_id and user_id=$id_user");
    $st->execute();
    $data = $st->fetch();
    $likes = $st->rowCount();

    if($likes==0){ //user n'a pas liké

    //recuperer le nombre de likes de la recette likée
    $st=$bdd->prepare("select * from recette where id=$recette_id");
    $st->execute();
    $data = $st->fetch();
    $n=$data['likes'];
    $rw = $st->rowCount();
    $countlikes=$bdd->prepare("update recette set likes=$n+1 where id=$recette_id");
    $countlikes->execute();

    //inserer das la table likes le pseudo de lutilsateur et id de la recette likée
   $resultt=$bdd->prepare("INSERT INTO `likes`(`recette_id`, `user_id`) VALUES ($recette_id,$id_user) ");
    $resultt->execute();
    if($resultt)
      echo 'liked';}

    else if($likes==1){ //user a liké
        $sql1=$bdd->prepare("update recette set likes=likes-1 where id=$recette_id ");
        $sql1->execute();
        $sql2=$bdd->prepare("DELETE FROM `likes` WHERE recette_id=$recette_id and user_id=$id_user");
        $sql2->execute();
        if($sql2)echo "disliked";}

exit();
    }?>