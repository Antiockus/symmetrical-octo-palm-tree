<?php

declare(strict_types=1);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    die();
}

$todo = htmlspecialchars(trim($_POST['todo']));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_todo";
$conn;

try {
    $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO todos (todo)
    VALUES (:todo)");
    $sql->bindParam(':todo', $todo);
    // use exec() because no results are returned
    $test = $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
