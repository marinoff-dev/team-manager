<?php
$to=$mail;
$subject='Liste des contrats à échéance';
require('model.php');
$db=new crud();
$pq=$db->lister();
$str='';
while($dt=$pq->fetch()) {
    $datefin = new DateTime($dt['datefinrel']); 
    $today = new DateTime();
    $diff = date_diff($datefin, $today); 
    if ($diff->format("%d")<=0){ 
        $str=$dt['numcont'].','.$dt['datedem'].','.$dt['durinit'].','.$dt['datefinrel'].','.$dt['employe'];
        echo $str;
    }
}
$message=$str;

$headers='From:offrinmarina343@gmail.com'."\r\n".
'Reply-To:offrinmarina343@gmail.com'."\r\n".
'X-Mailer:PHP/'.phpversion();
mail($to,$subject,$message,$headers);

?>