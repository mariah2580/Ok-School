<?php
$host = "localhost";
$user = "root";
$password = "";
$ok_school_db = "ok_school_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$ok_school_db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM events");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($events);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
