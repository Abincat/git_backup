<?php

include("conn.php");

$req = json_decode(file_get_contents("php://input"), true);
$sql = "SELECT * 
        FROM MEMBER t1
        JOIN POST t2 ON t1.MEMBER_ID = t2.MEMBER_ID
        ORDER BY RAND() LIMIT 1";

$statement = $pdo->prepare($sql);
$statement->execute();
$data1 = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($data1) {
    $memberId = $data1[0]['MEMBER_ID'];
    $sql = "SELECT * 
            FROM POST t3
            JOIN POST_IMAGE t4 ON t3.POST_ID = t4.POST_ID
            WHERE t3.MEMBER_ID = :memberId
            ORDER BY RAND() LIMIT 1";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':memberId', $memberId, PDO::PARAM_INT);
    $statement->execute();
    $data2 = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($data2) {
        $data2[0]['POST_IMAGE'] = base64_decode($data2[0]['POST_IMAGE']);
    }
}

// 將兩個查詢的資料合併到一個回應數組中
$response = array(
    "firstQuery" => $data1,
    "secondQuery" => $data2
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>