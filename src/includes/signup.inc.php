<?php

  if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    
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
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=nome-de-usuario-ja-utilizado");
            exit();            
          } else {
            $hashedPw = password_hash($pw, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstName, lastName, email, username, pw) VALUES (?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
              mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $username, $hashedPw);
              mysqli_stmt_execute($stmt);

              header("Location: ../index.php?signup=success");
            }         
          }
        }
      }
    }
  } else {
    header("Location: ../signup.php");
    exit();
  }