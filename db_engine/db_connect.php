<?php 
class db_obj {
    public $host;
    public $dbname;
    public $user;
    public $pass;    
  
    function get_query($table='', $champs=array(), $condition='') {
        $db = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbname.'', $this->user, $this->pass);
        $query = 'SELECT ';
     if($champs)
        {
            for($i=0; $i<count($champs); $i++)
            {
                $query += $champs[$i]+', ';
            }

        }
        else
            {
                $query += '* ';
            }
        $query+='FROM '+$table;
        
        if ($condition)
        {
            $query += 'WHERE '+ $condition; 

        }       
        $payload = $db->query($query);
        return $payload;
    }

    function post_query($table, $champs, $valeur) {
        $query = 'INSERT INTO' + $table + '(';
        $db = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbname.'', $this->user, $this->pass);
        for($i=0; $i<count($champs); $i++)
        {
            $query = $query + $champs[$i]+ ', ';
        }
        $query=$query+') VALUES(';
        for($i=0; $i<count($valeur); $i++)
        {
            $query = $query + "?, ";
        }
        $req=$db->prepare($query);
        $req->execute($valeur);
    }
    
    function delete_query($table, $condition) {
        if(isset($_GET['task']) && $_GET['task']=="supp") {
            $query = 'DELETE FROM' + $table;
            if($condition)
            {
                $query = $query + 'WHERE ' + $condition;
            }
        }
       
    }
}

   

?>