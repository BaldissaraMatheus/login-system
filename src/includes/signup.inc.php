<?php

  if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $firstName = mysqli_real_scape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_scape_string($conn, $_POST['lastName']);
    $email = mysqli_real_scape_string($conn, $_POST['email']);
    $username = mysqli_real_scape_string($conn, $_POST['username']);
    $pw = mysqli_real_scape_string($conn, $_POST['pw']);

    if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($pw)) {
      header("Location: ../signup.php?signup=empty");
      exit();

    } else {
      // Verifica se o preenhimento dos campos são válidos
      if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
        header("Location: ../signup.php?signup=invalid-name");
        exit();
      } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../signup.php?signup=invalid-email");
          exit();
        } else {
          $sql = "SELECT * FROM users WHERE id ='$username'";
          $result = mysql_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=user-taken");
            exit();            
          } else {
            $hashedPw = password_hash($pw, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstName, lastName, email, username, pw) VALUES ('$firstName', '$lastName', '$email', '$username', '$hashedPw');";
            mysqli_query($conn, $sql);
            header("Location: ../signup.php?signup=success");
          }

        }
      }
    }

  } else {
    header("Location: ../signup.php");
    exit();
  }