<?php
  require_once 'db_conn.php';
  session_start();  

  if(isset($_POST['submit'])) {
    $email_or_username = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $hash = hash('sha256', $password);
    
    $query = "SELECT * FROM user WHERE ( email='$email_or_username' OR username='$email_or_username' ) AND password='$hash' ";
    $result = mysqli_query($dbc, $query);
    if(mysqli_num_rows($result) == 1) {
    
      $query = "SELECT * FROM user WHERE ( email='$email_or_username' OR username='$email_or_username' ) AND active=1 ";
      $result = mysqli_query($dbc, $query);
      if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        setcookie('user_id', $row['user_id'], time()+3600*24*3);
        setcookie('email', $row['email'], time()+3600*24*3);
        header("Location: index.php");
      }
      else {
        echo "Your account is not activated.";
      }
    }
    else {
      echo "Wrong email, username or password.";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <label for="email">Username or Email:</label>
      <input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" /><br />
      <input type="submit" name="submit" value="Log In" />
    </form>
    <a href="register.php">You don't have account already? Register NOW!</a>
  
  </body>
</html>