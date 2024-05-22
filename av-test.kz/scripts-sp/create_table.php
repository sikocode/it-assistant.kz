<?php
//require_once 'bd.php';
try {
    // подключаемся к серверу
    $conn = new PDO("mysql:host=localhost;dbname=bdspravochnik", "it", "admin");
     
    // SQL-выражение для создания таблицы
    $sql = "create table spravochnik (id integer auto_increment primary key, filial varchar(30), dolzhnost varchar(30), fio varchar(50), phone integer, email varchar(50));";
    //$sql = "create table spravochnik (id integer auto_increment primary key, name varchar(30), age integer);";
    
    // выполняем SQL-выражение
    $conn->exec($sql);
    echo "Table spravochnik has been created";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>