<?php
class crud
{
	private function ctdb()
	{
		$db = new PDO('mysql:host=localhost;dbname=gestion', 'marina', 'cola14');
		return $db;
	}
	public function add($table, $field, $value, $data)
	{
		$db = $this->ctdb();
		$req = $db->prepare('INSERT INTO ' . $table . '(' . $field . ') VALUES(' . $value . ')');
		$req->execute(explode(',', $data));
	}
	public function del($numemp)
	{
		$db = $this->ctdb();
		$req = $db->prepare('DELETE FROM employe WHERE numemp=?');
		$req->execute(array($numemp));
	}
	public function read($table, $field)
	{
		$db = $this->ctdb();
		$req = $db->query('SELECT ' . $field . ' FROM ' . $table);
		return $req;
	}
	public function updata($nomemp, $preemp, $datenais, $datemb, $durcont, $numemp)
	{
		$db = $this->ctdb();
		$req = $db->prepare('UPDATE member SET nomemp=?, preemp=?, datenais=?, datemb=?, durcont=? WHERE numemp=?');
		$req->execute(array($nomemp, $preemp, $datenais, $datemb, $durcont, $numemp));
	}
	public function lister()
	{
		$db = $this->ctdb();
		$query = 'SELECT * FROM contrat';
		$req = $db->query($query);
		return $req;
	}
	public function rechercher($data)
	{
		$db= $this->ctdb();
		$req=$db->prepare('SELECT * FROM contrat WHERE datedem=? OR datefinrel=?');
		$req->execute(array($data, $data));
		return $req;
	}
	public function listfaut() {
		$db=$this->ctdb();
		$req=$db->query('SELECT ');
		return $req;
	}
}
