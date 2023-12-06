<?php

include("conn.php");

$statusData = json_decode(file_get_contents("php://input"), true);
$friendId = $statusData["friendId"];
$id = $statusData["userId"];
$action = $statusData["action"];

switch ($action) {
    case "A":
        $sql1 = "UPDATE FRIENDS
                SET FRIENDS_REQUESTS_STATUS = '1' ,FRIEND_STATUS = 1, FRIENDS_CREATETIME = NOW()
                WHERE MEMBER_ID = :id AND FRIENDS_ID = :friendId ";

        $statement = $pdo->prepare($sql1);
        $statement->bindValue(":friendId", $friendId);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $data = $statement->fetchAll();
        break;

    case "R":
        $sql2 = "UPDATE FRIENDS
                SET FRIENDS_REQUESTS_STATUS = 2
                WHERE MEMBER_ID = :id AND FRIENDS_ID = :friendId";

        $statement = $pdo->prepare($sql2);
        $statement->bindValue(":friendId", $friendId);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $data = $statement->fetchAll();
        break;
}


if ($data > 0) {
    echo $action . ' 1'; //成功
} else {
    echo "0"; //失敗
}
