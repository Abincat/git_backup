<?php

// include("conn.php");

// $req = json_decode(file_get_contents("php://input"),true);
// $giftId = $req['giftId'];
// $sql="SELECT * FROM collection ORDER BY RAND() LIMIT 1";

// $statement = $pdo->prepare($sql);
// $statement -> execute();
// $data = $statement -> fetchAll(PDO::FETCH_ASSOC);

// if($data){
//     $data[0]['COLLECTION_IMAGE']=base64_decode($data[0]['COLLECTION_IMAGE']);
// }

// header('Content-Type:application/json');
// echo json_encode($data,JSON_UNESCAPED_UNICODE);

include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$giftId = $req['giftId'];
$sql="SELECT * FROM collection ORDER BY RAND() LIMIT 1";

$statement = $pdo->prepare($sql);
$statement -> execute();
$data = $statement -> fetchAll(PDO::FETCH_ASSOC);

if($data){
    $data[0]['COLLECTION_IMAGE']=base64_decode($data[0]['COLLECTION_IMAGE']);
}

header('Content-Type:application/json');
echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>