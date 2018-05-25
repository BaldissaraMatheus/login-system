<!DOCTYPE html>
<html>
<?php
  include_once 'head.php';
?>
<body>
  <div class='container'>
    <?php
      include_once 'header.php';
    ?>
  </div>
  <div class='container container--signup bg-light mt-5'>
    <div class='row justify-content-center mb-3 pt-4'>
      <h2>Cadastre-se</h2>
    </div>

    <form action='includes/signup.inc.php' method='POST'>
      <div class='row'>
        <div class='col-sm'>
          <div class='form-group'>
            <label for='firstNameInput'>Nome</label>
            <input type='text' name='firstName' class='form-control'>
          </div>
        </div>
        <div class='col-sm'>
          <div class='form-group'>
            <label for='lastNamenput'>Sobrenome</label>
            <input type='text' name='lastName' class='form-control'>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col'>
          <div class='form-group'>
            <label for='emailInput'>Endereço de email</label>
            <input type='email' name='email' class='form-control' aria-describedby='email-help' placeholder='Email'>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col'>
          <div class='form-group'>
            <label for='usernameInput'>Nome de usuário</label>
            <input type='text' name='username' class='form-control' placeholder='Nome de usuário'>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col'>
          <div class='form-group'>
            <label for='passwordInput'>Senha</label>
            <input type='password' name='pw' class='form-control'>
          </div>
        </div>
      </div>     
      
      <div class='row pb-4'>
        <div class='col'>
        <button type='submit' name='submit' class='btn btn-primary'>Cadastrar</button>
        </div>
      </div>    

    </form>
  </div>

  </div>

</body>

</html>