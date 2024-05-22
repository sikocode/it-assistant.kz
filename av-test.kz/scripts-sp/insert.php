<!DOCTYPE html>
<html>
<head>
<title>Справочник</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// подключаемся к серверу
require_once 'bd.php';
if (isset($_POST["filial"]) && 
    isset($_POST["dolzhnost"]) && 
    isset($_POST["fio"]) && 
    isset($_POST["phone"]) &&
    isset($_POST["email"])) {
     
    try {
        //$conn = new PDO("mysql:host=localhost;dbname=testdb1", "it", "admin");
        $sql = "INSERT INTO spravochnik (filial, dolzhnost, fio, phone, email) 
                                 VALUES (:filial, :dolzhnost, :fio, :phone, :email)";
        // определяем prepared statement
        $stmt = $conn->prepare($sql);
        // привязываем параметры к значениям
        $stmt->bindValue(":filial", $_POST["filial"]);
        $stmt->bindValue(":dolzhnost", $_POST["dolzhnost"]);
        $stmt->bindValue(":fio", $_POST["fio"]);
        $stmt->bindValue(":phone", $_POST["phone"]);
        $stmt->bindValue(":email", $_POST["email"]);
        
        // выполняем prepared statement
        $affectedRowsNumber = $stmt->execute();
        // если добавлена как минимум одна строка
        if($affectedRowsNumber > 0 ){
            //echo "Сотрудник добавлен: name=" . $_POST["filial"] ."  age= " . $_POST["dolzhnost"];  
            echo "Сотрудник добавлен: " . $_POST["filial"] ." " . $_POST["fio"];  
       
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
<h3>Добавить сотрудника</h3>
<form method="post">
    <p>Филиал:
    <input type="text" name="filial" /></p>
    <p>Должность:
    <input type="text" name="dolzhnost" /></p>
    <p>ФИО:
    <input type="text" name="fio" /></p>
    <p>Телефон:
    <input type="text" name="phone" /></p>
    <p>Email:
    <input type="text" name="email" /></p>
    
    <input type="submit" value="Сохранить">
</form>
</body>
</html>