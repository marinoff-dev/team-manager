<?php ob_start(); ?>
<?php
        require('model.php');
        $db=new crud();
        $pq=$db->listfaut();
        echo '<h2>Liste des employés les plus fautifs</h2>';
        echo '<table border="1" width="250" >';
		echo '<tr><th>Numéro de l\'employé</th><th>Nom</th><th>Prénom</th><th>Date_de_naissance</th><th>Date_embauche</th></tr>';
		while($dt=$pq->fetch())
		{	
			$str=$dt['numemp'].','.$dt['nomemp'].','.$dt['preemp'].','.$dt['datenais'].','.$dt['datemb'];
            echo '<tr>';
            echo '<td>'.$dt['numemp'].'</td><td>'.$dt['nomemp'].'</td><td>'.$dt['preemp'].'</td><td>'.$dt['datenais'].'</td><td>'.$dt['datemb'].'</td>';
            echo '</tr>';
        }	
        echo '</table>';

?>
<?php
	$content = ob_get_clean();
	require('template.php');
?>

 