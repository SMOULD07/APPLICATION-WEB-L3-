<!DOCTYPE html>
<html>
    <body>
        <head>
            <title> Ajouter une recette</title>
            <link rel="">
            <style>
              @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
              html{
                font-family: Poppins;
              }
            .container{
               height: 1400px;
               width:1400px;
margin-left:50px;
                
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(0,0,0,0.25);
                
              }
            
            .image img{
              margin-top: 35px;
                height:300px;
                width: 300px;
                object-fit: cover;
                border-radius: 25px;
                box-shadow: 0px 5px 15px rgba(0,0,0,0.25);
             
            }   
            .image{
                margin-top: 2REM;
                margin-left: 2rem;
                display: grid;
                margin-bottom: 120px;

            }
            
            .champ{
      display: grid;
                margin-bottom: 2rem;
                justify-content: space-around;
                width:400px;
              height: 50px;
              margin-top: 100px;
            }
            .champs{
                display: grid;
                margin-left: 10em;
                width: auto;
               top:200px;
               position: absolute;
    justify-items: end;
            }
           .champs .champ {
            
              height: auto;
              width: 500px;
              margin-left: 500px;
              flex-direction: end;
            }
           input{
            height: 56px;
              width:300px;
           }
           
        
            #file{
              display: none;
            }
            label{
              cursor: pointer;
              width: 200px;
              margin-left: 
              45px;
              margin-top: 15px;
            }
      
            label:hover{
              border-bottom: .2px solid black;
            }
            .h {
            
              height: 150px;
      width:500px;
            }
            ::placeholder{
              top: 0;
              font-family: Poppins;
            }
            td input{
              border:black .1px solid;
              width:10rem;
              height: 3rem;
            }
            #logo{
    margin:15px 7% 0 3%;
  
}
#logo img{
  width:53.325px;
  height:43.275px;
}
.link{
    margin-top:  20px;
    width:12rem
}
.title{
    width: 20rem;
    margin-top:  20px;
    text-align: center;
    font-weight: 700
}
            </style>
        </head>
        <nav style="display: block;">

        <?php 
        session_start(); 
        if(!isset($_SESSION['user'])){
        header('Location:inscripconx.php');
        die();}
        
        if (isset($_POST['submit'])){
          print('Recette ajoutée avec succès');}?>
<div class="links" style="display: flex; font-size: 1.1rem;">
   <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png"></div>
   <div class="link" style="width:10rem"><a href="contact.php" style="text-decoration: none; color: black">Home</a> </div>
        <div class="link"><a href="recherche.php"style="border:none;background-color:white;cursor:pointer;font-family:Poppins;font-size: 1.1rem;">Rechercher une Recette</a> </div>
   <div class="title">EASY MEALS</div>
   <div class="link">Ingredients </div>
   <div class="link"><a href="contact.php" style="text-decoration: none; color: black">Contact</a></div>
    <div class="avatar"><a href="espaceuser.php" style="color: transparent"><img src="../images/chef.jpg" style="height:50px;border:.2px solid black; border-radius:25px;margin-right:50px"></a></div>
