<?php

include("conn.php");

$userID = json_decode(file_get_contents("php://input"), true);
$id = $userID["userId"];

$sql = "SELECT f.*,concat(m.MEMBER_LAST_NAME,m.MEMBER_FIRST_NAME) as FullName
        FROM FRINEDS f
	        JOIN MEMBER m
            ON f.FRIENDS_ID = m.MEMBER_ID
        WHERE f.MEMBER_ID = :id AND f.FRIEND_STATUS = 2";

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);
$statement->execute();
$data = $statement->fetchAll();


if (COUNT($data) != 0) {

    foreach ($data as $key => $value) {

        $sqlSelect = "SELECT count(*) AS num FROM FRINEDS WHERE MEMBER_ID = :id AND FRIEND_STATUS=1 AND FRIENDS_ID IN (SELECT FRIENDS_ID FROM FRINEDS WHERE MEMBER_ID=:resultId AND FRIEND_STATUS=1)";

        $statement = $pdo->prepare($sqlSelect);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":resultId", $value["FRIENDS_ID"]);
        $statement->execute();
        $result = $statement->fetchAll();

        $data[$key]["num"] = $result[0]["num"];

        // echo $value["num"];
    }

    echo json_encode($data);
} else {
    echo "0"; //
}
