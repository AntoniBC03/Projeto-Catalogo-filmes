<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes</title>
    <link rel="stylesheet" href="stylesF.css">
</head>
<body>
    <div class="container">
        <h2>Catálogo de Filmes</h2>
        
        <!-- Botão para redirecionar para a tela de login -->
        <button onclick="window.location.href='login.php'">Tela de Login</button>

        <form action="adicionar.php" method="post">
            <input type="text" name="titulo" placeholder="Título do Filme" required>
            <input type="text" name="descricao" placeholder="Descrição do Filme" required>
            <button type="submit">Adicionar Filme</button>
        </form>

        <h3>Filmes</h3>
        <ul>
            <?php include 'listar.php'; ?>
        </ul>
    </div>
</body>
</html>
