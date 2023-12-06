<?php

// include("conn.php");

// $req = json_decode(file_get_contents("php://input"),true);

// $sql="SELECT * FROM
// REGISTER t1
// join ACTIVITY t2
// on t1.ACTIVITY_ID = t2.ACTIVITY_ID";

// $statement = $pdo->prepare($sql);
// $statement -> execute();
// $data = $statement -> fetchAll(PDO::FETCH_ASSOC);


// if($data){
//     $data[0]['ACTIVITY_IMAGE']=base64_decode($data[0]['ACTIVITY_IMAGE']);
// }

// echo json_encode($data,JSON_UNESCAPED_UNICODE);

include("conn.php");

$req = json_decode(file_get_contents("php://input"), true);
$id = $req['id'];

$sql = "SELECT ACTIVITY_NAME,ACTIVITY_DATE FROM
        REGISTER t1
        JOIN ACTIVITY t2 ON t1.ACTIVITY_ID = t2.ACTIVITY_ID
        WHERE MEMBER_ID = :id
        AND ACTIVITY_DATE > NOW()
        ORDER BY ABS(DATEDIFF(ACTIVITY_DATE, NOW()))
        LIMIT 1";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// if ($data) {
//     $data[0]['ACTIVITY_IMAGE'] = base64_decode($data[0]['ACTIVITY_IMAGE']);
// }

echo json_encode($data, JSON_UNESCAPED_UNICODE);



?>