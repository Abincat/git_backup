<?php

include("conn.php");

$memberID = json_decode(file_get_contents("php://input"), true);
$memberId = $memberID["userID"];

echo $memberId . '+';

$sql = " SELECT * FROM POST WHERE MENBER_ID = :memberId
	     UNION
	     SELECT * FROM POST WHERE MENBER_ID IN(SELECT FRIENDS_ID FROM FRINEDS WHERE MEMBER_ID = :memberId && FRIEND_STATUS = 1) && POST_STATUS = 1
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
