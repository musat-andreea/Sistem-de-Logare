<?php

  session_start();

  $username = "";
  $email = "";
  $errors = array();

  //connect to the database
  $db = mysqli_connect('localhost', 'erikhenn_medeea', 'Medeea1998@$', 'erikhenn_medeea');

//if the register button is clicked
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //ensure that form fields are filled properly
    if ($username == "") {
      array_push($errors, "Username is required");
    }
    if ($email == "") {
      array_push($errors, "Email is required");
    }
    if ($password_1 == "") {
      array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }

    //if there are no errors, save user to db
    if (count($errors) == 0) {
      $password = md5($password_1); //encrypt password before storing in db(security)
      $sql = "INSERT INTO users (username, email, password, decriptat)
                  VALUES ('$username', '$email', '$password', '$password_1')";
      mysqli_query($db, $sql);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "you are now logged in";
      header('location: indexx.php'); //redirect to home page
    }

}

//log user in from login page
if (isset($_POST['login'])) {
  $username = mysql_real_escape_string($_POST['username']);
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
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}

?>
