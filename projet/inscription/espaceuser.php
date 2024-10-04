<?php 
    session_start();
    try 
{
    $bdd = new PDO("mysql:host=localhost;dbname=try;charset=utf8", "root", "");
}
catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
} // ajout connexion bdd

   // si la session existe pas ou si on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:inscripconx.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html >
  <head>
    <style>
      .recette img{
        height:20px
      }
      </style>
    <title>Espace membre</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="font-family:Poppins">
  <div class="links" style="display: flex; font-size: 1.1rem;">
        <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
        <div class="link" style="width:10rem"><a href="first.php" style="text-decoration: none; color: black">Home</a> </div>
        <div class="link"><a href="recherche.php"style="color:black; text-decoration:none">Rechercher une Recette</a> </div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="contact.php" style="text-decoration: none; color: black">Contact</a></div>
        <div class="avatar"><a href="espaceuser.php" style="color: transparent"><img src="../images/chef.jpg" style="height:50px;border:.2px solid black; border-radius:25px;margin-right:50px"></a></div>
     </div>
                <div class="text-center">
                        <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
                        <hr />
                        <a href="deconnexion.php"><button type="button" class="deconnexion" style="text-decoration: none; border:none; border-radius:5px;padding:12px; color:white ;background-color:#ed2939">
                          Déconnexion
                        </button></a>
                        <a href="formulaire.php"><button type="button" class="ajoutrecette" style="text-decoration: none; border:none; border-radius:5px;padding:12px;color:white ;background-color:#01796f">
                          Ajouter une recette
                        </button></a>
                        <?php echo '<a href="updateuser.php?updateid='.$data['id'].'"><button type="button" class="ajoutrecette" style="text-decoration: none; border:none; border-radius:5px;padding:12px;color:white ;background-color:#ffa700">
                          Modifier informations personnelles
                        </button></a>'
                        ?>
                </div> 
                <?php
                echo '<h1> Mes recettes </h1> <hr />';
                $db=new mysqli("localhost","root","","try");
                $stmt=$db->prepare("select * from recette where auteur=?");
                $stmt->bind_param("s",$_SESSION['user']);
                $stmt->execute();
                $result=$stmt->get_result();
                ?> <div class="recettes" style="display:inline-grid; grid-template-columns: 400px 400px 400px;"><?php
                while( $row=$result->fetch_array()){
                    ?><div class="recette" style="margin-left:50px; width:auto"><div class="titre" style="font-weight:800;"><?php echo $row['nom'];?>
<div class="gg">Temps de préparation: <?php echo $row['temps'];?> mins</div>
    <div class="gg">Portions: <?php echo $row['portion'];?></div></div>
    <img src="../images/<?php echo $row['images'] ; ?>" style=" width: 15em; height: 15em; border-radius: 10px;">
    <?php echo'<a href="update.php?updateid='.$row['id'].'"> '?><img src="../images/bouton-modifier.png"></a>
    <?php echo'<a href="delete.php?iduser='.$row['id'].'">'?><img src="../images/bouton-supprimer.png"></a> 
                </div>
    <?php
                }            
                ?>
                </div>
                    </body>
                    </html>