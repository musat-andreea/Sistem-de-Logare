<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
     <h2>Log in</h2>
  </div>
  <div id="frm">
    <form action="process.php" method="POST">

<?php include('errors.php'); ?>
      <div class="input-group">
        <label>Username:</label>
        <input type="text" id="user" name="username" />
      </div>
      <div class="input-group">
        <label>Password:</label>
        <input type="password" id="pass" name="password_1" /> 
      </div>
      <div class="input-group">
        <input type="submit" id="btn" value="Login" />
      </div>
      <p>
        Not yet a member? <a href="register.php">Sign up</a>
      </p>
    </form>
  </div>

</body>
</html>
