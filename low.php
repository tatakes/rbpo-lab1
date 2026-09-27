<?php

class VulnerableDVWA {
    
    private $dbConnection;

    public function __construct() {
        // Имитация подключения к БД (SonarCloud распознает mysqli как точку входа SQL)
        $this->dbConnection = new mysqli("localhost", "root", "password", "dvwa");
    }

    public function getUserInfo() {
        // 1. SOURCE (Источник нефильтрованных данных)
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            
            // 2. Уязвимая конкатенация (Taint Flow)
            // Прямое склеивание строки без параметризации — главный триггер для SAST
            $sql = "SELECT first_name, last_name FROM users WHERE user_id = '" . $userId . "'";
            
            // 3. SINK (Опасная функция выполнения)
            $result = $this->dbConnection->query($sql);
            
            if ($result && $result->num_rows > 0) {
                echo "<pre>User ID exists in the database.</pre>";
            } else {
                echo "<pre>User ID is MISSING from the database.</pre>";
            }
        }
    }
}

// Запуск уязвимого кода
$app = new VulnerableDVWA();
$app->getUserInfo();
