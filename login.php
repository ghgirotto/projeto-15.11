<?php
// Inclui a conexão com o banco de dados
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para buscar o usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // O email existe, agora verificamos a senha
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            // Senha correta, inicia a sessão
            session_start();
            $_SESSION['usuario'] = $usuario['nome'];
            echo "Login bem-sucedido! Bem-vindo, " . $_SESSION['usuario'];
            // Redirecionar para uma página de boas-vindas ou página principal
            // header("Location: bemvindo.php");
            // exit();
        } else {
            // Senha incorreta
            echo "Erro: Senha incorreta!";
        }
    } else {
        // Email não encontrado
        echo "Erro: Email não encontrado!";
    }

    $stmt->close();
}

$conection->close();
?>
