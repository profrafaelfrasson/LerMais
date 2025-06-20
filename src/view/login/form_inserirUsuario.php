<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Ler Mais</title>


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
    
      <form action="src/controllers/inserirUsuario.php" method="post">
        <label for="nome"><b>Nome:</b></label>
        <input type="text" id="nome_usuario" name="nome_usuario" required>

        <label for="sobrenome"><b>Sobrenome:</b></label>
        <input type="text" id="sobrenome_usuario" name="sobrenome_usuario" required>

      <label for="telefone"><b>Contato</b></label>
<input type="tel" id="contato_usuario"maxlength="15" name="contato_usuario" placeholder="(99) 99999-9999" required>
 <script>
    const telefoneInput = document.getElementById('contato_usuario');

    telefoneInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, ""); 

      if (value.length > 15) value = value.slice(0, 15); 
      if (value.length > 0) {
        value = "(" + value;
      }
      if (value.length > 3) {
        value = value.slice(0, 3) + ") " + value.slice(3);
      }
      if (value.length > 10) {
        value = value.slice(0, 10) + "-" + value.slice(10);
      }

      e.target.value = value;
    });
  </script>
        <label for="email"><b>E-mail:</b></label>
        <input type="email" id="email_usuario" name="email_usuario" required>

        <label for="senha"><b>Senha:</b></label>
        <input type="password" id="senha_usuario" name="senha_usuario" required>

        <label for="confirmar"><b>Confirmar Senha:</b></label>
        <input type="password" id="repetir_senha" name="repetir_senha" required>

        <button type="submit">Cadastrar-se</button>
      </form>

      <p class="login-link">Já tem uma conta? <a href="/Projeto-Ler-Mais/index.php">Faça login</a></p>
    </div>

    <div class="image-container">
      <div class="overlay"></div>
    </div>
  </div>
</body>
</html>
