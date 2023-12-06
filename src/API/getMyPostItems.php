<?php

include("conn.php");

$memberID = json_decode(file_get_contents("php://input"), true);
$memberId = $memberID["userID"];

$sql = "SELECT p.*,m.MEMBER_FIRST_NAME,m.MEMBER_LAST_NAME,MEMBER_PIC
        FROM(SELECT * FROM POST WHERE MENBER_ID = :memberId) p
        JOIN MEMBER m
	    on p.MENBER_ID=m.MEMBER_ID
        ORDER BY POST_CREATETIME DESC";


$statement = $pdo->prepare($sql);
$statement->bindValue(":memberId", $memberId);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    echo json_encode($data);
    // echo COUNT($data);
} else {
    echo "0"; //失敗
}
