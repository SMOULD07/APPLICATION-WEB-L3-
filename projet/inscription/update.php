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
        if (!$_SESSION['user']){
        header('Location:inscripconx.php');
        }
        else{
        echo "bonjour ".$_SESSION['user'];}
        ?>

<?php
$db = new mysqli("localhost","root","","try");

mysqli_set_charset($db, "utf8");
$modifid=$_GET['updateid'];
$stmt=$db->prepare("select images from recette where id=$modifid");
$stmt->execute();
$image = $stmt->get_result()->fetch_array();
$imagerecette=$image['images'];

$stmt=$db->prepare("select * from recette where id=$modifid");
$stmt->execute();
$datarecette = $stmt->get_result()->fetch_array();


if (isset($_POST['submit'])){
$portion=$_POST['portions'];
$etapes=$_POST['etapes'];
$temps=$_POST['temps'];
$nom=$_POST['nom'];
$categorie=$_POST['categorie']; 

if (!empty($_FILES["uploadfile"]["name"])){
$imagerecette = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $imagerecette;}
    
  function etapes($etapes){
    print (isset($etapes));
  if(isset($etapes)){
      $texte = nl2br($_POST['etapes']); // met des <br /> a chaque retour chariot
      $i=1;
      $etap=''; 
      $words = explode(PHP_EOL, $texte);
      foreach($words as $etape){ 
                $etap.='Etape '.$i.': '.$etape;         
                $i++;
                
    }
    $texte=str_replace("<br />","\n",$texte);
    return $etap;
  }
}
$etape=etapes($etapes);  //function
$admin='admin';
  //ajouter une recette
$sql="update recette set id=?, portion=?,temps=?,nom=?,images=?,etapes=?,categorie=?,auteur=? where id=$modifid";
$stmt=$db->prepare($sql);
$stmt->bind_param("isssssss",$modifid,$portion,$temps,$nom,$imagerecette,$etape,$categorie,$admin);
$stmt->execute();

}
?>
        <form method="post" enctype="multipart/form-data">
        <h1 style="margin-left:40%; margin-top:100px;"> Modifier la recette </h1>
        <?php if (isset($_POST['submit'])){
          print('Recette modifiée avec succès');}?>
        <div class="container">
         
        <div class="image">
             <?php echo '<img src="../images/'.$imagerecette.'" alt="">'?>
              <label for="file">
                Selectionner une image
              <input type="file" name="uploadfile" id="file"/>
          </label>
        </div>
        <div class="champ">
                  Nom de la recette
                  <?php echo'<input type="text" name="nom" style=" margin-top:10px;" value="'.$datarecette['nom'].'"/>'?>
                </div>
                <div class="champ">
                  Temps de Préparation
                  <?php echo'<input type="text" name="temps" placeholder="En minutes" style=" margin-top:10px;" value="'.$datarecette['temps'].'"/>'?>
                </div>
                <div class="champ">
                  Portions
                  <?php echo'<input type="text" name="portions" style=" margin-top:10px;" value="'.$datarecette['portion'].'"/>'?>
                </div>
            <div class="champs">
                <div class="champ">
                  Catégorie
                  <?php echo'<input type="text" name="categorie" style=" margin-top:10px; margin-right:200px" value="'.$datarecette['categorie'].'"/>'?>
                </div>
                <div class="champ" style=" margin-top:0;">
                  Etapes
                  <?php echo'<textarea class="h" name="etapes"placeholder="Mettez chaque étape sur une ligne" style=" margin-top:10px;" >'.$datarecette['etapes'].'</textarea>'?>
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