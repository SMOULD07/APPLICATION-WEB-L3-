<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>Inscription et connexion- Site Culinaire</title>
    <link rel="stylesheet" href="stylecss1.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css  ">
  </head>
  <body>
    <style>
      .alert{
        background-color: #ffa3a6;
        border: .2px solid red;
        width: max-content;
        position: absolute;
        left: 30%;
        top:5%
      }
      input[type="text"],input[type="password"]{
        border:.2px solid grey
      }
      </style>

    <div class="background-image">

    </div>
    
<div class="container" id="container">

    <div class="form-container register-container">
    <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
      <form action="inscription.php" method="post" >
      <h1>Inscrivez vous ici.</h1>
      <input type="text" placeholder="Pseudo" name="pseudo">
      <input type="text" placeholder="E-mail" name="email">
      <input type="password" placeholder="Mot de passe" name="password" > 
      <input type="password" placeholder="Confirmez votre mot de passe" name="password_retype" > 
      <input type="submit" name="inscription" style="border-radius:25px;background-color:#ffffe0;">
      <span >Ou utilisez votre compte </span>
      <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
         <a href="#" class="social"><i class="lni lni-google"></i> </a>
         <a href="#" class="social" ><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class=" form-container login-container">
    <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
                <form action="connexion.php" method="post" >
                <h1>Connectez  vous ici.</h1>
        <input type="text" placeholder="email" name="email" >
        <input type="password" placeholder="password" name="password"> 
        <input type="submit" name="envoyer" style="border-radius:25px;background-color:#ffffe0;">
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
             <label for="checkbox"> Remember me</label>
        </div>
        <div class="pass-link">
          <a href="#">Mot de passe oublié ?</a>
        </div>
        </div>
        <span >Ou utilisez votre compte </span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i> </a>
          <a href="#" class="social" ><i class="lni lni-linkedin-original"></i></a>

        </div>


      </form>
    </div>
  
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left"> 
         
          <h1 class="title"> Hello <br> Friend </h1> 
          <p>Si vous avez un compte , Connectez vous  découvrir des recettes délicieuses 
            qui correspondent aux ingrédients que vous avez sous la main ! </p>
          <button class="ghost" id="login"> Se connecter 
            <i class="lni lni-arrow-left login"></i>
          </button >
        </div>
        <div class="overlay-panel overlay-right"> 
          <h1 class="title"> Commencez a <br> Cuisiner maintenant </h1> 
          <p>Si vous n'avez pas de compte , joingez nous </p>
          <button class="ghost " id="register"> S'inscrire
            <i class="lni lni-arrow-right register"></i>
          </button >
        </div>

        
      </div>
    </div>
</div>

<script>
  const registerButton = document.getElementById('register');
const loginButton = document.getElementById('login');
const container = document.getElementById('container');

registerButton.addEventListener('click', () => {
container.classList.add("right-panel-active");
});

loginButton.addEventListener('click', () => {
container.classList.remove("right-panel-active");
});
</script>


</body>
</html>