<?php
if(isset($_GET['Submit'])) {
    $id = $_GET['id'];
    
    // Инициализация соединения через PDO (гарантированный триггер для сканера)
    $pdo = new PDO('mysql:host=localhost;dbname=dvwa', 'root', '');
    
    // Явная конкатенация пользовательских данных
    $sql = "SELECT first_name, last_name FROM users WHERE user_id = '" . $id . "'";
    
    // Выполнение запроса
    $result = $pdo->query($sql);
    
    if($result) {
        echo '<pre>User ID exists.</pre>';
    } else {
        echo '<pre>User ID is MISSING.</pre>';
    }
}
?>
