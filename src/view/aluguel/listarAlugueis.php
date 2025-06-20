<?php
    require __DIR__ . "../../../dao/daLivroAluguel.php";

    $a = new daoAluguel($conexao);
    $alugueis = $a->listAlugueis();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaAlugueis</title>
</head>
<body>
    <a href="index.php?navegation=1" class="sair_button">
        Voltar
    </a>
    <div>
        <form action = "src/view/aluguel/listarAlugueisPorUsuario.php" method="post">
            <label for="nome"></label>
            <h1 class="cabeçalho">Alugueis</h1>
            <input type="text" id="nome" name="nome" placeholder="Nome do usuário">
            <input type="submit" class="buscarAlu" value="Buscar">
        </form>    
        <table>
            <thead>
                <tr>
                <th width="220" class="tnomeUsuario">Nome do usuario</th>
                <th width="220" class="tdata">Livro Alugado</th>
                <th width="220" class="tdata">Quantidade Alugada</th>
                <th width="220">Status</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($alugueis as $al): ?>
                <tr>
                    <td><?php echo $al['nome_usuario']; ?></td>
                    <td><?php echo $al['nome_livro']; ?></td>
                    <td><?php echo $al['qtd_aluguel']; ?></td>
                    
                    <td>
                         <?php if($a->verificaStatus($al['id_aluguel'])=='P'){ ?>
                            <a href="src/controllers/efetivarAluguel.php?id_aluguel=<?= $al['id_aluguel'] ?>" 
                          class="baixarAlu" onclick="return confirm('Tem certeza que deseja baixar este aluguel?');">Efetivar</a>
                          <?php
                        }elseif($a->verificaStatus($al['id_aluguel'])=='S'){ ?>
                            <a href="src/controllers/baixarAluguel.php?id_aluguel=<?= $al['id_aluguel'] ?>" 
                          class="baixarAlu" onclick="return confirm('Tem certeza que deseja efetivar este aluguel?');">Dar baixa</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>