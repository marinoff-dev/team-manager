<?php ob_start(); ?>
<form method="POST" action="premier.php?controller=research">
    <label for="emb">Entrer une date:</label></br>
    <input name="rec" type="date" /> </br></br>
    <input class="bouton" type="submit" name="btn" value="Valider" />
            
</form>
<?php
    require('controller.php');
    $table='contrat'; $field='*'; $value='?'; $data=$_POST['rec'];
	$req=$db->rechercher($table, $field, $value, $data);
    echo '<table border="1" width="400">';
    if($req->rowCount()!=0) {
        echo '<tr><th colspan="1">&nbsp;</th><th>Numéro du contrat</th><th>Date de démarrage</th>Durée initiale</th><th>Date de fin réelle</th><th>Numéro de l\'employé</th></tr>';';
        while($dt=$req->fetch()) {

            $str=$dt['numcont']','.$dt['datedem'].','.$dt['durinit'].','.$dt['datefinrel'].','.$dt['employe'];
            echo '<tr>';
            echo '<td>'.$dt['numcont'].'</td><td>'.$dt['datedem'].'</td><td>'.$dt['durinit].'</td><td>'.$dt['datefinrel'].'</td><td>'.$dt['employe'].'</td>';
			echo '</tr>';
        }
    }
    
    echo '</table>';

	$content = ob_get_clean();
	require('template.php');
?>
