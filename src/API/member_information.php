<?php

include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id = $req['id'];

$sql="SELECT * FROM MEMBER where MEMBER_ID = :id";

$statement = $pdo->prepare($sql);
$statement -> bindValue(":id",$id);
$statement -> execute();
$data = $statement -> fetchAll(PDO::FETCH_ASSOC);
// print_r($data);
// echo $data;

if($data){
    $data[0]['MEMBER_PIC']=base64_decode($data[0]['MEMBER_PIC']);
}



echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>