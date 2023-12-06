<?php

include("conn.php");

$memberID = json_decode(file_get_contents("php://input"), true);
$memberId = $memberID["userID"];

$sql = "SELECT p.*,m.MEMBER_FIRST_NAME,m.MEMBER_LAST_NAME,MEMBER_PIC
        FROM(SELECT * FROM POST WHERE MEMBER_ID = :memberId
	        UNION
            SELECT * FROM POST WHERE POST_STATUS = 0 
            UNION
	        SELECT * FROM POST WHERE MEMBER_ID IN(SELECT FRIENDS_ID FROM FRIENDS WHERE MEMBER_ID = :memberId && FRIEND_STATUS = 1) && POST_STATUS = 1) p
        JOIN MEMBER m
	    on p.MEMBER_ID=m.MEMBER_ID
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
