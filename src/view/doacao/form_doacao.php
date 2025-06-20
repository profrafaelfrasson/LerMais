<?php

$mensagem = '';
if (isset($_SESSION['message'])) {
    $mensagem = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
</head>
<body>
        <div class="card">
            <div class="title">
                <h1>Doe seu livro!</h1>
            </div>
            <div class="subtitle">
                <h2>Ajude a sua comunidade doando livros que você já terminou!</h2>
                <h2>Todos tem direito a leitura!</h2>
            </div>
            <?= $mensagem ?>
            <div class="container">
                <form action="src/controllers/inserirDoacao.php" method = "POST">
                    
                    <div class="primeira_linha">
                    <label>Titulo:
                    <input type="text" placeholder="Digite aqui o titulo do livro..."id="nome_livro" name="nome_livro" required>
                    </label>
                    <label>Autor: 
                        <input type="text" placeholder="Autor..." id="autor_livro" name="autor_livro" required>
                    </label>
                    </div>
                    <div class="segunda_linha">
                    <label>Quantidade: 
                        <input type="number" placeholder="Quantidade doada..." min="1" id="qtd_doacao" name="qtd_doacao" required>
                    </label>
                    <label>Descrição: 
                        <input type="text" placeholder="Descrição..." id="descricao" name="descricao" required>
                    </label>
                    </div>
                    </div>
                    <div class="div_button">
                        <button type="submit">Doe seu livro</button>
                    </div>
                </form>
        </div>
</body>
</html>