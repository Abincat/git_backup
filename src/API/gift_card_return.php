<?php


include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id=$req['id'];
$giftId = $req['giftId'];


$sql="INSERT INTO member_collection(
MEMBER_ID,
COLLECTION_ID,
MEMBER_COLLECTION_CREATETIME,
MEMBER_COLLECTION_READED)
VALUES(:id,:giftId,now(),1)";

$statement = $pdo->prepare($sql);

$statement -> bindValue(":id",$id);
$statement -> bindValue(":giftId",$giftId);


$data = $statement -> fetchAll(PDO::FETCH_ASSOC);

$statement -> execute();

echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>