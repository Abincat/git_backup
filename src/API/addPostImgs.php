<?php

include("conn.php");

$imgData = json_decode(file_get_contents("php://input"), true);

$postId = $imgData['postId'];
$imgList = $imgData['imgList'];
$count = 0;

foreach ($imgList as $key => $value) {
    // echo $postId . '' . $value;

    $img = base64_decode($value);

    $sqlInsert = "insert into POST_IMAGE (POST_ID,POST_IMAGE)
                values (:postId,:img)";
    $statement = $pdo->prepare($sqlInsert);
    $statement->bindValue(":postId", $postId);
    $statement->bindValue(":img", $img);
    $data = $statement->execute();

    //計算成功次數
    if ($data > 0) {
        $count++;
    }
}


if ($count > 0) {
    echo $count; //成功
} else {
    echo '0'; //失敗
}
