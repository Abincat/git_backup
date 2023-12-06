<?php

include("conn.php");

$postID = json_decode(file_get_contents("php://input"), true);
$id = $postID["id"];

$sql = "SELECT ROW_NUMBER() OVER (ORDER BY POST_ID) as ID,POST_IMAGE FROM POST_IMAGE WHERE POST_ID = :id ";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll();



if (COUNT($data) != 0) {
    // $data[0]['POST_IMAGE'] = base64_encode($data[0]['POST_IMAGE']);
    echo json_encode($data);
    // echo COUNT($data);
} else {
    echo "0"; //失敗
}
