<?php ob_start(); ?>
<?php
        require('model.php');
        $db=new crud();
        $pq=$db->lister();
        echo '<h2>Liste des contrats valides</h2>';
        echo '<table border="1" width="100">';
	echo '<tr><th>Numéro_contrat</th><th>Date_démarrage</th><th>Durée_initiale</th><th>Date_fin</th><th>Numéro_employe</th></tr>';
        while($dt=$pq->fetch())
        {	
                $str=$dt['numcont'].','.$dt['datedem'].','.$dt['durinit'].','.$dt['datefinrel'].','.$dt['employe'];

                $datefin = new DateTime($dt['datefinrel']); // convertir la date de fin du contrat(string) en objet date php
                $today = new DateTime(); // récupérer la date du jour

                $diff = date_diff($datefin, $today); // La différence en jour entre la date de fin du contrat et la date d'aujourd'hui
                if ($diff->format("%d")>0){ // vérifier si la différence est supérieure à 0
                        // afficher les contrats en cours d'échéance
                        echo '<tr>';
                        echo '<td>'.$dt['numcont'].'</td><td>'.$dt['datedem'].'</td><td>'.$dt['durinit'].'</td><td>'.$dt['datefinrel'].'</td><td>'.$dt['employe'].'</td>';
                        echo '</tr>';
                }
                
        }
        echo '</table>';

?>
<?php
	$content = ob_get_clean();
	require('template.php');
?>