<?php

include("conn.php");

$postID = json_decode(file_get_contents("php://input"), true);
$id = $postID["id"];

$sql = "SELECT c.*,m.MEMBER_FIRST_NAME,m.MEMBER_LAST_NAME,m.MEMBER_PIC
        FROM POST_COMMENT c
	        JOIN MEMBER m
            ON c.MEMBER_ID=m.MEMBER_ID
        WHERE POST_ID= :id ";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll();



if (COUNT($data) != 0) {
    echo json_encode($data);
} else {
    echo "0"; //失敗
}
