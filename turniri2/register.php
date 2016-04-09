<?php
  require_once 'db_conn.php';

  if(isset($_POST['submit'])) {
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password1 = mysql_real_escape_string($_POST['password1']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    
    if($password1 == $password2) {
      $query = "SELECT * FROM user WHERE email='$email' ";
      $result = mysqli_query($dbc, $query);
      $row_number = mysqli_num_rows($result);
      if($row_number == 0) {
        $query = "SELECT * FROM user WHERE username='$username' ";
        $result = mysqli_query($dbc, $query);
        $row_number = mysqli_num_rows($result);
        if($row_number == 0) {
          $hash = hash('sha256', $password1);
          $activation_code = hash('sha256',$email.time());
          $query = "INSERT INTO user (email, username, password, activation_code) VALUES('$email','$username','$hash','$activation_code')";
          if(mysqli_query($dbc, $query)) {
            echo "Your account is made, go to your email to activate it!";
            mail('$email','Account activation','You can activate your account at http://localhost/turniri2/activation.php?ac='.$activation_code);
          }
          else {
            echo "Error connecting to DATABASE!";
          }
        }
        else {
          echo "This username is already taken. Please pick different one.";
        }
    }
      else {
        echo "You already have account on this email";
      }
    }
    else {
      echo "Passwords don't match.";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" /><br />
      <label for="email">Email:</label>
      <input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" name="password1" /><br />
      <label for="password2">Retype password:</label>
      <input type="password" name="password2" /><br />
      <input type="submit" name="submit" value="Register" />
    </form>
  </body>
</html>