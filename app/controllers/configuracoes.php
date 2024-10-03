<?php
session_start();

// Armazenar as configurações na sessão
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['tema'] = $_POST['tema'] ?? 'claro';
    header('Location: ../configuracoes.html'); // Redireciona para a página de configurações
    exit();
}

// Define o tema padrão se não estiver configurado
if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro';
}
?>
