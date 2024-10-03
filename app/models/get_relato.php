<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "relatos_db";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultando os relatos
$sql = "SELECT nome, idade, relato, data FROM relatos ORDER BY data DESC"; // Seleciona relatos e ordena pela data
$result = $conn->query($sql);

// Verifica se existem relatos
if ($result->num_rows > 0) {
    // Exibe cada relato
    while($row = $result->fetch_assoc()) {
        echo "<div class='relato'>";
        echo "<p><strong>" . htmlspecialchars($row['nome']) . "</strong>, " . htmlspecialchars($row['idade']) . " anos</p>";
        echo "<p>" . htmlspecialchars($row['relato']) . "</p>";
        echo "<span>— " . htmlspecialchars($row['data']) . "</span>";
        echo "</div>";
    }
} else {
    echo "Nenhum relato encontrado.";
}

$conn->close();
?>
