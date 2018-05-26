<?php
  $msg = htmlspecialchars($_GET["login"]);

  if ($msg != '') {
    if (strpos($msg, 'success') !== false) {
      $msgType = 'success';
      $msgHeader = 'Muito bem!';
      $msgContent = 'Você foi logado!';
  
    } else {
      $msgType = 'danger';
      $msgHeader = 'Opa!';
  
      if (strpos($msg, 'vazio')  !== false) {
        $msgContent = 'Você esqueceu de preencher um ou mais campos.';
  
      } else if(strpos($msg, 'nao-encontrado') !== false) {
        $msgContent = 'Usuário não cadastrado.';

      } else if(strpos($msg, 'incorreta') !== false) {
        $msgContent = 'Senha digitada incorreta.';

      } else {
        $msgContent = 'Ocorreu um erro!';
        
      }
    }
  }
?>

<div class="alert mt-3 alert-<?php echo $msgType; ?>" role="alert">
  <strong><?php echo $msgHeader; ?></strong> <?php echo $msgContent; ?>
</div>