<?php ob_start(); ?>
<?php
        require('model.php');
        $db=new crud();
        $pq=$db->lister();
	
        echo '<table border="1" width="650">';
		echo '<tr><th>&nbsp;</th><th>Numéro du contrat</th><th>Date de démarrage</th><th>Durée initiale</th><th>Date de fin réelle</th><th>Numéro_employe</th></tr>';
		while($dt=$pq->fetch())
		{	
			$str=$dt['numcont'].','.$dt['datedem'].','.$dt['durint'].','.$dt['durint'].','.$dt['datefinrel'].','.$dt['employe'];

            $datefin = new DateTime($dt['datefinrel']); // convertir la date de fin du contrat(string) en objet date php
            $today = new DateTime(); // récupérer la date du jour

            $diff = date_diff($datefin, $today); // La différence en jour entre la date de fin du contrat et la date d'aujourd'hui
            if ($diff>0){ // vérifier si la différence est supérieure à 0
                // afficher les contrats en cours de validité 
                echo '<tr>';
                echo '<td><a href="newcont.php?task=modifier&data='.$str.'" style="color:black;">modifier</a></td>';
                echo '<td>'.$dt['numcont'].'</td><td>'.$dt['datedem'].'</td><td>'.$dt['durint'].'</td><td>'.$dt['datefinrel'].'</td><td>'.$dt['employe'].'</td>';
                echo '</tr>';
            }
			
		}
        echo '</table>';

?>
<?php
	$content = ob_get_clean();
	require('template.php');
?>