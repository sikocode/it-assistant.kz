<?php
// подключаемся к серверу
require_once 'bd.php';
 try {
     
    // SQL-выражение для создания базы данных
    $sql = "CREATE DATABASE bdspravochnik";
    // выполняем SQL-выражение
    $conn->exec($sql);
    echo "БД создана";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>