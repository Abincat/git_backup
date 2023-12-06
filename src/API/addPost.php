<?php

include("conn.php");

$postData = json_decode(file_get_contents("php://input"), true);

// $postId = $postData['id'];
$postContent = $postData['content'];
$postStatus = $postData['status'];
$postCreateTime = $postData['createTime'];
$postUpdateTime = $postData['createTime'];
$memberId = $postData['userId'];


$sqlInsert = "insert into 
POST (POST_CONTENT,POST_STATUS,POST_CREATETIME,POST_UPDATETIME,MENBER_ID)
values (:postContent,:status,:createTime,:updateTime,:memebrId)";

$statement = $pdo->prepare($sqlInsert);
// $statement->bindValue(":postId", $postId);
$statement->bindValue(":postContent", $postContent);
$statement->bindValue(":status", $postStatus);
$statement->bindValue(":createTime", $postCreateTime);
$statement->bindValue(":updateTime", $postUpdateTime);
$statement->bindValue(":memebrId", $memberId);
$data = $statement->execute();

if ($data > 0) {

    $sqlSelect = "SELECT POST_ID FROM POST WHERE POST_CONTENT = :postContent && POST_CREATETIME =:createTime && MENBER_ID = :memebrId";

    $statement = $pdo->prepare($sqlSelect);
    $statement->bindValue(":postContent", $postContent);
    $statement->bindValue(":createTime", $postCreateTime);
    $statement->bindValue(":memebrId", $memberId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data); //成功
} else {
    echo '0'; //失敗
}
