<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Soporte FISI</title>

  <link href="../css/master.css" rel="stylesheet">
</head>

<body >
  <img src="../images/fondo.jpg" align="center">
    <div class="login-box">
      <img src="../images/soporte.png" class="avatar" alt="Avatar Image">
      <h1>Login </h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">      
            <label for="exampleInputEmail1">Usuario</label>
            <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="usuario" class="usuario" placeholder="Usuario">     
            <label for="">Contraseña</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password" class="password" placeholder="Contraseña">
            <input type="submit" onclick ="login.submit()" value="Log In">
            
        </form>
    </div>
</body>

</html>