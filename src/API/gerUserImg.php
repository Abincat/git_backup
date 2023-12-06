<?php

include("conn.php");

$memberID = json_decode(file_get_contents("php://input"), true);
$id = $memberID["id"];

$sql = "SELECT * FROM MEMBER WHERE MEMBER_ID = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    $respData["ID"] = $data[0]['MEMBER_ID'];
    $respData["Fullname"] = $data[0]['MEMBER_LAST_NAME'] . $data[0]['MEMBER_FIRST_NAME'];
    $respData["Account"] = $data[0]['MEMBER_ACCOUNT'];
    $respData["img"] = $data[0]['MEMBER_PIC'];

    echo json_encode($respData);
} else {
    echo "fail"; //失敗
}
