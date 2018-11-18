<?php session_start();

if(isset($_SESSION['usuario'])){
	
	require '../views/intranet.view.php';
	
}else{
	header('Location: ../login.php');
}

 ?>

<!-- poner aqui los requiere views para las operaciones -->

 </body>
</html>