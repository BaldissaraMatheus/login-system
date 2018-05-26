<?php

session_start();

if (isset($_POST['submit'])) {
  include 'dbh.inc.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pw = $_POST['pw'];

  if (empty($username) || empty($pw)) {  
    header("Location: ../index.php?login=empty");
    exit();
  } else {
    
    $sql = "SELECT * FROM users WHERE username = '$username' OR username = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck<=0) {
      header("Location: ../index.php?usuario-nao-encontrado");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        $hashedPwCheck = password_verify($pw, $row['pw']);
        if ($hashedPwCheck == false) {
          header("Location: ../index.php?login=errorpw");
          exit();
          // Verifica se retorna verdadeiro pelo risco de retornar um valor não buleano
        } else if ($hashedPwCheck == true) {
          $_SESSION['id'] = $row[id];
          $_SESSION['firstName'] = $row[firstName];
          $_SESSION['lastName'] = $row[lastName];
          $_SESSION['email'] = $row[email];
          $_SESSION['username'] = $row[username];
          header("Location: ../index.php?login=success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}