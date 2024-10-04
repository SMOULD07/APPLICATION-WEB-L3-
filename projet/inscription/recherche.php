<?php
session_start();
if (!$_SESSION['user']){
    header('Location:inscripconx.php');
    }
?>
<!DOCTYPE html>
<html>
  <body>
    <head>
        <title>Recettes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
            *{
                font-family: Poppins;
            }
            nav{
    background-size: 100% 50rem;
    background-repeat: no-repeat;
}
#logo{
    margin:15px 7% 0 3%;
  
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
.recettes, .popups{
    display: grid;
    grid-template-columns: 25em 25em 25em;
  padding: 10px;
  align-content: center;
  justify-content: center;
}
.recettes img{
    width:20em;
    height: 20em;
}
.popups img{
    width: 10em;
    height: 10em;
    border-radius: 10px;
    
}
.recette .titre{
    justify-content: center;
    align-items: center;
    display: flex;
    width: 15em  ;
    font-size: 20px;
    font-weight: 800;
}

a{
    text-decoration: none;
    color:black;
    transition:0.5s;
}
.search-box{
    margin-left: 10px;
    font-size: 20px;
    border: solid .25em #000;
    display: inline-block;
    position: relative;
    border-radius: 2.5em;
}
.search-box input[type=text]{
    font-family: poppins;
    font-weight: bold;
    color:#000;
    width:2.3em;
    background-color: transparent;
    border: none;
    box-sizing: border-box;
    border-radius: 2.5em;
    transition: width 800ms cubic-bezier(0.68, -0.55, 0.27, 1.55) 150ms;
}
.search-box input[type=text]:focus{
    outline: none;
}
.search-box input[type=text]:focus,
.search-box input[type=text]:not(:placeholder-shown)
{
width: 50em;
transition: width 1s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}
.search-box input[type=text]:focus+
 button[type=reset],
 .search-box input[type=text]:not(:placeholder-shown)+button[type=reset]{
transform:rotate(-45deg) translateY(0);
transition: transform 150ms ease-out 800ms;
}
.search-box input[type=text]:focus+
 button[type=reset]::after,
 .search-box input[type=text]:not(:placeholder-shown)+button[type=reset]::after{
opacity: 1;
transition: top 150ms ease-out 950ms,
right 150ms ease-out 950ms,
opacity 150ms ease 950ms;
}
.search-box button[type=reset]{
 background-color: transparent;
 width:1.4em;
height:1.4em;
border:0;
padding: 0;
outline: 0;
display: flex;
justify-content: center;
align-items: center;
position: absolute;
top: .55em;
right: .55em;
transform: rotate(-45deg)translateY(2.27em);
transition: transform 150ms ease-out 150ms;
}
.search-box button[type=reset]::before,
.search-box button[type=reset]::after{
    content: "";
    background-color: #000;
    width: .3em;
    height: 1.2em;
    border-radius: 10px;
    position: absolute;
}
.search-box button[type=reset]::after{
    transform: rotate(-90deg);
    opacity: 0;
    transition: transform 150ms ease-out,opacity 150ms ease-out;
}
.popup{
    visibility: hidden;
    position: fixed;
    top: 120px;
  left: 30%;
  width: 250px;
  opacity: 0;
  background-color: white;
  border-radius: 10px;
  transform: translate(-50%,-50%);
  box-shadow: 0 5px 30px rgba(0,0,0,.30);
  transition: 0.5s;
}
#rec.active{
    filter:blur(20px);

}
.popup.active{
    left: 50%;
    top: 50%;
    visibility: visible;
    opacity: 1;
transition: 0.5s;
}
.gg{
    font-weight: 500;
}
    </style>
       
    </head>
    <nav style="display: block;">

     
     <div class="links" style="display: flex; font-size: 1.1rem;">
        <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
        <div class="link" style="width:10rem"><a href="first.php" style="text-decoration: none; color: black">Home</a> </div>
        <div class="link"><a href="recherche.php"style="border:none;background-color:white;cursor:pointer;font-family:Poppins;font-size: 1.1rem;">Rechercher une Recette</a> </div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="contact.php" style="text-decoration: none; color: black">Contact</a></div>
        <div class="avatar"><a href="espaceuser.php" style="color: transparent"><img src="../images/chef.jpg" style="height:50px;border:.2px solid black; border-radius:25px;margin-right:50px"></a></div>
     </div>
</nav>
<section class="recherche" style="margin: 5rem 0 5rem 0; display:flex" >
        <div class="texte" style=" margin-left:60px;font-weight:600 ;display:flex;">
            <div class="rec" >
            Recherchez des recettes</div> 
         <form class="search-box">
            <input type="text" placeholder=" " id="searchbar"/>
            <button class="button" type="reset"> </button>
        </form></div>
