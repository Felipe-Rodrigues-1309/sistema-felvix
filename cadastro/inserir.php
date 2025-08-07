<?php
// Conectar ao banco
$host = "127.0.0.1";
$usuario = "root";
$senha = "52461309";
$banco = "cadastro_de_produtos";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegar dados do formulário
$nome = $_POST['nome'];
$valor = $_POST['valor'];

// Inserir no banco
$sql = "INSERT INTO produtos (nome, valor) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sd", $nome, $valor); // s = string, d = double

if ($stmt->execute()) {
    echo "Produto inserido com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$conn->close();
?>
