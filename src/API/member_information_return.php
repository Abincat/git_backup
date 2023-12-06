<?php
include("conn.php");

$req = json_decode(file_get_contents("php://input"),true);
$id = $req['id'];
$firstName = $req['first_Name'];
$lastName = $req['last_Name'];
$tel= $req['tel'];
$gender= $req['gender'];
$constellation= $req['constellation'];
$job= $req['job'];
$city= $req['city'];
$hobbyA= $req['hobbyA'];
$hobbyB= $req['hobbyB'];
$SelfIntroduction= $req['SelfIntroduction'];
$faceImageChange = $req['faceImageChange'];
$hairImageChange = $req['hairImageChange'];
$clothImageChange= $req['clothImageChange'];
$accessoriesImageChange= $req['accessoriesImageChange'];



$sql="UPDATE MEMBER SET
    MEMBER_FIRST_NAME = :first_Name,
    MEMBER_LAST_NAME = :last_Name,
    MEMBER_PHONE = :tel,
    MEMBER_GENDER = :gender,
    MEMBER_CONSTELLATION = :constellation,
    MEMBER_JOB = :job,
    MEMBER_CITY = :city,
    MEMBER_HOBBY_TEXT_A = :hobbyA,
    MEMBER_HOBBY_TEXT_B = :hobbyB,
    MEMBER_INTRODUCE = :SelfIntroduction,
    MEMBER_AVATAR_FACE = :faceImageChange,
    MEMBER_AVATAR_HAIR = :hairImageChange,
    MEMBER_AVATAR_CLOTH=:clothImageChange,
    MEMBER_AVATAR_ACCESSORIES=:accessoriesImageChange
    WHERE MEMBER_ID = :id";

$statement = $pdo->prepare($sql);
$statement -> bindValue(":id",$id);
$statement -> bindValue(":first_Name",$firstName);
$statement -> bindValue(":last_Name",$lastName);
$statement -> bindValue(":tel",$tel);
$statement -> bindValue(":gender",$gender);
$statement -> bindValue(":constellation",$constellation);
$statement -> bindValue(":job",$job);
$statement -> bindValue(":city",$city);
$statement -> bindValue(":hobbyA",$hobbyA);
$statement -> bindValue(":hobbyB",$hobbyB);
$statement -> bindValue(":SelfIntroduction",$SelfIntroduction);
$statement -> bindValue(":faceImageChange",$faceImageChange);
$statement -> bindValue(":hairImageChange",$hairImageChange);
$statement -> bindValue(":clothImageChange",$clothImageChange);
$statement -> bindValue(":accessoriesImageChange",$accessoriesImageChange);

try {
    $statement->execute();
    echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}

?>