</div>
        <form method="post" enctype="multipart/form-data">
        <h1 style="margin-left:40%; margin-top:100px;"> Ajouter une recette </h1>
        <div class="container">
         
        <div class="image">
              <img src="../images/img.jpg" alt="">
              <label for="file">
                Selectionner une image
              <input type="file" name="uploadfile" id="file"/>
          </label>
        </div>
        <div class="champ">
                  Nom de la recette
                  <input type="text" name="nom" style=" margin-top:10px;"/>
                </div>
                <div class="champ">
                  Temps de Préparation
                  <input type="text" name="temps" placeholder="En minutes" style=" margin-top:10px;"/>
                </div>
                <div class="champ">
                  Portions
                  <input type="text" name="portions" style=" margin-top:10px;"/>
                </div>
            <div class="champs">
                <div class="champ">
                  Catégorie
                  <input type="text" name="categorie" style=" margin-top:10px; margin-right:200px"/>
                </div>
                <div class="champ" >
                  Ingredients
                  <table style="border:black solid .2px; margin-top:10px; ">
                     <tr><th name="ingredient">ingredient</th><th name="quantite">quantite</th><th name="unite">unite</th></tr>
                    <tr><td><input type="text" name="ingredient1"></td><td><input type="text" name="quantite1"></td><td><input type="text" name="unite1"></td></tr>
                    <tr><td><input type="text" name="ingredient2"></td><td><input type="text" name="quantite2"></td><td><input type="text" name="unite2"></td></tr>
                     <tr><td><input type="text" name="ingredient3"></td><td><input type="text" name="quantite3"></td><td><input type="text" name="unite3"></td></tr>
                     <tr><td><input type="text" name="ingredient4"></td><td><input type="text" name="quantite4"></td><td><input type="text" name="unite4"></td></tr>
                     <tr><td><input type="text" name="ingredient5"></td><td><input type="text" name="quantite5"></td><td><input type="text" name="unite5"></td></tr>
                      <tr><td><input type="text" name="ingredient6"></td><td><input type="text" name="quantite6"></td><td><input type="text" name="unite6"></td></tr>
                      <tr><td><input type="text" name="ingredient7"></td><td><input type="text" name="quantite7"></td><td><input type="text" name="unite7"></td></tr>
                      <tr><td><input type="text" name="ingredient8"></td><td><input type="text" name="quantite8"></td><td><input type="text" name="unite8"></td></tr>
                      <tr><td><input type="text" name="ingredient9"></td><td><input type="text" name="quantite9"></td><td><input type="text" name="unite9"></td></tr>
                      <tr><td><input type="text" name="ingredient10"></td><td><input type="text" name="quantite10"></td><td><input type="text" name="unite10"></td></tr>
                      <tr><td><input type="text" name="ingredient11"></td><td><input type="text" name="quantite11"></td><td><input type="text" name="unite11"></td></tr>
                    </table>
                </div>
                <div class="champ" style=" margin-top:0;">
                  Etapes
                  <textarea class="h" name="etapes"placeholder="Mettez chaque étape sur une ligne" style=" margin-top:10px;"></textarea>
                </div>
                <button type="submit" name="submit" style="padding:20px;background-color:black; color: white; font-family:Poppins; border:none; border-radius:15px; cursor: pointer ">Enregister</button>
        </div>
          </div>
        </form>
        <script>
          const image=document.querySelector(".image img"),
          input=document.querySelector("input");
          input.addEventListener("change",()=>{
            image.src=URL.createObjectURL(input.files[0]);
          });

        </script>
    </body>
</html>

<?php
$db = new mysqli("localhost","root","","try");

mysqli_set_charset($db, "utf8");

