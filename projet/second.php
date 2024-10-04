
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="style/ss.Css"/>
    <title>
      Idées de recettes faciles et rapides, selon ce que vous avez dans votre frigo
    </title>
</head>
<body>
<div class="links" style="display: flex; font-size: 1.1rem;">
        <div id="logo"><img src="images/pngfind.com-cartoon-fork-png-3309459.png" style="width: 40pt;"></div>
        <div class="link" style="width:10rem"><a href="index.php" style="color:black; text-decoration:none; cursor:pointer;">Home</a></div>
        <div class="link"><a href="recherche.php" style="color:black; text-decoration:none; cursor:pointer;">Rechercher une Recette </a></div>
        <div class="title">EASY MEALS</div>
        <div class="link">Ingredients </div>
        <div class="link"><a href="inscription/contact.php" style="text-decoration: none; color: black">Contact</a></div>
        <div class="link"><a href="inscripconx.php" style="color:black; text-decoration:none; cursor:pointer;">S'inscrire/Se connecter</a></div>
     </div>
<div class="contenu">
<?php include('$post.php')?>
  <form name="fo" method="post" action="export.php">
  <div class="search-input">
  <input type="text" placeholder="Qu'y à t-il dans votre frigo "/>
  <div class="autocomplete">
  <?php $db=new mysqli("localhost","root","","try");
mysqli_set_charset($db, "utf8");
$requete="select ingredient from ingredient";
                $d=$db->prepare($requete);
                $d->execute();
                $resultat = $d->get_result();
                while($row= $resultat->fetch_assoc()) {
                  echo '<li>'.$row['ingredient'].'</li>';
                }
 ?>
  </div>

<div id="checklist"></div>
</div>
  <div class="boxs" > 
    <ul class="ks-cboxtags" >
      <li><input type="checkbox" id="checkboxOne" name="ch[]"value="'pommes'" ><label for="checkboxOne">&#127822 Pommes</label></li>
      <li><input type="checkbox" id="checkboxTwo" name="ch[]" value="'Patates'"  ><label for="checkboxTwo">&#129364 Pommes de terre</label></li>
      <li><input type="checkbox" id="checkboxThree" name="ch[]" value="'Oeufs'"><label for="checkboxThree"> &#129370 Oeufs</label></li>
      <li><input type="checkbox" id="checkboxFour" name="ch[]" value="'Beurre'" ><label for="checkboxFour">🧈 Beurre</label></li>
      <li><input type="checkbox" id="checkboxFive" name="ch[]" value="'Carottes'"><label for="checkboxFive">&#129365 Carottes</label></li>
      <li><input type="checkbox" id="checkboxSix" name="ch[]"  value="'Viande Rouge'"><label for="checkboxSix">&#129385 Viande Rouge</label></li>
      <li><input type="checkbox" id="checkboxSeven" name="ch[]" value="'Tomates'"><label for="checkboxSeven">&#127813 Tomates</label></li>
      <li><input type="checkbox" id="checkboxEight" name="ch[]" value="'Farine'" ><label for="checkboxEight"><img src="https://cdn3.emoji.gg/emojis/6289_flour.png" width="17px" height="17px" alt="flour">Farine</label></li>
      <li><input type="checkbox" id="checkboxNine" name="ch[]" value="'lait'"><label for="checkboxNine">🥛 Lait</label></li>
      <li><input type="checkbox" id="checkboxTen"name="ch[]" value="'Riz'" ><label for="checkboxTen">🍚 Riz</label></li>
      <li><input type="checkbox" id="checkboxFifteen" name="ch[]" value="'chocolat'"><label for="checkboxFifteen">🍫	Chocolat</label></li>
      <li><input type="checkbox" id="checkboxEleven" name="ch[]" value="'Huile d'Olives'"><label for="checkboxEleven">	&#127870 Huile- d'Olive</label></li>
      <li><input type="checkbox" id="checkboxTwelve" name="ch[]"value="'oignons'" ><label for="checkboxTwelve">🧅 Oignons</label></li>
      <li><input type="checkbox" id="checkboxThirteen" name="ch[]" value="'sel'" ><label for="checkboxThirteen">🧂 Sel</label></li>
      <li><input type="checkbox" id="checkboxFourteen" name="ch[]" value="'Cheddar'" ><label for="checkboxFourteen">&#129472 Cheddar</label></li>
      <li><input type="checkbox" id="checkboxSixteen" name="ch[]" value="'Persil'"><label for="checkboxSixteen">&#127807 Persil</label></li>
      <li><input type="checkbox" id="checkboxSeventeen" name="ch[]" value="'ail'"><label for="checkboxSeventeen">🧄 Ail</label></li>
      <li><input type="checkbox" id="checkboxEighteen" name="ch[]" value="'huile'"><label for="checkboxEighteen">&#127805	 L'huile végétale</label></li>
      <li><input type="checkbox" id="checkboxNineteen" name="ch[]" value="'Cuisses de poulet'"><label for="checkboxNineteen">🍗	Cuisses de poulet</label></li>
      
      <li><input type="checkbox" id="twenty" name="ch[]"value="'Fraises'" ><label for="twenty">&#127827 Fraises</label></li>
      <li><input type="checkbox" id="twentyone" name="ch[]" value="'bananes'"  ><label for="twentyone">&#127820 Bananes</label></li>
      <li><input type="checkbox" id="twentytwo" name="ch[]" value="'eau'"><label for="twentytwo"> &#128167 Eau</label></li>
      <li><input type="checkbox" id="twentythree" name="ch[]" value="'pain'" ><label for="twentythree">&#127838	Pain </label></li>
      <li><input type="checkbox" id="twentyfour" name="ch[]" value="'champignons'"><label for="twentyfour">&#127812 Champignons</label></li>
      <li><input type="checkbox" id="twentyfive" name="ch[]"  value="'avocat'"><label for="twentyfive">&#129361	 Avocat</label></li>
      <li><input type="checkbox" id="twentysix" name="ch[]" value="'Spaghetti'"><label for="twentysix">&#127837 Spaghetti</label></li>
      <li><input type="checkbox" id="twentyseven" name="ch[]" value="'miel'" ><label for="twentyseven">&#127855 Miel</label></li>
      <li><input type="checkbox" id="twentyeight" name="ch[]" value="'Aubergines'"><label for="twentyeight">&#127814 Aubergines</label></li>
      <li><input type="checkbox" id="thirty" name="ch[]" value="'Sauce tomate'"><label for="thirty">&#129387	Sauce tomate</label></li>
      <li><input type="checkbox" id="thirtyone" name="ch[]" value="'citron'"><label for="thirtyone">	&#127819 Citron</label></li>
      <li><input type="checkbox" id="thirtytwo" name="ch[]"value="'crevettes'" ><label for="thirtytwo">&#127844 Crevettes</label></li>
      <li><input type="checkbox" id="thirtythree" name="ch[]" value="'salade'" ><label for="thirtythree">	&#129367 Salade</label></li>
      <li><input type="checkbox" id="thirtyfour" name="ch[]" value="'poires'" ><label for="thirtyfour">&#127824 Poires</label></li>
      <li><input type="checkbox" id="thirtyfive" name="ch[]" value="'peches'"><label for="thirtyfive">&#127825 Peches</label></li>
    </ul>
  </div>
    <input type="submit" class="valider" name="recherche" value="Rechercher">
  </form>
  </div>
  <script src="script.js"></script>
  <script src="suggestion.js"></script>
</body>
</html>
