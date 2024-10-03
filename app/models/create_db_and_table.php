<?php
// Configurações de conexão
$servername = "localhost";
$username = "root";
$password = "";

// Criando a conexão com o servidor
$conn = new mysqli($servername, $username, $password);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criando o banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS relatos_db";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso!<br>";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error;
}

// Conectando ao banco de dados recém-criado
$conn = new mysqli($servername, $username, $password, "relatos_db");

// Verificando novamente a conexão com o banco de dados
if ($conn->connect_error) {
    die("Conexão falhou ao conectar no banco de dados: " . $conn->connect_error);
}

// Criando a tabela 'relatos'
$sql = "CREATE TABLE IF NOT EXISTS relatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL,
    idade INT NOT NULL,
    relato TEXT NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'relatos' criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
