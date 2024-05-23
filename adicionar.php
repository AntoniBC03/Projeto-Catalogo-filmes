<?php

include_once('config.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Preparar a consulta para adicionar um novo filme
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $sql = "INSERT INTO filmes (titulo, descricao) VALUES (:titulo, :descricao)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);

        // Executar a consulta
        $stmt->execute();

        // Redirecionar para a página do catálogo de filmes
        header("Location: catalogo_filmes.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao adicionar filme: " . $e->getMessage();
    }
}
?>
