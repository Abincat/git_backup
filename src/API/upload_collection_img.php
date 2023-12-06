<?php

//蒐集品檔案上傳器
include("conn.php");

$req = json_decode(file_get_contents("php://input"), true);
$id = $req['id'];
$imageData = $req['imageData'];

$decodedImage = base64_encode($imageData);

$sql = "UPDATE COLLECTION SET COLLECTION_IMAGE = :base64Image WHERE COLLECTION_ID = :id";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->bindValue(":base64Image", $decodedImage, PDO::PARAM_LOB);

try {
    $statement->execute();
    echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}


?>