<?php ob_start(); ?>
<div>
    <h2>Enregistrement d'employé</h2>
</div>
<form method="POST" action="premier.php?controller=employe">

    <label for="numemp">Numéro de l'employé:</label></br>
    <input name="numemp" type="tel" placeholder="entrer le numéro" /> </br></br>
    <label for="nom">Nom:</label></br>
    <input name="nomemp" type="text" placeholder="entrer le nom" /> </br></br>
    <label for="prenom">Prénom:</label></br>
    <input name="preemp" type="text" placeholder="entrer le prenom" /> </br></br>
    <label for="emb">Date d'embauche:</label></br>
    <input name="datemb" type="date" /> </br></br>
    <label for="durcont">Durée du contrat:</label></br>
    <input name="durcont" type="tel" placeholder="entrer la durée" /> </br></br>
    <input class="bouton" type="submit" name="btn" value="Valider" />
            
</form>

<?php
	$content = ob_get_clean();
	require('template.php');
?>