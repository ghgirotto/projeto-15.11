<?php
// Inclui a conexão com o banco de dados
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data-nascimento'];
    $tamanho_tenis = $_POST['tamanho-tenis'];
    $tamanho_camiseta = $_POST['tamanho-camiseta'];
    $tamanho_calca = $_POST['tamanho-calca'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha

    // Verifica se o email já existe no banco de dados
    $sql_check = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conection->prepare($sql_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Erro: Já existe um usuário com este email!";
    } else {
        // Insere os dados no banco
        $sql = "INSERT INTO usuarios (nome, email, data_nascimento, tamanho_tenis, tamanho_camiseta, tamanho_calca, senha)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conection->prepare($sql);
        $stmt->bind_param("sssssss", $nome, $email, $data_nascimento, $tamanho_tenis, $tamanho_camiseta, $tamanho_calca, $senha);

        // Exibe a consulta SQL para depuração (opcional)
        echo "Consulta SQL: " . $sql . "<br>";

        // Tenta executar a consulta
        if ($stmt->execute() === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conection->close();
?>
