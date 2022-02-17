<?php ob_start(); ?>
<div>
    <h2>Renouvellement de contrat</h2>
</div>
<form name="fo" method="POST" action="premier.php?controller=contrat">
    <label for="emp" >Sélectionner l'employé:</label> <br>
   
    <?php
            require('model.php');
            echo ' <select name="numemp" id="emp" style="width:432px;
            height:40px;
            border-radius: 5px;
            border:solid 2px #468ee0;
            margin-bottom:10px;" class="sel">';
            
            $db=new crud();
            $employe=$db->read($table='employe', $field='*');
            while($value= $employe->fetch()) {
                echo ('<option value='.$value['numemp'].'>'.$value['nomemp'].' '.$value['preemp'].'</option>');
            }
            echo ' </select>';
            
    ?>
        <br><br>
    <label for="dem">Date de démarrage:</label></br>
    <input name="date" type="date" id="dem" /> </br></br>

    <label for="init">Durée initiale:</label></br>
    <input name="dur" type="tel" id="init" /> </br></br>

    <label for="fin">Date de fin réelle:</label></br>
    <input name="datefin" type="date" id="fin" /> </br></br>
    <input class="bouton" type="submit" name="btn" value="Modifier" />
            
</form>

<?php
	$content = ob_get_clean();
	require('template.php');
?>