<?php
    require __DIR__ . "/../../dao/daLivroAluguel.php";

    $a = new daoAluguel($conexao);
    $alugueis = $a->listAlugueisByUsername($_SESSION['usuario']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaAlugueis</title>
    <link rel="stylesheet" href="../../components/style-listarAlugueis.css">
    <style>
            .sair_button{
                margin-left: 60px;
                position: absolute;
                padding: 15px 25px;
                background: white;
                color: blue;
                font-size: 20px;
                text-decoration: none;
                border-radius: 15px;
            }
        </style>
</head>
<body>
    <div>
        <a href="../../../index.php?navegation=1" class="sair_button">
        Voltar
        </a>
        <table>
            <thead>
                <tr>
                <th class="tnomeUsuario">Nome do usuario</th>
                <th class="tdata">Livro Alugado</th>
                <th class="tdata">Quantidade Alugada</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($alugueis as $a): ?>
                <tr>
                    <td><?php echo $a['nome_usuario']; ?></td>
                    <td><?php echo $a['nome_livro']; ?></td>
                    <td><?php echo $a['qtd_aluguel']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>