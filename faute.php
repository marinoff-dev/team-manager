<?php ob_start(); ?>
<div>
    <h2>Enregistrement de faute</h2>
</div>
<form name="fo" method="POST" action="premier.php?controller=faute">
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
    <label for="typ_faut">Type de la faute:</label><br><br>
    <label style="text-align:center;">Légère</label><input style=" width:25px;" type="radio" name="fa" id="grav" value="l" required="" /><br>
    <label style="text-align:center;">Grave</label><input style="width:25px;" type="radio" name="fa" id="leger" value="g" required="" /><br><br>
    <label for="description">Description de la faute:</label> <br>
        <textarea name="area" placeholder="Décrivez la faute" style="width:432px; padding:10px; border:1px solid #acacac;" required="" ></textarea></br></br>
    <input class="bouton" type="submit" name="btn" value="Valider" />
    
            
</form>

<?php
	$content = ob_get_clean();
	require('template.php');
?>