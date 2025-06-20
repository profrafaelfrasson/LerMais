<?php
    session_start();
    require __DIR__ . "../../../dao/daoDoacao.php";

    $d = new daoDoacao($conexao);
    $doacoes = $d->listarDoacoes();

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
        
        <form action = "src/view/doacao/listarDoacoesPorUsuario.php" method="post">
            <label for="nome"></label>
            <h1 class="cabeçalho">Doaçoes</h1>
            
            <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome do usuário">
            <input type="submit" class="buscarAlu" value="Buscar">
            <p><?php if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            $_SESSION['message'] = '';
        } ?></p>
        </form>    
        <table>
            <thead>
                <tr>
                <th width="220" class="tnomeUsuario">Nome do usuario</th>
                <th width="220" class="tdata">Nome do livro</th>
                <th width="220" class="tdata">Autor</th>
                <th width="220" class="tdata">Quantidade doada</th>
                <th width="220">Status</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($doacoes as $do): ?>
                <tr>
                    <td><?php echo $do['usuario']; ?></td>
                    <td><?php echo $do['nome_livro']; ?></td>
                    <td><?php echo $do['autor_livro']; ?></td>
                    <td><?php echo $do['qtd_doacao']; ?></td>
                    <td>
                        <a 
                        href="index.php?navegation=7&&id_doacao=<?= $do['id_doacao']?>&&qtd_doacao=<?= $do['qtd_doacao'] ?>" 
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