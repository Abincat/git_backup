<?php

include("conn.php");

$friendData = json_decode(file_get_contents("php://input"), true);

$userId = $friendData["userId"];
$friendId = $friendData["friendId"];


$sqlInsert = "INSERT INTO FRIENDS (MEMBER_ID,FRIENDS_ID,FRIENDS_REQUESTS_STATUS,FRIEND_REQUESTS_SEND_TIME)
              VALUES (:userId,:friendId,0,now())";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(":userId", $userId);
$statement->bindValue(":friendId", $friendId);
$data = $statement->execute();

if ($data > 0) {
    echo '1'; //成功
} else {
    echo '0'; //失敗
}
