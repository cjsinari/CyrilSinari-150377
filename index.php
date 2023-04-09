<?php

session_start();
  include("connection.php");
  include("functions.php");

  $user_data = check_login($connection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="stylephp.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT 2</title>
</head>
<body>
    <a href="logout.php">Log Out</a>
    <h1>WELCOME</h1>
</body>
</html>