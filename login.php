<?php

    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body class="b1">

  <form action="index.html" method="post" class="f1">

    <h1 class="heading1"><b>Sign In</b></h1>

    <fieldset class="sig">
      <label for="name">Username:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="email" id="name" name="user_name" required>

      <label for="password">Password:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="password" id="password" name="user_password" required>

    </fieldset>

    <button type="submit">Sign In</button>
  </form>

</body>
</html>