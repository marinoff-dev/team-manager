<?php
	require('model.php');
	function employe()
	{
		$db=new crud();
		if(isset($_POST['btn'])&& $_POST['btn']=='Valider')
		{
			$table='employe'; $field='nomemp, preemp, datemb, durcont'; $value='?,?,?,?'; $data=$_POST['nomemp'].','.$_POST['preemp'].','.$_POST['datemb'].','.$_POST['durcont'];
			$db->add($table, $field, $value, $data);
			 //header("location:newcont.php");
		}elseif(isset($_POST['btn']) && $_POST['btn']=='modifier')
		{
			$db->updata($_POST['nomemp'], $_POST['preemp'], $_POST['datemb'], $_POST['durcont'], $_POST['numemp']);
		}

		if(isset($_GET['task'])&& $_GET['task']=='supprimer')
		{
			$db->del($_GET['key']);
			$tab=array(null,null,null,null);
		}elseif(isset($_GET['task'])&& $_GET['task']=='modifier')
		{
			$tab=explode(',', $_GET['data']); 
		}else{	
			$tab=array(null,null,null,null);
		}
		$table='employe'; $field='*';
		$req=$db->read($table, $field);
		require('newemp.php');	 
	}

	function contrat()
	{
		$db=new crud(); 

		if(isset($_POST['btn']))
		{
			$dem = $_POST['date'];
			$fin = $_POST['datefin'];
			$dure = $_POST['dur'];
			$emp = $_POST['numemp'];

			$table='contrat'; 
			$field='datedem, durinit, datefinrel, employe';
			$value='?,?,?,?'; 
			$data=$dem.','.$dure.','.$fin.','.$emp;
			$db->add($table, $field, $value, $data);
			header("location:liste.php");
		}
		/*elseif(isset($_POST['btn']) && $_POST['btn']=='modifier')
		{
			$db->updata($_POST['datedem'], $_POST['durinit'], $_POST['datefinrel'], $_POST['employe'], $_POST['numcont']);
		}
		if(isset($_GET['task'])&& $_GET['task']=='supprimer')
		{
			$db->del($_GET['key']);
			$tab=array(null,null,null,null);
		}elseif(isset($_GET['task'])&& $_GET['task']=='modifier')
		{
			$tab=explode(',', $_GET['data']); 
		}else{	
			$tab=array(null,null,null,null);
		}*/
	}
		
		require('newcont.php');	 
		

