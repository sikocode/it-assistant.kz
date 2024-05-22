<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заявки</title>
</head>
<body>
<?php
	// подключаемся к серверу
require_once 'bd.php';
if (isset($_POST["fio"]) && 
    isset($_POST["phone"]) &&
    isset($_POST["email"]) &&
	isset($_POST["text_sms"])) {
     
    try {
        //$conn = new PDO("mysql:host=localhost;dbname=testdb1", "it", "admin");
        $sql = "INSERT INTO ticket (fio, phone, email, text_sms) 
                                 VALUES (:fio, :phone, :email, :text_sms)";
        // определяем prepared statement
        $stmt = $conn->prepare($sql);
        // привязываем параметры к значениям
        $stmt->bindValue(":fio", $_POST["fio"]);
        $stmt->bindValue(":phone", $_POST["phone"]);
        $stmt->bindValue(":email", $_POST["email"]);
		$stmt->bindValue(":text_sms", $_POST["text_sms"]);
        
        // выполняем prepared statement
        $affectedRowsNumber = $stmt->execute();
        // если добавлена как минимум одна строка
        if($affectedRowsNumber > 0 ){
            //echo "Сотрудник добавлен: name=" . $_POST["filial"] ."  age= " . $_POST["dolzhnost"];  
            echo "Заявка отправлена в тех. поддержку: " . $_POST["email"] ." " . $_POST["fio"];  
       
        }
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}



	// if (isset($_POST['name']) && $_POST['name'] != "")//если существует атрибут NAME и он не пустой то создаем переменную для отправки сообщения
	// 	$name = $_POST['name'];
	// else die ("Не заполнено поле \"Имя\"");//если же атрибут пустой или не существует то завершаем выполнение скрипта и выдаем ошибку пользователю.

	// if (isset($_POST['email']) && $_POST['email'] != "") //тут все точно так же как и в предыдущем случае
	// 	$email = $_POST['email'];
	// else die ("Не заполнено поле \"Email\"");

	// if (isset($_POST['subjects']) && $_POST['subjects'] != "") 
	// 	$sub = $_POST['subjects'];
	// else die ("Не заполнено поле \"Тема\"");

	// if (isset($_POST['message']) && $_POST['message'] != "") 
	// 	$body = $_POST['message'];
	// else die ("Не заполнено поле \"Сообщение\"");
	 


	// $address = "YOUR-EMAIL@MAIL.RU";//адрес куда будет отсылаться сообщение для администратора
	// $mes  = "Имя: $name \n";	//в этих строчках мы заполняем текст сообщения. С помощью оператора .= мы просто дополняем текст в переменную
	// $mes .= "E-mail: $email \n";
 	// $mes .= "Тема: $sub \n";
 	// $mes .= "Текст: $body"; 
	// $send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");//собственно сам вызов функции отправки сообщения на сервере

	// if ($send) //проверяем, отправилось ли сообщение
	// 	echo "Сообщение отправлено успешно! Перейти на <a href='https://You-hands.ru/'>you-hands.ru</a>, если вас не перенаправило вручную.";
	// else 
	// 	echo "Ошибка, сообщение не отправлено! Возможно, проблемы на сервере";
		 
?>
    <!--<p>Заявка в отдел IT</p>-->
    <!-- <form>
    <form name="form" action="mail.php" method="post" id="form_message">
		<h2>Заполните анкету для заявки в отдел IT</h2>
		<form action="handler.php">
   <p><select>
   <optgroup label="Цвет">
    <option value="c1">Апельсиновый</option>
    <option value="c2">Лимонный</option>
    <option value="c3">Персиковый</option>
   </optgroup>
   <optgroup label="Тон">
    <option value="s1">Светлый</option>
    <option value="s2">Нормальный</option>
    <option value="s3">Темный</option>
   </optgroup>
   </select></p>
   <p><input type="submit" value="Отправить"></p>-->
  <!-- </form> --> -->
		<!-- <p> <div class="titles">Ваше имя*</div> <input class="input" name="name" type="text"/> </p>
		 
		<p> <div class="titles">Электронная почта*</div> <input class="input" name="email" type="text"/> </p>
		 
		<p> <div class="titles">Какой вопрос у Вас ?</div> <input class="input" name="subjects" type="text"/> </p>
		 
		<p> <div class="titles">Какой вопрос у Вас ?</div><textarea name="message" cols="22" rows="5"></textarea></p>
-->	
<h3>Заполнете заявку</h3>	
<form>		 
		<p>ФИО:
    	<input type="text" name="fio" /></p>
    	<p>Телефон:
    	<input type="text" name="phone" /></p>
    	<p>Email:
    	<input type="text" name="email" /></p>
		<p>Text:
    	<input type="text" name="text_sms" /></p>
		<!--<p><input id="submit" value="Отправить" type="submit" /></p>
-->
        <input type="submit" value="Сохранить">
</form>

</body>
</html>