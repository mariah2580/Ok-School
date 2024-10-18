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

// Cria a tabela de eventos
    $tableSql = "
        CREATE TABLE IF NOT EXISTS events (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            event_date DATE NOT NULL
        );
    ";
    $pdo->exec($tableSql);
    echo "Tabela 'events' criada com sucesso.<br>";

    // Inserindo dados de exemplo na tabela
    $insertSql = "
        INSERT INTO events (title, description, event_date) VALUES
        ('Webinar de Educação Inclusiva', 'Uma discussão sobre as melhores práticas de inclusão nas escolas.', '2024-10-25'),
        ('Palestra: Educação para Todos', 'Discussão com especialistas sobre inclusão e equidade no ensino.', '2024-11-10');
    ";
    $pdo->exec($insertSql);
    echo "Dados de exemplo inseridos com sucesso.<br>";

// Fechando a conexão
$conn->close();
?>
