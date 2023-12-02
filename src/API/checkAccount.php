<?php

include("conn.php");

$signupData = json_decode(file_get_contents("php://input"), true);
$account = $signupData['userAccount'];

$sql = "SELECT * FROM MEMBER WHERE MEMBER_ACCOUNT = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $account);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    echo '1'; //有重複
} else {
    echo '0'; //沒重複
}
