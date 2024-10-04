<?php
 $db=new mysqli("localhost","root","","try");
 mysqli_set_charset($db, "utf8");
 $id_user=$_GET['updateid'];
            $stm=$db->prepare("select * from utilisateurs");
            $stm->execute();
            $user=$stm->get_result()->fetch_assoc();
            $stm->close();
            ?>
 <form method="post">
                <h1>Modifier un utilisateur</h1>
       <?php
        echo'<input type="text" placeholder="Pseudo" name="pseudo" value="'.$user['pseudo'].'">
         <input type="text" placeholder="email" name="email" value="'.$user['mail'].'" >'?>
        <input type="submit" name="modifier" style="border-radius:25px;background-color:#ffffe0;" value="Modifier">
       <?php 
        if(isset($_POST['modifier'])){
            $pseudo=$_POST['pseudo'];
            $mail=$_POST['email'];
        $stm=$db->prepare("UPDATE utilisateurs SET pseudo= '$pseudo', mail= '$mail' WHERE id = $id_user");
        $stm->execute();
        if($stm){
        header('Location: espaceuser.php?updateid='.$id_user.'');}
       }
        ?>