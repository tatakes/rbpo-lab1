<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvwa";

// 1. Получаем нефильтрованные данные
$userId = $_GET['id'];

// ТРИГГЕР 1: Процедурный стиль mysqli (Самый частый паттерн для SAST)
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql1 = "SELECT first_name, last_name FROM users WHERE user_id = '" . $userId . "'";
mysqli_query($conn, $sql1);

// ТРИГГЕР 2: Объектный стиль mysqli с инъекцией прямо в метод
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->query("SELECT first_name, last_name FROM users WHERE user_id = '" . $_GET['id'] . "'");

// ТРИГГЕР 3: Использование интерфейса PDO без подготовленных выражений
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->query("SELECT first_name, last_name FROM users WHERE user_id = " . $_GET['id']);

?>
