<?php

include("conn.php");

$memberID = json_decode(file_get_contents("php://input"), true);
$id = $memberID["userID"];

$sql = "SELECT * FROM MEMBER WHERE MEMBER_ID = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    $respData["ID"] = $data[0]['MEMBER_ID'];
    $respData["Fullname"] = $data[0]['MEMBER_LAST_NAME'] . $data[0]['MEMBER_FIRST_NAME'];
    $respData["Account"] = $data[0]['MEMBER_ACCOUNT'];
    $respData["img"] = base64_encode($data[0]['MEMBER_PIC']);
    // $respData["phone"] = $data[0]['MEMBER_PHONE'];

    echo json_encode($respData);
} else {
    echo "0"; //失敗
}
