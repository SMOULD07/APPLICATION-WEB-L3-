
 <!doctype html>
<html>
<head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    .text{
        position: absolute;
   font-family:Poppins;
   font-weight: 700;
   text-transform: uppercase;
   text-align: center;}
   #logo{
    margin:15px 7% 0 3%;
  
}

.Repas button, .Temps button{
  display:block;
}
.Repas, .Temps{
  display: block;
}
.link{
    margin-top:  20px;
    width:12rem
}
.title{
    width: 777rem;
    margin-top:  20px;
    text-align: center;
    font-weight: 700
}
 </style>
    <link rel="stylesheet" href="../style/ss.css"/>
    <title>
      Idées de recettes faciles et rapides, selon ce que vous avez dans votre frigo
    </title>
</head>
<body>
<nav style="display: block;">
<div class="links" style="display: flex; font-size: 1.1rem; margin-bottom: 120px;">
<div id="logo"><img src="../images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
        <div class="link" style="width:10rem"><a href="index.php" style="text-decoration: none; color: black">Home</a></div>
        <div class="link"><a href="recherche.php" style="color: black; text-decoration:none">Rechercher une Recette</a></div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="inscription/contact.php" style="text-decoration: none; color: black">Contact</a></div>
        <div class="avatar"><a href="espaceuser.php" style="color: transparent"><img src="../images/chef.jpg" style="height:50px;border:.2px solid black; border-radius:25px;margin-right:50px"></a></div>
</div>
</nav>


<?php
 
$db=new mysqli("localhost","root","","try");
mysqli_set_charset($db, "utf8");
include('$post.php');
?>
<div class="custom-select" style="width:600px; justify-content:end;display:flex">
  <select id="categorie">
  <option value="0">Catégorie</option>
    <option value="1">petit déjeuner</option>
    <option value="2">dessert</option>
    <option value="3">repas</option>
    <option value="4">salade</option>
    <option value="5">apéritif</option>
    <option value="6">boisson</option>

    
  </select>
</div>
<?php
$sql="select recette.id,nom,images,etapes,portion,temps,categorie from recette
inner join recette_ingredient_quantite iqu 
on recette.id=iqu.id_recette 
inner join ingredient
on ingredient.id=iqu.id_ingredient where ingredient=$chs ";
$stmt=$db->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
?>

<?php
$in=array();
while( $row=$result->fetch_array()){
  if (in_array($row['nom'],$in)){
    continue;
  }
    else{
?>
<div class="cont_central">
    <div class="cont_modal cont_modal_active">
       <div class="cont_photo">
         <div class="cont_img_back">
         
          <!--echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"" />';*/-->
          <img src="../images/<?php echo $row['images']; ?>">
         </div>
       <div class="cont_mins">
         <div class="sub_mins">
            <h3><?php echo $row['temps'] ?></h3>
            <span>MINS</span>
         </div>
       </div>
       <div class="cont_servings">
          <h3><?php echo $row['portion'] ?></h3>
         <span>SERVINGS</span>
       </div>
       <div class="cont_detalles">
          <h3><?php 
          print($row['nom']); 

          ?></h3>
          <div class="cate" style="opacity:0">
          <?php print $row['categorie']; 
          ?> </div><?php
          array_push($in,$row['nom']); ?>
          <p>orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis est est aliquam, sed faucibus massa lobortis. Maecenas non est justo.</p>
       </div>
       </div>
            <div class="cont_text_det_ingredient">
              <h3> Ingrédients :</h3>
              <?php 
                $ingredients="select ingredient from ingredient inner join recette_ingredient_quantite iqu on 
                ingredient.id=iqu.id_ingredient where id_recette=?";
                $requete=new mysqli("localhost","root","","try");

                mysqli_set_charset($requete, "utf8");
                $d=$requete->prepare($ingredients);
                $d-> bind_param('i',$row['id']);
                $d->execute();
                $resultat = $d->get_result();
                while($row1= $resultat->fetch_assoc())
                {
                  $ingr="'".$row1['ingredient']."'";

                  if (in_array($ingr,$ch)){
                   echo '<div style=" font-weight:600">'.$row1['ingredient'].'</div>'.'<br>';
                  } 
                  else{
                    echo '<span style="color:red;font-weight:600">'.$row1['ingredient'].'</span>'.'<br>';
                  }
                }?>
                <h3> Etapes :</h3><?php
                echo $row['etapes']; array_push($in,$row['nom']);
              
                 ?>
             </div>
    </div>
             <div class="cont_btn_open_dets">
  <a href="#e">Lire plus</a>
  </div>
        </div>  
<?php
}}
?>
<script>
var e = document.getElementById("categorie");
const text = e.options[e.selectedIndex].text;
var recipe_category=document.querySelectorAll(".cate");
var recipe=document.querySelectorAll(".cont_central");
if(e.options[e.selectedIndex].value>0){
for(let i=0; i<recipe.length;i++){
   if(recipe_category[i].innerHTML.trim()==text){
     recipe[i].style.display="block";}
    else{
      recipe[i].style.display="none";
    } }
  }
/*e.onclick = function() {
  var opts = categorie.options;
  for (var opt, j = 0; opt = opts[j]; j++) {
    if (opt.value == e) {
      $('select option:selected').removeAttr('selected');
      categorie.selectedIndex = j;
      break;
    }
  }}*/
</script>
</body>
</html>