<?php
include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id = $req['id'];
$postId=$req['postId'];



$sql="INSERT INTO POST_LIKES(
    POST_ID,
    POST_MEMBER_LIKE)
    values
    (:postId,:id)";

$statement = $pdo->prepare($sql);
$statement -> bindValue(":id",$id);
$statement -> bindValue(":postId",$postId);


try {
    $statement->execute();
    echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}

?>