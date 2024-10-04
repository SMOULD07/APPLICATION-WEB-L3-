<!DOCTYPE html>
<html>
    <body>
        <head>
            <title>Page admin</title>  
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
body{
   font-family: Poppins;
   margin: 0;
   height: 100%;
   overflow-x: hidden;
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
.admin input[type=text], .admin input[type=password]{
    border:none;
    border-bottom:1px solid rgb(245, 242, 93);
    font-family: Poppins;
    margin-left:30px;
    height: 30px;
}
.admin input:focus{
    border: none;
}
.admin img{
    width:150px;
    height:150px;
    position: absolute;
    left: 300px  ;
}
.admin input[type=submit]{
    background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
margin-left: 150px;
}

            </style>
        </head>
        <nav style="display: block;">

        <div class="links" style="display: flex; font-size: 1.1rem;">
         <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
         <div class="link" style="width:10rem"><a href="../index.php" style="text-decoration: none; color: black">Home</a></div>
        <div class="link"><a href="../recherche.php" style="color:black;cursor:pointer;text-decoration:none">Rechercher une Recette</a></div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="../inscription/contact.php" style="text-decoration: none; color: black">Contact</a></div>
        </div></nav>
        
         <div class="admin" style="border-radius:20px;box-shadow:0px 5px 15px rgba(0,0,0,0.25); height:400px; width:30%;left:35%;position:absolute;top:25%">
         <?php
         include_once('login.php');
         if(isset($erreur)){echo $erreur;}?>
         <img src="../images/meal.png" alt="">
        <form method="post" action="" style=" margin-top:100px;">
        <div class="champs" style="border-radius:10px;box-shadow:0px 5px 10px rgba(0,0,0,0.25);height:150px;width:300px;margin-left:70px">
            <p style="border-bottom : 2px solid rgb(245, 242, 93);width:15px;margin-left:30px">Connexion</p>
            <input type="text" name="pseudo" placeholder="E-mail">
            <input type="password" name="mdp" placeholder="Mot de passe"></div>
             <br><br>
             <input type="submit" name="valider" style=""/>
        </form>
        </div>
    </body>
</html>