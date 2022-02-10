<?php
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$login=$_POST["login"];
    @$mail=$_POST["mail"];
    @$mdp=$_POST["mdp"];
    @$repass=$_POST["repass"];
    @$btn=$_POST["btn"];
    $message="";
    if(isset($btn)) {
        if(empty($nom)) $message="<li>Nom invalide!</li>";
        if(empty($prenom)) $message.="<li>Prénom invalide!</li>";
        if(empty($login)) $message.="<li>Login invalide!</li>";
        if(empty($mail)) $message.="<li>Email invalide!</li>";
        if(empty($mdp)) $message.="<li>Mot de passe invalide!</li>";
        if($mdp!=$repass) $message.="<li>Mots de passe non identiques!</li>";
        if(empty($message)) {
            include("connexion.php");
            $req=$db->prepare("SELECT id from user where login=? limit 1");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($login));
            $tab=$req->fetchAll();
            if(count($tab)>0) {
                $message="<li>Cet utilisteur existe déjà!</li>";
            }
            else {
                $ins=$db->prepare("insert into user(date, nomus, premus, login, mailus, pass) values(now(), ?, ?, ?, ?, ?)");
                if($ins->execute(array($nom, $prenom, $login, $mail, md5($mdp)))) {
                    header("location:login.php");
                }

            }
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Inscription</h1>
            <a href="login.php">Déjà inscrit ?</a>
        </header>
        <div class="erreur"><?php echo $erreur ?></div> 
        <form  name="fo" method="POST" action="" enctype="multipart/form-data">
            <label for="nom">Nom:</label></br>
            <input name="nom" type="text" placeholder="entrer votre nom" value="<?php echo $nom?>" /> </br></br>
            <label for="prenom">Prénom:</label></br>
            <input name="prenom" type="text" placeholder="entrer votre prénom" value="<?php echo $prenom?>" /> </br></br>
            <label for="log">Login:</label></br>
            <input name="login" type="text" placeholder="entrer votre nom d'utilisateur" value="<?php echo $login?>" /> </br></br>
            <label for="mail">Email:</label></br>
            <input name="mail" type="email" placeholder="entrer votre mail" value="<?php echo $mail?>" /> </br></br>
            <label for="mdp">Mot de passe:</label></br>
            <input name="mdp" type="password" placeholder="entrer votre mot de passe" value="<?php echo $mdp?>" /> </br><br>
            <label for="mdp">Confirmer le mot de passe:</label></br>
            <input name="repass" type="password" placeholder="confirmer le mot de passe" value="<?php echo $repass?>" /> </br><br>
            <input class="bouton" type="submit" name="btn" value="S'inscrire" />
        </form>
        <?php if(!empty($message)){ ?>
        <div id="message"><?php echo $message ?></div>
        <?php } ?>
    </body>
</html>

