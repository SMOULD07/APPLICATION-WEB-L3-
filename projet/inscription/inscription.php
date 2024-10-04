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
if(isset($_POST['inscription'])){
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, mail, mdp FROM utilisateurs WHERE mail = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            $password = sha1($password);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, ip) VALUES(:pseudo, :email, :password, :ip)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                            ));
                            // On redirige avec le message de succès
                            header('Location:inscripconx.php?reg_err=success');
                            die();
                        }else{ header('Location: inscripconx.php?reg_err=password'); die();}
                    }else{ header('Location: inscripconx.php?reg_err=email'); die();}
                }else{ header('Location: inscripconx.php?reg_err=email_length'); die();}
            }else{ header('Location: inscripconx.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: inscripconx.php?reg_err=already'); die();}
    }
}