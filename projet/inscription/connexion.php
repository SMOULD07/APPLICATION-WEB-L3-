<?php
session_start();
try 
{
    $bdd = new PDO("mysql:host=localhost;dbname=try;charset=utf8", "root", "");
}
catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}
session_start();
if(isset($_POST['envoyer'])){
 if(isset($_POST['email']) and isset($_POST['password'])){

    $email=htmlspecialchars($_POST['email']);
    $mdp=htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT pseudo, mail, mdp FROM utilisateurs WHERE mail = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();
    $email = strtolower($email);

    if($row==1){  
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $password=sha1($_POST['password']);
            if($data['mdp']===$password){
                $_SESSION['user']=$data['pseudo'];
                header('Location:first.php');
            }
            else{
                header('Location:inscripconx.php?login_err=password');
            }
 
        }
        else{
            header('Location:inscripconx.php?login_err=email');
        }
    }
    else{
        header('Location:inscripconx.php?login_err=already');
    }


}}
 ?>