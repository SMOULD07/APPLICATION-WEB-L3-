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
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    </head>
    <nav style="display: block;">

     
     <div class="links" style="display: flex; font-size: 1.1rem;">
        <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
        <div class="link" style="width:10rem"><a href="first.php" style="text-decoration: none; color: black">Home</a> </div>
        <div class="link"><a href="recherche.php"style="color:black; text-decoration:none">Rechercher une Recette</a> </div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="contact.php" style="text-decoration: none; color: black">Contact</a></div>
        <div class="avatar"><a href="espaceuser.php" style="color: transparent"><img src="../images/chef.jpg" style="height:50px;border:.2px solid black; border-radius:25px;margin-right:50px"></a></div>
     </div>
    <div class="phrase" style="display: block; margin: 70pt 0 0 70pt; font-family: Poppins;">
        <div class="text" style="display: flex; font-size: 5rem;
         font-weight: 900;letter-spacing: 0.2rem;">
        <hh style="--i:1">D</hh>
        <hh style="--i:2">E</hh>
        <hh style="--i:3">C</hh>
        <hh style="--i:4">O</hh>
        <hh style="--i:5">U</hh>
        <hh style="--i:6">V</hh>
        <hh style="--i:7">R</hh>
        <hh style="--i:8">E</hh>
        <hh style="--i:9">Z</hh></div>
        <div class="text2" style=" margin-left:100pt;font-size: 4rem;
        font-weight: 400;letter-spacing: 0.2rem; ">NOS RECETTES</div>
           <p style="display:block;width:40%;margin:5% 0 0 5%;font-weight: 60;">  <h style="margin-left: 10px;">Découvrez</h> de nombreuses recettes pour cuisiner vos ingrédients préférés et que vous avez. En quelques clics, nous vous proposerons une liste de recettes de cuisine adaptée à vos possibilités, désormais vous ne manquerez pas d'inspiration.</p>
           <form method="post" action="second.php"><button class="button ingr" type ="button"><a href="second.php" style="color:white; text-decoration:none">Selon Ingrédients</a></button></form>
        </div>
    </nav>
    <section class="best" style="width:25rem; margin-left:60px;font-weight:600 ; font-size: x-large; border-bottom: .6px solid ;">Nos Meilleures recettes</section>
    <section class="hero-section">
     <div class="card-container" style="margin-bottom: 100px;">
        <div class="card">
            <div class="card-background"style="background-image:url(../images/Houmous.jpg)"></div>
            <h3 class="content">Houmous</h3>
            <div class="icone"><button><i style="font-size:30px; position: absolute; color: white; top:15px;left: 5px;" class="fa">&#xf005;</i></button></div>
        </div>
        <div class="card">
            <div class="card-background"style="background-image:url(../images/chouxalacreme.jpg);"></div>
            <h3 class="content">choux à la creme</h3>
            <div class="icone"><button><i style="font-size:30px; position: absolute; color: white; top:15px;left: 5px;" class="fa">&#xf005;</i></button></div>
        </div>
        <div class="card">
            <div class="card-background"style="background-image:url(../images/crepessarrasinaspergesetchampignons.png)"></div>
            <h3 class="content">Crepes au sarrasin asperges et champignons</h3>
            <div class="icone"><button><i style="font-size:30px; position: absolute; color: white; top:15px;left: 5px;" class="fa">&#xf005;</i></button></div>
        </div>
        <div class="card">
            <div class="card-background"style="background-image:url(../images/gateauaunoisettes.jpg)"></div>
            <h3 class="content">Gateau aux noisettes</h3>
            <div class="icone"><button><i style="font-size:30px; position: absolute; color: white; top:15px;left: 5px;" class="fa">&#xf005;</i></button></div>
        </div>
        <!--f762-->
        <div class="card">
            <div class="card-background"style="background-image:url(../images/pancakes.jpg)"></div>
            <h3 class="content">Pancakes</h3>
            <div class="icone"><i style="font-size:30px; position: absolute; color: white; top:15px;left: 5px;" class="fa">&#xf005;</i></div>
        </div>
     </div>
    </section>
    <section class="services" style="border-top: .5px solid grey; margin-bottom: 100px;">
        <div class="text3 "style=" margin-top:50px; text-align: center;">EASY MEALS est un outil pour <div class="word" style="margin-left:10px ;margin-right:10px "> BEAUCOUP 
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path fill="none" d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"/> </svg>
        </div>
          d'amateurs de cuisine quotidiennement</div>
        <div class="cartes">
            <div class="carte"> <h3>Plus de temps pour Netflix</h3>
                Parce que tu passeras moins de temps à te demander « On mange quoi ce soir ?”</div>
           
            <div class="carte"><h3 >Dis adieu au gaspillage</h3>
                La poubelle ne fait pas partie de ta famille/colloc, alors pourquoi continuer de la nourrir ?</div>
            <div class="carte"> <h3 >Des recettes à TA sauce</h3>
                Tu sais mieux que quiconque ce que tu aimes alors autant te laisser le choix.</div>
        </div>
        <div class="text4" style="margin-left: 300px;" >Et ce qui est encore plus magic, c'est que c'est <div class="word" style="margin-left:10px ;margin-right:10px"> GRATUIT 
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path fill="none" d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7" /> </svg>
            </div>
        </div>
    </section>


    
  </body>
</html>