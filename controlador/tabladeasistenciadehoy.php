<?php 
session_start();

if(isset($_SESSION['usuario'])){
	

	   require '../views/intranet.view.php';
	  require '../views/tabladeasistenciadehoy.view.php';

	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>