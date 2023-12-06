<?php

include("conn.php");

$commentData = json_decode(file_get_contents("php://input"), true);

$commentText = $commentData['commemtText'];
$memberId = $commentData['userId'];
$commentCreateTime = str_replace('/', '-', $commentData['createTime']);
$postId = $commentData['postId'];


$sqlInsert = "INSERT INTO POST_COMMENT (COMMENT_TEXT,MEMBER_ID,COMMENT_CREATETIME,POST_ID)
              VALUES (:commentText,:memberId,:commentCreateTime,:postId)";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(":commentText", $commentText);
$statement->bindValue(":memberId", $memberId);
$statement->bindValue(":commentCreateTime", $commentCreateTime);
$statement->bindValue(":postId", $postId);
$data = $statement->execute();

if ($data > 0) {
    echo '1'; //成功
} else {
    echo '0'; //失敗
}
