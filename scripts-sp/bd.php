<?php 
try {
    //$conn = new PDO("mysql:host=localhost;dbname=bdavangardsauda", "it", "admin");
    $conn = new PDO("mysql:host=localhost; dbname=bdspravochnik", "it", "admin");
    // установка режима вывода ошибок
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "База данных успешна подключина";
}
catch (PDOException $e) {
    echo "Ошибка подключения базы данных: " . $e->getMessage();
}
?>