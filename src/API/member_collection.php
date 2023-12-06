<?php

include("conn.php");

$req = json_decode(file_get_contents("php://input"), true);
$id = $req['id'];

$sql = "SELECT * FROM member_collection t1
        JOIN collection t2 ON t1.COLLECTION_ID = t2.COLLECTION_ID
        WHERE MEMBER_ID = :id AND (t2.COLLECTION_LEVEL = 'SSR' OR t2.COLLECTION_LEVEL = 'SR' OR t2.COLLECTION_LEVEL = 'R' OR t2.COLLECTION_LEVEL = 'N') AND t2.COLLECTION_ID != 16";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// 多筆資料，由迴圈解碼全部 base64 圖片
// foreach ($data as &$item) {
//     $item['COLLECTION_IMAGE'] = base64_decode($item['COLLECTION_IMAGE']);
// }

foreach ($data as &$item) {
    $item['COLLECTION_IMAGE'] = base64_decode($item['COLLECTION_IMAGE']);
    $item['COLLECTION_ID'] = $item['COLLECTION_ID']; // 將 COLLECTION_ID 加入回傳數據
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>

