<?php

include("conn.php");

$logoutData = json_decode(file_get_contents("php://input"), true);
$id = $logoutData["userID"];

//更新會員狀態
$sql = "UPDATE MEMBER SET MEMBER_STATUS = 0 WHERE MEMBER_ID = ?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$data = $statement->execute();

if ($data > 0) {
    echo '1'; //成功
} else {
    echo "0"; //失敗
}
