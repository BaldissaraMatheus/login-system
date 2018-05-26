<!DOCTYPE html>
<html>
<?php
  session_start();
  include_once 'head.php'; 
?>

<body>
  <div class='container'>
    <?php      
      include_once 'header.php';
      include_once 'message.php';
    ?>

    <main class='jumbotron'>
      <h1 class='display-4'>Bem vindo, <?php if(isset($_SESSION['id'])) { echo $_SESSION['username']; } else { echo 'visitante'; } ?>!</h1>
      <p class='lead'>
      <?php
        if (isset($_SESSION['id'])) {
          echo "<div class='text-center mt-5'><img src='https://scontent.fsdu5-1.fna.fbcdn.net/v/t1.0-9/30724642_1818573384897815_5951820087995400192_o.jpg?_nc_cat=0&_nc_eui2=AeGIozZb0UarJ6dgKUI-6dX1dpfq1dhMx2BZuFJtNXMfv13XGWloVxYOUG06eN5awD9IAE48uxUha4aiDXrIoQDQb0kYLrcFCMvXHcoCNwPIAg&oh=38020eb639f3dedc35f032c090efcae2&oe=5B8FC21A' height='500px' width='500px' alt='Algo INCRÍVEL' class='img-thumbnail'></div>";
        } else {
          echo "Faça login para ver algo incrível!";
        }
      ?> 
      </p>     
    </main>
  </div>
  <script src='/js/jquery.min.js'></script>
  <script src='/js/popper.min.js'></script>
  <script src='/js/bootstrap.min.js'></script>
</body>
</html>