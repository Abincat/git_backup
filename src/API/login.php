<?php

include("conn.php");

$loginData = json_decode(file_get_contents("php://input"), true);
$account = $loginData["userAccount"];
$pwd = $loginData["userPassword"];

$sql = "SELECT * FROM MEMBER WHERE MEMBER_ACCOUNT = ? && MEMBER_PASSWORD = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $account);
$statement->bindValue(2, $pwd);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    echo json_encode($data);
} else {
    echo "Failed";
}


?>
