<?php
session_start();
if(isset($_POST['valider'])){
    if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])){
        if(filter_var($_POST['pseudo'],FILTER_VALIDATE_EMAIL)){
            if(isset($_POST['mdp'])and !empty($_POST['mdp'])){
                require "db.php";

                $password=sha1($_POST['mdp']);
              $get_data=$pdo->prepare("SELECT mail from admin WHERE mail=? and password=?");
              $get_data->execute(array($_POST['pseudo'],$password));
              $rows=$get_data->rowCount();  
              if($rows==true){
                $_SESSION['admin']=$_POST['pseudo'];
                header('Location:index.php');
              }
              else{
                $erreur="Pseudo ou mot de passe incorrects";
              }
            }
            else{
                $erreur="Veuillez saisir votre mot de passe";
            }

        }
        else{
            $erreur="Veuillez saisir un email valide";
        }

    }
    else{
        $erreur= "Veuillez saisir un nom d'utilisateur";
    }
}
?>