<?php

include("conn.php");

$searchData = json_decode(file_get_contents("php://input"), true);
$userId = $searchData["userId"];
$keyword = '%' . $searchData["keyword"] . '%';

$sqlSelect = "SELECT m1.MEMBER_ID,m2.FullName
              FROM MEMBER m1
	                JOIN (SELECT MEMBER_ID,concat(MEMBER_LAST_NAME,MEMBER_FIRST_NAME) as FullName FROM MEMBER)m2
	                ON m1.MEMBER_ID=m2.MEMBER_ID
              WHERE m2.FullName LIKE :keyword && m1.MEMBER_ID <> :userId";


$statement = $pdo->prepare($sqlSelect);
$statement->bindValue(":keyword", $keyword);
$statement->bindValue(":userId", $userId);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {

    foreach ($data as $key => $value) {

        $sqlSelect = "SELECT count(*) AS num FROM FRIENDS WHERE MEMBER_ID=:userId AND FRIEND_STATUS=1 AND FRIENDS_ID IN (SELECT FRIENDS_ID FROM FRIENDS WHERE MEMBER_ID=:resultId AND FRIEND_STATUS=1)";

        $statement = $pdo->prepare($sqlSelect);
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":resultId", $value["MEMBER_ID"]);
        $statement->execute();
        $result = $statement->fetchAll();

        $data[$key]["num"] = $result[0]["num"];

        // echo $value["num"];
    }

    foreach ($data as $key => $value) {

        $sqlSelect = "SELECT * FROM FRIENDS WHERE MEMBER_ID=:userId AND FRIENDS_ID=:resultId";

        $statement = $pdo->prepare($sqlSelect);
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":resultId", $value["MEMBER_ID"]);
        $statement->execute();
        $result = $statement->fetchAll();

        $data[$key]["friendStatus"] = $result[0]["FRIEND_STATUS"];
        $data[$key]["requestStatus"] = $result[0]["FRIENDS_REQUESTS_STATUS"];
    }

    // echo $data[0];

    echo json_encode($data);
    // echo COUNT($data);
} else {
    echo "0"; //無好友
}
