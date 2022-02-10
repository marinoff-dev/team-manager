<?php
	require('controller.php');
	if(isset($_GET['controller'])){
		$_GET['controller']();
	}else{
		employe();
	}
?>