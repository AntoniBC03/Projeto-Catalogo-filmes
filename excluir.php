<?php

include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

        // Preparar a consulta para excluir o filme
        $sql = "DELETE FROM filmes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executar a consulta
        $stmt->execute();

        // Redirecionar para a página do catálogo de filmes
        header("Location: catalogo_filmes.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir filme: " . $e->getMessage();
    }
} else {
    echo "ID do filme não fornecido.";
}
?>