if (isset($_POST['submit'])){
$portion=$_POST['portions'];
$etapes=$_POST['etapes'];
$temps=$_POST['temps'];
$nom=$_POST['nom'];
$categorie=$_POST['categorie'];
$ingredients=[];
$quantites=[];
$unite_mesures=[];
for ($i=1;$i<=11;$i++){
  $ingredient='ingredient'.$i;
  array_push($ingredients,$_POST[$ingredient]);
  $quantite='quantite'.$i;
  array_push($quantites,$_POST[$quantite]);
  $unite='unite'.$i;
  array_push($unite_mesures,$_POST[$unite]);
}


$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
    
  function etapes($etapes){
  if(isset($etapes)){
      $texte = nl2br($_POST['etapes']); // met des <br /> a chaque retour chariot
      $i=1;
      $etap=''; 
      $words = explode(PHP_EOL, $texte);
      foreach($words as $etape){ 
                $etap.='étape '.$i.': '.$etape;         
                $i++;
                
    }
    
    return $etap;
  }
}
$etape=etapes($etapes);  //function

if(isset($portion) && isset($temps) && isset($nom)&& isset($etapes)&& isset($ingredients) && isset($categorie)){
  
  //ajouter une recette
$sql="insert into recette(portion,temps,nom,images,etapes,categorie,auteur) values(?,?,?,?,?,?,?)";
$stmt=$db->prepare($sql);
$stmt->bind_param("sssssss",$portion,$temps,$nom,$filename,$etape,$categorie,$_SESSION['user']);
$stmt->execute();

//Ajout des unites de mesure dans leurs table correspondante

$unit_exists=[];

foreach($unite_mesures as $unit) 
{
  $uni="select unite from unite_mesure";

$stmt=$db->prepare($uni);

$stmt->execute();

$result=$stmt->get_result();
  while ($unitt = $result->fetch_array()) 
     {
      
         if (strtoupper($unitt['unite'])==strtoupper($unit))
         {
            array_push($unit_exists,$unit); 
            }
     }
    }

  foreach($unite_mesures as $unit){

  if(!in_array($unit,$unit_exists)&& ($unit!=''))
  {
    $requete= $db->prepare(
      "INSERT INTO unite_mesure (unite) VALUES (?)");
      $requete->bind_param("s",$unit);
      $requete->execute();
    }

}



//ajout de nouveaux ingrédients s'ils n'existent pas dans la bdd

$exists=[];

foreach($ingredients as $ingr) //acces aux elements du tableau contenant les ingredients saisis par l'utilisateur
{
  $sql="select ingredient from ingredient";

$stmt=$db->prepare($sql);

$stmt->execute();

$result=$stmt->get_result();
  while ($row = $result->fetch_array()) 
     {
      
         if (strtoupper(trim($row['ingredient']))==strtoupper(trim($ingr," "))) //test si ingredient saisi par l'utilisateur existe deja dans la bdd
         {
            array_push($exists,$ingr); //ajouter au tableau exists[]
            }
     }
    }

  foreach($ingredients as $ingr){
    
  if(!in_array($ingr,$exists)&& ($ingr!='')) //si ingredient saisi n'existe pas dans le tableau exists[]-> n'existe pas dans la bdd et champ pas vide
  {
    $requete= $db->prepare(
      "INSERT INTO ingredient (ingredient) VALUES (?)");
      $requete->bind_param("s",$ingr);
      $requete->execute();}

}

// ajouter a la table recette_ingredient_quantite 
$id="select id from recette where nom=?"; //recuperer l'id de la recette
$stmt=$db->prepare($id);
$stmt-> bind_param('s',$_POST['nom']);
$stmt->execute();
$result = $stmt->get_result();
$row1= $result->fetch_assoc();
$stmt->close();
$i=0; $j=0;

foreach($ingredients as $ingredient){
  
  $id_unite="select id from unite_mesure where UPPER(unite)=?"; //recuperer l'id de la recette
  $statement=$db->prepare($id_unite);
  $unite_mesure=mb_strtoupper($unite_mesures[$j],'UTF-8');
  $statement-> bind_param('s',$unite_mesure);
  $statement->execute();
  $resulta = $statement->get_result();
  $id_unit= $resulta->fetch_assoc();
  $statement->close();

  $id="select id from ingredient where UPPER(ingredient)=?"; //recpuerer l'id de chaque ingredient //mettre en majuscule pour eviter les problemes de casse
  $st=$db->prepare($id);
  $ing=mb_strtoupper($ingredient,'UTF-8');
  $st->bind_param('s',$ing);
  $st->execute();
  $result=$st->get_result();
  $row2=$result->fetch_assoc();


//ajout id de la recette id de chaque ingredients leurs quantités ainsi que les unites de mesure
$sql="insert into recette_ingredient_quantite(id_recette,id_ingredient,quantite,id_unite_mesure) values(?,?,?,?)";
$stmt=$db->prepare($sql);
$stmt->bind_param("iiii",$row1['id'],$row2['id'],$quantites[$i],$id_unit['id']);
$stmt->execute();
$i++; 
$j++;
$stmt->close();
  }

}
else{
  echo'Remplissez tous les champs';
}
}
$up="update recette_ingredient_quantite set quantite = null where quantite = 0";
$stm=$db->prepare($up);
$stm->execute();
?>