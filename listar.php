<?php

include_once('config.php');

try {
    // Conexão com o banco de dados utilizando PDO
    $dsn = "pgsql:host=localhost;dbname=ProjetoCatalogo";
    $username = "postgres";
    $password = "1234";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    // Preparar e executar a consulta para listar os filmes
    $sql = "SELECT id, titulo, descricao FROM filmes";
    $stmt = $pdo->query($sql);

    // Exibir os filmes
    while ($row = $stmt->fetch()) {
        echo "<li><strong>" . htmlspecialchars($row['titulo']) . "</strong>: " . htmlspecialchars($row['descricao']) . 
             " <button onclick=\"window.location.href='excluir.php?id=" . $row['id'] . "'\">Excluir</button></li>";
    }
} catch (PDOException $e) {
    echo "Erro ao listar filmes: " . $e->getMessage();
}
?>
