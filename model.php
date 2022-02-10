<?php
	class crud
	{
		private function ctdb(){
			$db=new PDO('mysql:host=localhost;dbname=gestion','marina','cola14');
			return $db;
		}
		public function add($table, $field, $value, $data){	
			$db=$this->ctdb();
			$req=$db->prepare('INSERT INTO '.$table.'('.$field.') VALUES('.$value.')');
	 		$req->execute(explode(',', $data));
		}
		public function del($numemp){
			$db=$this->ctdb();
			$req=$db->prepare('DELETE FROM employe WHERE numemp=?');
			$req->execute(array($numemp));
		}
		public function read($table, $field)
		{
			$db=$this->ctdb();
			$req=$db->query('SELECT '.$field.' FROM '.$table);
			return $req;
		}
        public function updata($nomemp, $preemp, $datemb, $durcont, $numemp)
		{
			$db=$this->ctdb();
			$req=$db->prepare('UPDATE member SET nomemp=?, preemp=?, datemb=? durcont=? WHERE numemp=?');
			$req->execute(array($nomemp, $preemp, $datemb, $durcont, $numemp));
		}
		public function lister()
			{
			$db=$this->ctdb();
			$today = date("Y-m-d");
			$query = 'SELECT * FROM contrat';
			$req=$db->query($query);
			return $req;
		}
	}


