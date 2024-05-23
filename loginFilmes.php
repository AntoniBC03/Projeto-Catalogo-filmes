<?php

include_once('config.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram preenchidos
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Obtenha os dados do formulário
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            // Conexão com o banco de dados usando PDO (substitua as informações pelo seu próprio)
            // $dsn = "pgsql:host=localhost;dbname=Projeto Catalogo";
            // $pdo = new PDO($dsn, 'host', '1234', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Preparar e executar a consulta para verificar as credenciais do usuário
            $stmt = $pdo->prepare("SELECT password FROM usuarios WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($password, $result['password'])) {
                // Redireciona para a página do catálogo de filmes
                header('Location: catalogo_filmes.php');
                exit;
            } else {
                // Exibe uma mensagem de erro
                echo '<script>alert("Usuário ou senha incorretos. Tente novamente.");</script>';
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        // Exibe uma mensagem se os campos estiverem vazios
        echo '<script>alert("Por favor, preencha todos os campos.");</script>';
    }
}
?>
