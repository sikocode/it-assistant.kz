<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ticket-style.css">
<title>Справочник</title>
<meta charset="utf-8" />
</head>
<body>
<?php
// подключаемся к серверу
require_once 'bd.php';

/*Соединяеся с базой и делаем выборку из таблицы*/

// mysql_connect("ip", "login", "password");

// mysql_select_db("name_db");

// $sql = "SELECT * FROM spravochnik";

// $result_select = mysql_query($sql);




try {
  $sql = "SELECT * FROM spravochnik";
  $result_select = $conn->query($sql);

/*Выпадающий список*/



echo "<select name = 'filial'>";

while($object = mysql_fetch_object($result_select)){

//echo "<option value = '$object->filial' > $object->filial </option>";
echo "<option>" . $row["filial"] . "</option>";

}

echo "</select>";
}
catch (PDOException $e) {
  echo "Database error: " . $e->getMessage();
}

?>

<form>
   <p><select size="1">
    <option disabled>Выберите имя</option>
    <?php while($object = mysql_fetch_object($result_select)):?>
    <option value ="<?=$object->filial?>"><?=$object->filial?></option>
    <?php endwhile;?>
   </select></p>
  </form>
</body>
</html>
