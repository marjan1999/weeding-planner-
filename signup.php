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

  <form action="signup.php" method="POST" class="f1">

    <h1 class="heading1"><b>Sign Up</b></h1>

      <fieldset>

      <label for="name">Name:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="text" id="name" name="user_name" required>

      <label for="mail">Email:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="email" id="mail" name="user_email" required>

      <label for="password">Password:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="password" id="password" name="user_password" required>

      <label for="password">Confirm Password:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="password" id="cpassword" name="user_cpassword" required>

      <label for="dob">Date Of Birth:</label>
      <input style=" width: 100%; margin-bottom: 30px;" type="date" id="dob" name="user_dob" required>

      <label for="gender">Gender: </label>
      <input type="radio" id="gender1" value="male" name="user_gender" required><label for="male" class="light">Male</label><br>
      <input type="radio" id="gender" value="female" name="user_gender" required><label for="female" class="light">Female</label>

    </fieldset>
    <button name="sub" type="submit">Sign Up</button>
  </form>

  <?php

    if(isset($_POST['sub'])) {

         $name = $_POST['user_name'];
         $email = $_POST['user_email'];
         $pass = $_POST['user_password'];
         $cpass= $_POST['user_cpassword'];
         $dob = $_POST['user_dob'];
         $gender = $_POST['user_gender'];

         if($pass == $cpass) {

            $query = " select * from signup where email='$email' ";
            $query_check = mysqli_query($con, $query);

            if($query_check) {

                if(mysqli_num_rows($query_check) > 0) {

                echo"
                <script>

                alert('Email already in use');
                window.location.href='signup.php';
                </script>
                ";

                } else {

                $insertion = "insert into signup(name, email, password, dob, gender) values('$name', '$email', '$pass', '$dob', '$gender')";

                $run = mysqli_query($con, $insertion);

                   if($run) {

                    echo"
                    <script>

                    alert('You are Successfully Registered');
                    window.location.href='login.php';
                    </script>
                    ";
                    } else {
                     echo"
                     <script>

                     alert('Connection Failed');
                     window.location.href='signup.php';
                     </script>
                     ";
                     }

                }

            } else {
                echo"
                script>

                alert('Database Error');
                window.location.href='signup.php';
                </script>
                ";

            }

         } else {

          echo"
              <script>
              alert('Password and Confirm password does not match');
              window.location.href='signup.php';
              </script>
             ";

         }

    }
  ?>

</body>
</html>