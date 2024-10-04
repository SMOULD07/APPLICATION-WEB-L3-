<?php
session_start();
if (!$_SESSION['admin']){
header('Location:connexionadmin.php');
}
else{
echo "bonjour".$_SESSION['admin'];}
?>
<!DOCTYPE html>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Page admin</title>  
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
body{
   font-family: Poppins;
   margin: 0;
   height: 100%;
   overflow-x: hidden;
}
html{
    scroll-behavior: smooth;
    font-family: Poppins;
}
ul{
    list-style: none;
    height: 100%;
    width: 200px;
    position: fixed;
    top:-15px;left: 0;
    background: #2f2f2f
}
ul li{
    margin: 5px;
    padding:5px;
    margin-top: 75px;
}
ul li a{
    color: white;
    text-decoration: none;
    font-size: 20px;
    padding: 5px;
    font-weight: 800;
}
ul li a:hover{
    background-color: white;
    color: blue;
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
section{
    margin-right:25px;
    height:100%
}
.ticket{
    margin-right: 50px;
}
.tickets{
    display: flex;
    align-items: center;
    justify-content: center;
}
.recent-recipe{
    display: flex;
}
.recent-recipe img{
width:280px;
height: 150px;
margin-right: 20px;
}
.recent{
    display:block
}
.nom-recette{
    font-weight: 700;
    font-family: Poppins;
    font-size:20px;
}
section table td{
    padding: 5px 30px;
}
section table tr:nth-child(2n){
    background-color: #f6f6f8;
}
section table tr:nth-child(2n) td{
    border-bottom: 1px solid #e0e0e0;
    border-top:1px solid #e0e0e0 ;
}
.entete button{
    width:100px;
    height: 35px;
    margin-left:50%
}
section th{
    font-size:16px;
    border-bottom:3px solid rgb(245, 242, 93);
    padding:5px 20px;
}
section table img{
    height:25px
}
.btn-add{
    background-color: black;
    width: fit-content;
    margin-left: 50%;
    margin-bottom: 20px;
    padding:5px 20px;
    color:#fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0;
}
.btn-add img{
    margin-right: 5px;
    height: 20px;
}
            </style>
            </head>
 <nav style="display: block; position: absolute; left:17%;display:flex">
 <div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
 <a href="logout.php" style="text-decoration:none;left:1700%;position:absolute;width:200px;top:20px">Se-Déconnecter</a>
 </nav>
<ul>
    <li><a href="#home">Home</a></li>
    <li><a href="#utilisateurs">Utilisateurs</a></li>
    <li><a href="#recettes"> Recettes</a></div></li>
    <li><a href="#ingredients"> Ingrédients</a></div></li>
</ul>
<div class="menu" style="margin-left:300px;margin-top:100px;">
    <section id="home" style="align-items:center;justify-content:center">
<div class="tickets">
    <div class="ticket"  style="background-color:#8fd3fe; width:200px;height:100px">
    <i style="font-size:50px; position: absolute; color: white; margin-left:5px;margin-top:5px" class="fa">&#xf007;</i>
    <div class="details" style="margin-top:22px;margin-left:55px; font-size: 20px; color:white">
        <?php 
        $db=new mysqli("localhost","root","","try");
        mysqli_set_charset($db, "utf8");
        $sql="select count(*) from utilisateurs";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();
        print'<div class="number" style="font-weight:800" >'.(implode('',$row)).'</div>';
        ?>
         Utilisateurs
        </div>
</div>
<div class="ticket"   style="background-color:#ff4f4b; width:200px;height:100px">
        <i style="font-size:50px; position: absolute; color: white; margin-left:5px;margin-top:5px" class="fa">&#xe2ea;</i>
    <div class="details" style="margin-top:22px;margin-left:55px; font-size: 20px; color:white">
        <?php 
        $sql="select count(*) from recette";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();
        print'<div class="number" style="font-weight:800" >'.(implode('',$row)).'</div>';
        ?>
         Recettes
        </div>
</div>

<div class="ticket"   style="background-color:#90ee90; width:200px;height:100px">
        <i style="font-size:50px; position: absolute; color: white; margin-left:5px;margin-top:5px" class="fa">&#xf007;</i>
    <div class="details" style="margin-top:22px;margin-left:55px; font-size: 20px; color:white">
        <?php 
        $sql="select count(*) from ingredient";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();
        print'<div class="number" style="font-weight:800" >'.(implode('',$row)).'</div>';
        ?>
         Ingredients
        </div>
</div>
</div>
<h2> Recettes les plus récentes</h2>
<?php $sql="SELECT images,nom FROM recette ORDER BY ID DESC LIMIT 4"; //selectionner les 4 dernieres recettes ajoutées
$stmt=$db->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
?>
<div class="recent-recipe">
<?php
while($row=$result->fetch_array()){
    ?>
        <div class="recent">
        <div class="image">
        <img src="../images/<?php echo $row['images']; ?>">
        </div>
        <div class="nom-recette">
        <?php echo $row['nom']; ?>
        </div>
        </div>
    <?php

}
?>
 </div>
    </section>

    <section id="utilisateurs" > 
    <div class="entete" style="display:flex"><h2> Utilisateurs</h2></div>
    <?php
            $requete="select * from utilisateurs";
            $stm=$db->prepare($requete);
            $stm->execute();
            $resultat=$stm->get_result();
while ($ligne = $resultat->fetch_assoc()) {
    $valeurs[] = array(
        'pseudo' => $ligne['pseudo'],
        'mail' => $ligne['mail'],
        'date-inscription' => $ligne['date-inscription'],
        'id_user'=>$ligne['id'],
    );
}
?>
<div class="users">
<table>
<?php
echo '<tr>
<th>Pseudo</th>
<th>E-mail </th>
<th>Date-inscription </th>
<th>Supprimer </th>
</tr>
';
if(!empty($valeurs)){
foreach($valeurs as $vl){
    echo '
    <tr>
        <td>'.$vl['pseudo'].'</td>
        <td>'.$vl['mail'].'</td>
        <td>'.$vl['date-inscription'].'</td>
        <td><a href="delete.php?id='.$vl['id_user'].'"><img src="../images/bouton-supprimer.png"></a> </td>
    </tr>
    ';
}}
else{
    print('Il n\'y a toujours pas d\'utilisateurs inscrits');
}
?>
</table>
</div>
    </section>
    <section id="recettes" style="height:350%">
        <div class="entete" style="display:flex"><h2> Recettes</h2>  <a href="formulaire.php" class="btn-add"><img src="../images/plus.png">Ajouter</a></div>
    <?php
            $sql="select * from recette";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $result=$stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $values[] = array(
        'nom' => $row['nom'],
        'image' => $row['images'],
        'categorie' => $row['categorie'],
        'id_recette'=>$row['id'],
        'auteur'=>$row['auteur']
    );
}
?>
<div class="recettes">
<table>
<?php
echo '<tr>
<th>Image</th>
<th>Nom </th>
<th>Catégorie </th>
<th>Auteur</th>
<th>Modifier </th>
<th>Supprimer </th>
</tr>
';
foreach($values as $v){
    echo '
    <tr>
        <td> '?> <img src="../images/<?php echo $v['image'];?>" style="width:100px; height:100px"></td>
        <?php
         echo'
        <td>'.$v['nom'].'</td>
        <td>'.$v['categorie'].'</td>
        <td>'.$v['auteur'].'</td>
        <td> <a href="update.php?updateid='.$v['id_recette'].'"> <img src="../images/bouton-modifier.png"></a> </td>
        <td><a href="delete.php?id='.$v['id_recette'].'"><img src="../images/bouton-supprimer.png"></a> </td>
    </tr>
    ';
}
?>
</table>
</div>
    </section>

    <section id="ingredients"><div class="entete" style="display:flex"><h2> Ingrédients</h2> <a href="formulaire.php" class="btn-add"><img src="../images/plus.png">Ajouter</a></div>
    <?php
            $sql="select * from ingredient";
            $st=$db->prepare($sql);
            $st->execute();
            $ingredient=$st->get_result();
?>
<div class="ingredients">
<table>
<?php
echo '<tr>
<th>Id </th>
<th>Nom </th>
<th>Modifier </th>
<th>Supprimer </th>
</tr>
';
while ($row = $ingredient->fetch_assoc()) {
    echo '
    <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['ingredient'].'</td>
        <td> <a href="update.php?updateingr='.$row['id'].'"> <img src="../images/bouton-modifier.png"></a> </td>
        <td><a href="delete.php?idingr='.$row['id'].'"><img src="../images/bouton-supprimer.png"></a> </td>
    </tr>
    ';
}
?>
</table>
</div></section>
</div>