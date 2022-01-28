<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contrat</title>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <meta charset="decription" content="enregistrer contact">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <h1 style="font-size: 50px; font-family: 'Courier New', Courier, monospace;">Team Manager</h1>
        </div>
        <div class="division">
            <h2>Enregistrement de contrat</h2>
            <a class="lien" href="menu.html">Menu</a>
        </div>

        <form method="POST" action="">
            <fieldset>
                <legend>Informations sur le contrat</legend>
                    <label for="numcont">Numéro du contrat:</label>
                    <input name="numcont" type="tel" placeholder="entrer le numéro" style="width:432px; height:40px;" /> </br>
                    <label for="emp">Numéro de l'employé:</label>
                    <select>
                        <?php
                            require('../db_engine/db_connect.php');
                            $db_op=new db_obj;
                            $db_op->host='localhost';
                            $db_op->dbname='Gestion';
                            $db_op->user='marina';
                            $db_op->pass='cola14';
                            $req = $db_op->get_query($table='employe');
                            foreach($req as $row)
                            {
                               // echo '<option value = '.$row["num_emp"].'>'.$row['nom_emp']. ' '. $row['pre_emp'].'</option>";
                            }
                        ?>
                    </select>
                    <label for="dem">Date de démarrage:</label>
                    <input name="date" type="date" style="width:432px; height:40px;" /> </br>
                    <label for="init">Durée initiale:</label>
                    <input name="dur" type="number" style="width:432px; height:40px; margin-left: 35px;" /> </br>
                    <label for="fin">Date de fin réelle:</label>
                    <input name="datefin" type="date"  style="width:432px; height:40px; margin-left: 1px;" /> </br>
                    <input class="bouton" type="submit" name="btn" value="Valider" style="width:222px; height:40px;" />
            </fieldset>
            
        </form>

        <?php
        require('../db_engine/db_connect.php');
        if(isset($_POST['btn']) && $_POST['btn']=='Valider') {
            $val= new db_obj;
            $val->host='localhost';
            $val->dbname='Gestion';
            $val->user='marina';
            $val->pass='cola14';
            $val->post_query($table='contrat', $champs=array('numcont', 'dat_dem', 'durint', 'dat_fin_rel', 'employe'), $valeur=array('numcont', 'date', 'dur', 'datefin'));
            
        }


    ?>
        
        <!-- Après appui du bouton "Valider", il y aura affichage du message "Contrat enregistré !" -->

</html>


 	 	 	 	
