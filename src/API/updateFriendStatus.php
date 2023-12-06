<?php

include("conn.php");

$statusData = json_decode(file_get_contents("php://input"), true);
$friendId = $statusData["friendId"];
$id = $statusData["userId"];
$action = $statusData["action"];

switch ($action) {
    case "D": //刪除好友
        $sql = "UPDATE FRIENDS
                SET FRIEND_STATUS = 3
                WHERE MEMBER_ID = :id AND FRIENDS_ID = :friendId ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":friendId", $friendId);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $data = $statement->fetchAll();

        break;

    case "B": //加入黑名單
        $sql = "UPDATE FRIENDS
                SET FRIEND_STATUS = 2
                WHERE MEMBER_ID = :id AND FRIENDS_ID = :friendId ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":friendId", $friendId);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $data = $statement->fetchAll();
        break;

    case "F": //移除黑名單回到好友狀態
        $sql = "UPDATE FRIENDS
                SET FRIEND_STATUS = 1
                WHERE MEMBER_ID = :id AND FRIENDS_ID = :friendId ";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":friendId", $friendId);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $data = $statement->fetchAll();
        break;
}


if ($data > 0) {
    echo '1'; //成功
} else {
    echo "0"; //失敗
}
