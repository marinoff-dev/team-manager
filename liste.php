<?php ob_start(); ?>
<?php
        require('model.php');
        $db=new crud();
        $pq=$db->lister();
        echo '<h2>Liste des contrats valides</h2>';
        echo '<table border="1" width="150">';
	echo '<tr><th colspan="1">&nbsp;</th><th>Numéro du contrat</th><th>Date de démarrage</th><th>Durée initiale</th><th>Date de fin réelle</th><th>Numéro_employe</th></tr>';
		while($dt=$pq->fetch())
		{	
			$str=$dt['numcont'].','.$dt['datedem'].','.$dt['durinit'].','.$dt['datefinrel'].','.$dt['employe'];
                        echo '<tr>';
                        echo '<td>'.$dt['numcont'].'</td><td>'.$dt['datedem'].'</td><td>'.$dt['durinit'].'</td><td>'.$dt['datefinrel'].'</td><td>'.$dt['employe'].'</td>';
                        echo '</tr>';
                }

        echo '</table>';

?>
<?php
	$content = ob_get_clean();
	require('template.php');
?>