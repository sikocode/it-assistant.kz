<!DOCTYPE html>
<html>
<head>
<title>Справочник</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Список сотрудников</h2>
<?php
// подключаемся к серверу
require_once 'bd.php';
try {
    //$conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "mypassword");
    $sql = "SELECT * FROM spravochnik";
    $result = $conn->query($sql);
    echo "<table><tr><th>№</th><th>Филиал</th><th>Должность</th><th>Ф.И.О.</th><th>Телефон</th><th>Email</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["filial"] . "</td>";
            echo "<td>" . $row["dolzhnost"] . "</td>";
            echo "<td>" . $row["fio"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'>Редактировать данные</a></td>";
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