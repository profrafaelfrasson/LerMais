<?php

require __DIR__ . "../../../dao/daoCategoria.php";

$l = new daoCategoria($conexao);
$livros = $l->listaCategoria();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
</head>
<body>
    <a href="/Projeto-Ler-Mais/index.php?navegation=1" class="sair_button">
    Voltar
    </a>
    <div class="principal">
        <h1>Cadastro de Livro</h1>
        <form action="src/controllers/insertLivro.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome do Livro:</label>
            <input type="text" placeholder="Livro..." id="nome_livro" name="nome_livro" required>

            <label for="autor">Autor:</label>
            <input type="text" placeholder="Autor..." id="autor_livro" name="autor_livro" required>

            <label for="categoria">Categoria:</label>
            <select class="categoria_select" name="fk_id_categoria" id="fk_id_categoria" required>
                <option value="" disabled selected>Selecione uma categoria</option>
                <?php foreach ($livros as $livro){ ?>
                    <option value="<?php echo $livro['id_categoria']; ?>">
                        <?php echo $livro['nome_categoria']; ?>
                    </option>
                <?php } ?>
            </select>

            <label>Capa do livro:
                <input class="file_img" type="file" name="capa_livro" accept=".png, .jpg, .jpeg" required>
            </label>

            <label for="estoque">Estoque:</label>
            <input type="number" class="estoque_livro" id="estoque_livro" name="estoque_livro" placeholder="0" required min="0">

            <label>Descrição do livro:
                <textarea placeholder="Descrição do livro..." class="texto_descricao" name="descricao_livro" required></textarea>
            </label>

            <input type="submit" value="Cadastrar Livro">
        </form>
    </div>
</body>
</html>