<?php
// подключаемся к серверу
require_once 'bd.php';
if(isset($_POST["id"]))
{
    try {
        //$conn = new PDO("mysql:host=localhost;dbname=testdb1", "root", "mypassword");
        $sql = "DELETE FROM spravochnik WHERE id = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":userid", $_POST["id"]);
        $stmt->execute();
        header("Location: index_delete.php");
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>