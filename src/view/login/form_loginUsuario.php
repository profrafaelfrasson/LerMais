<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Tela de Login</title>
  <!-- <link rel="stylesheet" type="text/css" href="../../components/style-loginUsuario.css">  -->
</head>
<body>
  <div class="container">
    <div class="form-container">
     
         <div class="logo-titulo">
  <img src="src/public/image/logo.png" alt="Logo Ler Mais" class="logo">
        <h1>Ler Mais</h1>
      </div>

    

      <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
          echo $_SESSION['message'];
          $_SESSION['message'] = "";
        }
      ?>

      <form action="src/controllers/logarUsuario.php" method="POST">
        <label for="email_usuario"><b>E-mail:</b></label>
        <input type="email" id="email_usuario" name="email_usuario">

        <label for="senha_usuario"><b>Senha:</b></label>
        <input type="password" id="senha_usuario" name="senha_usuario">

        <button type="submit">Entrar</button>

        <div class="login-link">
          <p>Ainda não tem uma conta? <a href="index.php?navegation=5">Registre-se</a></p>
        </div>
      </form>
    </div>

    <div class="image-container">
      <div class="overlay"></div>
    </div>
  </div>
</body>
</html>