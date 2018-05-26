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
    
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
    }

    $resultCheck = mysqli_num_rows($result);

    if($resultCheck<=0) {
      header("Location: ../index.php?usuario-nao-encontrado");
      exit();

    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        $hashedPwCheck = password_verify($pw, $row['pw']);

        if ($hashedPwCheck == false) {
          header("Location: ../index.php?login=senha-incorreta");
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