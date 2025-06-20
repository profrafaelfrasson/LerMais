
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Categoria</title>
</head>
<body>
    <a href="/Projeto-Ler-Mais/index.php?navegation=1" class="sair_button">
    Voltar
    </a>
    <div class="text-button">
        <form action="src/controllers/insertCategoria.php" method="POST">
            <h1>Insira nova categoria</h1>
            <label>Nome da categoria: 
            </label><input placeholder="Categoria..."type="text" name = "nome_categoria" id = "nome_categoria" >
            </label>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>