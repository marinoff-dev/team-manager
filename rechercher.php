<?php ob_start(); ?>
<form method="POST" action="">
    <label for="emb">Entrer une date:</label></br>
    <input name="rec" type="date" /> </br></br>
    <input class="bouton" type="submit" name="btn" value="Valider" />
            
</form>
<?php
    $content = ob_get_clean();
	require('template.php');
    require('model.php');
    $db=new crud();
    if(isset($_POST['btn'])) {
    $data=$_POST['rec'];
    $req=$db->rechercher($data);
    }

    echo '<table border="1" width="500">';
    echo '<tr><th colspan="2">&nbsp;</th><th>name</th><th>Date</th><th>sexe</th><th>Email</th></tr>';
    if($req->rowCount()!=0)
    {
        while($dt=$req->fetch())
        {	
            $str=$dt['numcont'].','.$dt['datedem'].','.$dt['durinit'].','.$dt['datefinrel'].','.$dt['employe'];
            echo '<tr>';
            /*echo '<td><a href="contrat.php?task=modifier&data='.$str.'">modifier</a></td>';*/
            echo '<td>'.$dt['numcont'].'</td><td>'.$dt['datedem'].'</td><td>'.$dt['durinit'].'</td><td>'.$dt['datefinrel'].'</td><td>'.$dt['employe'].'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
?>
