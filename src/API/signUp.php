<?php

include("conn.php");

$signupData = json_decode(file_get_contents("php://input"), true);

$account = $signupData['userAccount'];
$pwd = password_hash($signupData['userPassword'], PASSWORD_BCRYPT);
$lastName = $signupData['lastName'];
$firstName = $signupData['firstName'];

$memebrPic = file_get_contents($signupData['img']);



$sql = "insert into
MEMBER (MEMBER_FIRST_NAME,MEMBER_LAST_NAME,MEMBER_ACCOUNT,MEMBER_PASSWORD,MEMBER_COIN,MEMBER_PIC,MEMBER_STATUS,MEMBER_CREATETIME)
values(:firstName,:lastName,:account,:pwd,0,:memebrPic,0,now())";

$statement = $pdo->prepare($sql);
$statement->bindValue(":account", $account);
$statement->bindValue(":pwd", $pwd);
$statement->bindValue(":lastName", $lastName);
$statement->bindValue(":firstName", $firstName);
$statement->bindValue(":memebrPic", $memebrPic);
$data = $statement->execute();

if ($data > 0) {
    echo '1'; //成功
} else {
    echo '0'; //失敗
}
