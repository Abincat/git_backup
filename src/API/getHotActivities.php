<?php

include("conn.php");

$sql = "SELECT * FROM ACTIVITY order by ACTIVITY_REMAINING_PLACES";


$statement = $pdo->prepare($sql);
$statement->execute();
$data = $statement->fetchAll();

if (COUNT($data) != 0) {
    echo json_encode($data);
    // echo COUNT($data);
} else {
    echo "0"; //失敗
}
