<?php
    require __DIR__ . "../../../dao/daoLivro.php";

    $l = new daoLivro($conexao);
    $livros = $l->buscarLivroPorNome($_POST['nome_livro']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doaçoes</title>
</head>
<body>
    <a href="index.php?navegation=1" class="sair_button">
        Voltar
    </a>
    <div>
        <form action="src/view/aluguel/listarAlugueisPorUsuario.php" method="post">
            <label for="nome"></label>
            <h1 class="cabeçalho">Selecione o livro que voce quer receber</h1>
        </form>    
        <table>
            <thead>
                <tr>
                    <th width="220" class="tnomeUsuario">Nome do livro</th>
                    <th width="220" class="tdata">Autor</th>
                    <th width="220" class="tdata">Estoque atual</th>
                    <th width="220">Doar</th>
                </tr>
            </thead>
            <tbody>
                <br><br>
                <?php foreach($livros as $li): ?>
                <tr>
                    <td><?php echo $li['nome_livro']; ?></td>
                    <td><?php echo $li['autor_livro']; ?></td>
                    <td><?php echo $li['estoque_livro']; ?></td>
                    <td>
                        <a 
                        href="src/controllers/receberDoacao.php?id_doacao=<?= $_POST['id_doacao'] ?>&id_livro=<?= $li['id_livro'] ?>&qtd_doacao=<?= $_POST['qtd_doacao'] ?>" 
                        class="baixarAlu" 
                        onclick="return confirm('Tem certeza que deseja receber esta doação?');"
                                >
                            Receber
                         </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
