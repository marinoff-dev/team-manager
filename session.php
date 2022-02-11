<?php
    session_start();
    if(@$_SESSION["autoriser"]!="oui") {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Session</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body onLoad="document.fo.login.focus()" style="overflow:hidden;">
        <header>
            <h1>Espace privé</h1>
            <a href="deconnexion.php">Quitter la session</a>
        </header>
        <hr/ style="color: #468ee0;width:60%; margin:80px auto;">
        <h1 style="color: black; padding-top:50px;">
        <?php echo (date("H")<18)?("Bonjour"):("Bonsoir"); ?>
        <span><?php echo $_SESSION["nomprenom"]; ?></span></h1>
        <div>
            <a id="lien" href="premier.php">Menu</a>
        </div>
    </body>
</html>