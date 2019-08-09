<?php
  require 'database.php';
  //variable GLOBAL
  //si el mensaje esta vacio
  /*<?php if(!empty($message)):.... ?>*/
  $message = '';
    //datos que necesito enviar
    //si no esta vacio el campo que estoy recibiendo del metodo $_POST...
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    //EMPEZAMOS A AGREGARLOS EN LA..base de datos
    //en users almacenamos nuestros usuarios..email y password
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    //en la variable conn ejecutamos el metodo llamado prepare
    //lo que hace es generar una consulta de sql
    $stmt = $conn->prepare($sql);
    //vinculamos
    $stmt->bindParam(':email', $_POST['email']);
    //aca ciframos el password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //vinculamos los pasword ya cifrado
    $stmt->bindParam(':password', $password);
    //para saber si se esta ejecutando correctamente
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
