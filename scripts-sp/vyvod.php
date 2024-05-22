<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-vyvod.css">
    <title>Справочник</title>
</head>
<body>
    
<?php
// подключаемся к серверу
require_once 'bd.php';
try {
    //$conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "mypassword");
    $sql = "SELECT * FROM spravochnik";
    $result = $conn->query($sql);
    echo "<table class='table'><tr><th>Филиал</th><th>Должность</th><th>Ф.И.О.</th><th>Телефон</th><th>Email</th><th></th></tr>";
    while($row = $result->fetch()){
        echo "<tr>";
            // echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["filial"] . "</td>";
            echo "<td>" . $row["dolzhnost"] . "</td>";
            echo "<td>" . $row["fio"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>    
</body>
</html>