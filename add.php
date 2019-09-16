<?php
//echo "логин: $_POST[first]";
if (!empty($_POST)) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=adminWebinse;charset=utf8', 'Anthony', '4044059860');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `user` (`First name`, `Second name`,`E-mail`) VALUES ('$firstName', '$secondName','$email')";
    $affacted_rows = $pdo->exec($sql);
} else
    echo 'Введите данные!';



