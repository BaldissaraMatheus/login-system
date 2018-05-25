<?php

session_start();

if (isset($_POST['submit'])) {
  
  include 'dbh.inc.php';
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pw = mysqli_real_escape_string($conn, $_POST['pw']);

  if (empty($username) || empty($pw)) {
    header("Location: ../index.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$username' OR username = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysql_num_rows($result);

    if($resultCheck < 1) {
      header("Location: ../index.php?login=error");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        $hashedPwCheck = password_verify($pw, $row['password']);
        if ($hashedPwCheck == false) {
          header("Location: ../index.php?login=error");
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