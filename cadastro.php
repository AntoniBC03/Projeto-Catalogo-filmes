<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include_once('config.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram preenchidos
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Obtenha os dados do formulário
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash da senha

        try {
            // Conexão com o banco de dados usando PDO (substitua as informações pelo seu próprio)
            // $dsn = "pgsql:host=localhost;dbname=ProjetoCatalogo";
            // $pdo = new PDO($dsn, 'postgres', '1234', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Preparar e executar a consulta para adicionar um novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            // Redireciona para a tela de login
            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        // Exibe uma mensagem se os campos estiverem vazios
        echo '<script>alert("Por favor, preencha todos os campos.");</script>';
    }
}
?>
