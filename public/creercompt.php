<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <meta charset="decription" content="menu">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1 style="font-size: 50px; font-family: 'Courier New', Courier, monospace;">Team Manager</h1>
        </div>

        <div class="division">
            <h2>Création de compte</h2>
            <a class="lien" href="menu.html">Menu</a>
        </div>

        <form method="POST" action="">
            <fieldset>
                <label for="numdrh">Numéro de l'identifiant:</label>
                <input name="numdrh" type="tel" placeholder="entrer le numéro" style="width:432px; height:40px;" /> </br>
                <label for="nom">Nom:</label>
                <input name="nom" type="text" placeholder="entrer votre nom" style="width:432px; height:40px; margin-left: 187px;" /> </br>
                <label for="prenom">Prénom:</label>
                <input name="prenom" type="text" placeholder="entrer votre prénom" style="width:432px; height:40px; margin-left: 160px;" /> </br>
                <label for="mail">Email:</label>
                <input name="mail" type="email" placeholder="entrer votre mail" style="width:432px; height:40px; margin-left: 168px;" /> </br>
                <label for="mdp">Mot de passe:</label>
                <input name="mdp" type="password" placeholder="entrer votre mot de passe" style="width:432px; height:40px; margin-left: 105px;" /> </br><br>
                <input class="bouton" type="submit" name="btn" value="Valider" style="width:222px; height:40px;" />
            </fieldset>
        </form>
        <br> <br> 

        <?php
        require('db_connect.php');
        if(isset($_POST['btn']) && $_POST['btn']=='Valider') {
            $val= new db_obj;
            $val->host='localhost';
            $val->dbname='Gestion';
            $val->user='marina';
            $val->pass='cola14';
            $val->post_query($table='drh', $champs=array('num_drh', 'nom', 'prenom', 'email', 'password'), $valeur=array('numdrh', 'nom', 'prenom', 'mail', 'mdp'));
            
        }
        ?>
        <!--Après appui du bouton "Valider", il y aura l'affichage du message votre compte est créé.-->
        <a class="connec" href="connexion.html">Se connecter</a>
    </body>
</html>
