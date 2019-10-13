<?php
  // Get values passe from form in login.php file
  $username = $_POST['username']; 
  $password = $_POST['password_1'];

  echo $username . "<br>";
  echo $password . "<br>";
  // to prevent mysql injection
  $username = stripcslashes($username);
  $password = stripcslashes($password);

  echo $username . "<br>";
  echo $password . "<br>";
  // connect to the server and select database
  if (mysql_connect($_ENV['host'], $_ENV['user'], $_ENV['pass']) ) {
    mysql_select_db($_ENV['db']);
    echo "Connection succesfull <br>";
  }
  else {
    echo "Could not connect on this address " . mysql_error() . "<br>";
  }


    $query = "SELECT * FROM users WHERE username = '" . $username  . "' AND password = '" . $password . "'";
    echo $query . "<br />";
  // Query the database for user
  $result = mysql_query($query) or die("Failed to query database " . mysql_error());


  $row = mysql_fetch_array($result);
  print_r($row);
  if($row['username'] == $username && $row['password'] == $password){
    echo "Login success!!! Welcome " . $row['username'] . "<br>";
    echo "
    <form method='get' action='message.php'>
      <button>Messages</button>
    </form>
    ";
  } else {
      echo "Nu exista un user cu aceasta parola <br>";
  }

?>
