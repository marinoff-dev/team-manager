<?php 
    session_start();
    @$login=$_POST["login"];
    @$mdp=$_POST["mdp"];
    @$btn=$_POST["btn"];
    $message="";
    if(isset($btn)) {
        include("connexion.php");
        $res=$db->prepare("select * from user where login=? and pass=?");
        $res->execute(array($login, md5($mdp)));
        if($res->rowCount()==0){
            $message="<li>Mauvais login ou mot de passe!</li>";
        }else {
            $tab=$res->fetch();
            $_SESSION["autoriser"]="oui";
            $_SESSION["nomprenom"]=$tab["nomus"]." ".$tab["premus"];
            header("location: session.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Authentification</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Authentification</h1>
            <a href="inscription.php">S'inscrire</a>
        </header>
        <form method="POST" action="login.php">
            <label for="prenom">Login:</label><br/>
            <input name="login" type="text" placeholder="entrer votre nom d'utilisateur" value="<?php echo $login?>" /> </br><br/>
            <label for="mdp">Mot de passe:</label><br/>
            <input name="mdp" type="password" placeholder="entrer votre mot de passe" value="<?php echo $mdp?>" /> </br><br/>
            <input class="bouton" type="submit" name="btn" value="S'authentifier" />
        </form>
        <?php if(!empty($message)){ ?>
        <div id="message"><?php echo $message ?></div>
        <?php } ?>
    </body>
</html>
