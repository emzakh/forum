<!-- 1. -->
<?php

session_start();
if(isset($_POST['login'])){ //6.// 
    if($_POST['login']!="" && $_POST['password']!=""){
        //8.//
        require "connexion.php";
        $login=htmlspecialchars($_POST['login']);
        $connexion = $bdd->prepare("SELECT id,login,password,role FROM members WHERE login=?");
        //prepare car inconnu, apres prepare ->execute//
        $connexion->execute([$login]);
        if($info=$connexion->fetch()){
            //9.//
            if(password_verify($_POST['password'],$info['password'])){
                $_SESSION['login']=$info['login'];
                $_SESSION['id']=$info['id'];
                $_SESSION['role']=$info['role'];
            }else{

            }
        }else{
            $error="Votre login ou votre mot de passe est incorrect";
        }
    }else{
        $error="Veuillez remplir le formulaire";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Document</title>
</head>
<body>
    <?php
     if(isset($_GET['register'])){ //5.//
        echo "<div class='success'>Vous êtes bien enregistré sur le site! Connectez-vous!</div>";
     }
    ?>

    <form action="index.php" method="POST">
         <!-- $_POST vient d'ici, du formulaire-->
     <div>
        <label for="login">Login: </label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password"> 
   
    </div>

    <div>
        <input type="submit" value="Connexion">
    </div>

     <?php
        //7.//
        if(isset($error)){
            echo "<div class='error'>".$error. "</div>";
        }

     ?>




    </form>

    <div>
    <a href="inscription.php">Pas encore inscrit?</a>
    </div>

</body>
</html>