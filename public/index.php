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
    ?>

    <main class='jumbotron'>
      <h1 class='display-4'>Wubba lubba dub dub</h1>
      <p class='lead'>
      <?php
        if (isset($_SESSION['id'])) {
          echo $_SESSION['username'];
        } else {
          echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quia porro unde, labore, iste obcaecati nisi expedita sit harum distinctio perspiciatis nihil incidunt nesciunt voluptatibus, ex reprehenderit itaque praesentium? Et.";
        }
      ?> 
      </p> 
      
      <hr class='my-4'>
      <p class='lead'>
        <a href='#' class='btn btn-primary btn-lg' role='button'>Ler mais</a>
      </p>
    </main>

  </div>
  <script src='/js/jquery.min.js'></script>
  <script src='/js/popper.min.js'></script>
  <script src='/js/bootstrap.min.js'></script>
</body>
</html>