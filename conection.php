<?php
$servidor = "localhost"; // Normalmente é localhost em ambiente local
$usuario = "root"; // Usuário padrão do MySQL em ambientes locais
$senha = ""; // Senha do MySQL (deixe em branco se estiver usando XAMPP sem senha)
$banco = "steel_stitch"; // Nome do seu banco de dados
$mysqli = new mysqli($servidor , $usuario, $senha, $banco);
// Criar a conexão
$conection = new mysqli($servidor, $usuario, $senha, $banco);

// Comentando a parte que testa a conexão
/*
if ($conection->connect_error) {
    die("Falha na conexão: " . $conection->connect_error);
} else {
    echo "deu certo"; 
}
*/
?>
