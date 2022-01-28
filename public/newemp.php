<!DOCTYPE html>
<html>
    <head>
        <title>Employé</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <meta charset="decription" content="enregistrer employe">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1 style="font-size: 50px; font-family: 'Courier New', Courier, monospace;">Team Manager</h1>
        </div>
        <div class="division">
            <h2>Enregistrement d'employé</h2>
            <a class="lien" href="menu.html">Menu</a>
        </div>
    <form method="POST" action="">
    <fieldset>
            <legend>Informations sur l'employé</legend>

                <label for="numemp">Numéro de l'employé:</label>
                <input name="numemp" type="tel" placeholder="entrer le numéro" style="width:432px; height:42px;" /> </br>
                <label for="nom">Nom:</label>
                <input name="nom_emp" type="text" placeholder="entrer le nom" style="width:432px; height:40px; margin-left:150px;" /> </br>
                <label for="prenom">Prénom:</label>
                <input name="pre_emp" type="text" placeholder="entrer le prenom" style="width:432px; height:40px; margin-left:122px;" /> </br>
                <label for="emb">Date d'embauche:</label>
                <input name="datemb" type="date" style="width:432px; height:40px; margin-left:40px;" /> </br>
                <label for="durcont">Durée du contrat:</label>
                <input name="durcont" type="number" placeholder="entrer la durée" style="width:432px; height:40px; margin-left:30px;" /> </br>
            </fieldset>
            <input class="bouton" type="submit" name="btn" value="Valider" style="width:222px; height:40px;" />
    </fieldset>
    </form>

    <?php
        require('db_connect.php');
        if(isset($_POST['btn']) && $_POST['btn']=='Valider') {
            $val= new db_obj;
            $val->host='localhost';
            $val->dbname='Gestion';
            $val->user='marina';
            $val->pass='cola14';
            $val->post_query($table='employe', $champs=array('num_emp', 'nom_emp', 'pre_emp', 'dat_emb'), $valeur=array('numemp', 'nom', 'pre_emp', 'datefin'));
        }


    ?>
