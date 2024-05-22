<?php 
// подключаемся к серверу
require_once 'bd.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Справочник</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $_GET["id"];
    $sql = "SELECT * FROM spravochnik WHERE id = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $userid);
    // выполняем выражение и получаем пользователя по id
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $filial = $row["filial"];
            $dolzhnost = $row["dolzhnost"];
            $fio = $row["fio"];
            $phone = $row["phone"];
            $email = $row["email"];
        }
        echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Филиал:
                    <input type='text' name='filial' value='$filial' /></p>
                    <p>Должность:
                    <input type='text' name='dolzhnost' value='$dolzhnost' /></p>
                    <p>Ф.И.О.:
                    <input type='text' name='fio' value='$fio' /></p>
                    <p>Телефон:
                    <input type='text' name='phone' value='$phone' /></p>
                    <p>Email:
                    <input type='text' name='email' value='$email' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo "Пользователь не найден";
    }
}
elseif (isset($_POST["id"]) && 
        isset($_POST["filial"]) && 
        isset($_POST["dolzhnost"]) &&
        isset($_POST["fio"]) &&
        isset($_POST["phone"]) &&
        isset($_POST["email"]) ) {
      
    $sql = "UPDATE spravochnik SET filial=:filial, dolzhnost=:dolzhnost, fio=:fio, phone=:phone, email=:email WHERE id = :userid";
    

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":userid", $_POST["id"]);
    $stmt->bindValue(":filial", $_POST["filial"]);
    $stmt->bindValue(":dolzhnost", $_POST["dolzhnost"]);
    $stmt->bindValue(":fio", $_POST["fio"]);
    $stmt->bindValue(":phone", $_POST["phone"]);
    $stmt->bindValue(":email", $_POST["email"]);
          
    $stmt->execute();
    header("Location: index_update.php");
}
else{
    echo "Некорректные данные";
}
?>
</body>
</html>