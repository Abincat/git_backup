<?php

include("conn.php");

$resetData = json_decode(file_get_contents("php://input"), true);

$id = $resetData['userId'];
$account = $resetData['userAccount'];
$pwd = password_hash($resetData['userPassword'], PASSWORD_BCRYPT);

$sql = "UPDATE MEMBER
        SET MEMBER_PASSWORD = :pwd
        WHERE MEMBER_ID = :id AND MEMBER_ACCOUNT = :account";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->bindValue(":account", $account);
$statement->bindValue(":pwd", $pwd);
$statement->execute();
$data = $statement->fetchAll();


if ($data > 0) {
    echo ' 1'; //成功
} else {
    echo "0"; //失敗
}
