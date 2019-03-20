<?php

  session_start();

  $sender_username = "";
  $assigned_agent_username = "";
  $message_subject = "";
  $message_text = "";
  $status = "";
  $errors = array();

  //connect to the database
  $db = mysqli_connect('localhost', 'erikhenn_medeea', 'Medeea1998@$', 'erikhenn_medeea');

//if the register button is clicked
if (isset($_POST['message'])) {
    //$sender_username = $_POST['sender_username'];
    $assigned_agent_username = $_POST['assigned_agent_username'];
    $message_subject = $_POST['message_subject'];
    $message_text = $_POST['message_text'];
    //$status = $_POST['status'];

    //ensure that form fields are filled properly
    if ($assigned_agent_username == "") {
      array_push($errors, "assigned_agent_username is required");
    }
    if ($message_subject == "") {
      array_push($errors, "message_subject is required");
    }
    if ($message_text == "") {
      array_push($errors, "message_text is required");
    }

    //if there are no errors, save user to db
    if (count($errors) == 0) {
      //$password = md5($password_1); //encrypt password before storing in db(security)
      $sql = "INSERT INTO messages (sender_username, assigned_agent_username, message_subject, message_text, status)
                  VALUES ('$sender_username', '$assigned_agent_username', '$message_subject', '$message_text', '$status')";
      mysqli_query($db, $sql);
      $_SESSION['sender_username'] = $sender_username;
      $_SESSION['success'] = "your message was send";
      header('location: indexxx.php'); //redirect to home page
    }

}

//log user in from login page
if (isset($_POST['login'])) {
  $sender_username = mysql_real_escape_string($_POST['sender_username']);
  $password = mysql_real_escape_string($_POST['password']);

  //ensure that form fields are filled properly
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($_errors) == 0 ) {
    $password = md5($password); //encrypt password before comparing with that from database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      //log user in;
      $_SESSION['username']=$username;
      $_SESSION['success']="You are now logged in";
      header('location: indexx.php'); //redirect to home page
    }else{
        array_push($errors, "wrong username/password combination");
    }
  }
}


//Logout
/*if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['sender_username']);
  header('location: message.php');
}*/

?>
