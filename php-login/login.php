<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php'?>

  <h1>Login</h1>
    <span>or <a href="singup.php">SignUp</a></span>

  <form action="login.php" method="post">
    <input type="text" name="email" placeholder="Enter your mail">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="submit" value="Send">
  </form>
</body>
</html>
