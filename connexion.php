<?php
   try{
      $db=new PDO("mysql:host=localhost;dbname=gestion","marina","cola14");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?> 