<?php
include("conn.php");

$req = json_decode(file_get_contents("php://input"), true);
$id = $req['id'];

$sql = "SELECT COLLECTION_IMAGE FROM 
        member_collection t1
        JOIN collection t2 ON t1.COLLECTION_ID = t2.COLLECTION_ID
        WHERE MEMBER_ID=:id AND MEMBER_COLLECTION_SELECTED=1";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

$processedData = [];

foreach ($data as $key=> $item) {
    $data[$key]['COLLECTION_IMAGE'] = base64_decode($item['COLLECTION_IMAGE']);
    // $processedData[] = $item;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);



?>