<header>
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a href='/' class='navbar-brand'>Cachorro-salsicha</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'>
          <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
          <ul class='navbar-nav ml-auto mt-2 mt-lg-0'>
            <?php
              if (isset($_SESSION['id'])) {
                echo "<li class='nav-item'><form class='form-inline' action='includes/logout.inc.php' method='POST'><button type='submit' name='submit' class='btn btn-primary ml-2 mt-2 mt-lg-0'>Sair</button></form></li>";
              } else {
                echo "<li class='nav-item'><form class='form-inline' action='includes/login.inc.php' method='POST'><div class='input-group mt-2 mt-lg-0'><label for='inputUsername' class='sr-only'>Nome de usuário ou email</label><input type='text' name='username' class='form-control mr-sm-2 mr-md-2 mr-0' placeholder='Nome de usuário'></div><div class='input-group mt-2 mt-lg-0'><label for='inputPassword' class='sr-only'>Senha</label><input type='password' name='pw' class='form-control' placeholder='Senha'></div><button type='submit' name='submit' class='btn btn-primary ml-2 mt-2 mt-lg-0'>Entrar</button></form><li class='nav-item mt-2 mt-lg-0'><a href='signup.php' class='nav-item nav-link'>Ainda não sou cadastrado</a></li>";
              }
            ?>                    
          </ul>
        </div>
      </nav>
    </header>