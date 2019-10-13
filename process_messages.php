<?php
  // Get values passe from form in login.php file
  /*$sender_username = $_POST['sender_username'];
  $password = $_POST['password_1'];

  echo $username . "<br>";
  echo $password . "<br>";
  // to prevent mysql injection
  $username = stripcslashes($username);
  $password = stripcslashes($password);*/

  //echo $username . "<br>";
  //echo $password . "<br>";
  // connect to the server and select database
  if (mysql_connect($_ENV['host'], $_ENV['user'], $_ENV['pass']) ) {
    mysql_select_db( $_ENV['db']);
    echo "Connection succesfull to db<br>";
  }
  else {
    echo "Could not connect on this address " . mysql_error() . "<br>";
  }

    $query = "SELECT * FROM messages WHERE assigned_agent_id = '" . $assigned_agent_id  . "' AND assigned_agent_username = '" . $assigned_agent_username . "'";
    echo $query . "<br />";
  // Query the database for user
  $result = mysql_query($query) or die("Failed to query database " . mysql_error());


  $row = mysql_fetch_array($result);
  print_r($row);
  if($row['assigned_agent_id'] == $assigned_agent_id && $row['assigned_agent_username'] == $assigned_agent_username){
    echo "Your message was send" ;

  } else {
      echo "Your message couldn't was send <br>";
  }



?>