<div class="custom-select" style="width:600px; justify-content:end;display:flex">
  <select>
    <option value="0">Catégorie</option>
    <option value="1">Petit-Déjeuner</option>
    <option value="2">Desserts</option>
    <option value="3">Plats</option>
    <option value="4">Boissons</option>
    
  </select>
</div>
    </section>
     <?php
     $db=new mysqli("localhost","root","","try");
     mysqli_set_charset($db, "utf8");
     $sql="select id,nom,images,etapes,portion,temps,likes from recette   ";
$stmt=$db->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

?>
<div class="recettes" id="rec">
<?php
$i=1;
$pseudo=$_SESSION['user'];
while( $row=$result->fetch_array()){
    ?>
    
<div class="recette <?php echo $i?>"  style="width:fit-content;margin-bottom:8rem" >
<button id="<?php echo $i?>" onclick="toggle(this.id)" style="border:none;border-radius:10px;cursor:pointer" >
    <img src="../images/<?php echo $row['images'] ; ?>"> 
    <div class="titre"><?php echo $row['nom'];?></div>
</button>
<?php 
$data=new mysqli("localhost","root","","try");
$requete="select id from utilisateurs where pseudo= ?";
$st=$data->prepare($requete);
$st->bind_param("s",$pseudo);
$st->execute();
$resulta=$st->get_result()->fetch_assoc();

try 
{
    $bdd = new PDO("mysql:host=localhost;dbname=try;charset=utf8", "root", "");
}
catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}
$requete="select * from likes where recette_id=".$row['id']." and user_id=".$resulta['id']."";
$st=$bdd->prepare($requete);
$st->execute();
$data = $st->fetch();
$rw = $st->rowCount();

    //lutilisateur a deja liké le post
echo' <div class="like" id="'.$row['id'].'">';
if($rw==0){
echo'<img class="like-icon" src="../images/heart.svg" style="height:25px; width:25px">'.$row['likes'].'';}
else if($rw==1){ echo'<img class="like-icon" src="../images/redheart.png" style="height:25px; width:25px">
  '.$row['likes'].'';}
?>
</div>
</div>   <?php  
$i++;}
$sql="select nom,images,etapes,portion,temps from recette";
$stmt=$db->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

?>
</div>
<div class="popups" >
<?php
$i=1;
while( $row=$result->fetch_array()){
    $pop='popup'.$i;
    ?>
    
<div class="popup" id="<?php echo $pop?>" style="width:fit-content;margin-bottom:8rem" >
<div class="titre" style="left:30%;position:absolute;font-weight:800;margin-bottom:100px"><?php echo $row['nom'];?>
<div class="gg">Temps de préparation: <?php echo $row['temps'];?> mins</div>
    <div class="gg">Portions: <?php echo $row['portion'];?></div></div>
    <img src="../images/<?php echo $row['images'] ; ?>"> 
    
    <div class="description" style="display:flex;font-weight:800">
    Etapes : 
    <div class="etapes" style="width:600px;font-weight:400"><?php echo $row['etapes'];?></div>
</div>


</div>   <?php  
$i++;}
?>

    <script>
     const searchbar=document.querySelector("#searchbar");
     searchbar.addEventListener("keyup",(e)=>{
        const searchedletter=e.target.value;
        
        const titles=document.querySelectorAll(".titre");
        const card=document.querySelectorAll(".recette");
        filterElements(searchedletter,card,titles);
     });
     function filterElements(letters,elements,title){
        if(letters.length >2){
            for(let i=0;i<title.length;i++){
                if(title[i].textContent.toLowerCase().includes(letters)){
                    elements[i].style.display="block";
                }
                else{
                    elements[i].style.display="none";
                }
            }
        }
     }
     function toggle(clicked_id){
        var blur=document.querySelector("#rec");
        blur.classList.toggle('active');
        var id=clicked_id;
      var pop="popup"+id;
      
      var popup=document.getElementById(pop);
        popup.classList.toggle('active');
     }
    </script>
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.like').click(function() {
                var recette_id = $(this).attr('id');
                var i=$(this).children('img').attr("src");
                if(i=="../images/heart.svg"){
                    $(this).children(".like-icon").attr("src","../images/redheart.png");
                }
                else if(i=="../images/redheart.png"){
                    $(this).children("img").attr("src","../images/heart.svg");
                }
                $.post("getajax.php",{data: recette_id, how:'c'}, function(data){alert(data)});
            });
        });
    </script>