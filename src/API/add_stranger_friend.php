<?php
include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id=$req['id'];
$postMemberId=$req['postMemberId'];


$sql="INSERT INTO friends(
MEMBER_ID,
FRIENDS_ID,
FRIENDS_REQUESTS_STATUS,
FRIEND_REQUESTS_SEND_TIME)
VALUES(:id,:postMemberId,0,now())";

$statement = $pdo->prepare($sql);

$statement -> bindValue(":id",$id);
$statement -> bindValue(":postMemberId",$postMemberId);



$data = $statement -> fetchAll(PDO::FETCH_ASSOC);

$statement -> execute();

echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>