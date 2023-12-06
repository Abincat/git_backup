<?php

// include("conn.php");

// $req = json_decode(file_get_contents("php://input"), true);
// $id = $req['id'];
// $selectedData = $req['selectedData'];

// foreach ($selectedData as $level => $items) {
//     foreach ($items as $item) {
//         $collectionId = $item['COLLECTION_ID'];
//         $selectedValue = $item['MEMBER_COLLECTION_SELECTED'];

//         $sql = "UPDATE member_collection SET MEMBER_COLLECTION_SELECTED = :selectedValue
//                 WHERE MEMBER_ID = :id AND COLLECTION_ID = :collectionId";

//         $statement = $pdo->prepare($sql);
//         $statement->bindValue(":id", $id);
//         $statement->bindValue(":collectionId", $collectionId);
//         $statement->bindValue(":selectedValue", $selectedValue);
//         $statement->execute();
//     }
// }

// echo json_encode(["success" => true]);

include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id=$req['id'];
$collectionID = $req['collectionID'];
$collectionIDs = $req['collectionIDs'];

try {
    $pdo->beginTransaction();

    // 先將同一 MEMBER_ID 的其他 MEMBER_COLLECTION_SELECTED 更新為 0
    $updateOtherCollectionsSQL = "UPDATE member_collection
                                  SET MEMBER_COLLECTION_SELECTED = 0
                                  WHERE MEMBER_ID = :id";
    $updateOtherCollectionsStatement = $pdo->prepare($updateOtherCollectionsSQL);
    $updateOtherCollectionsStatement->bindValue(":id", $id);
    $updateOtherCollectionsStatement->execute();

    // 再將所有指定的 COLLECTION_ID 更新為 1
    $updateSelectedCollectionSQL = "UPDATE member_collection
                                    SET MEMBER_COLLECTION_SELECTED = 1
                                    WHERE MEMBER_ID = :id AND COLLECTION_ID IN (" . implode(",", $collectionIDs) . ")";
    $updateSelectedCollectionStatement = $pdo->prepare($updateSelectedCollectionSQL);
    $updateSelectedCollectionStatement->bindValue(":id", $id);
    $updateSelectedCollectionStatement->execute();

    $pdo->commit();
    echo json_encode(["success" => true], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(["success" => false, "error" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
?>
