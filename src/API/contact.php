<?php
// header("Access-Control-Allow-Origin: *"); // 允许所有源访问，也可以指定特定源
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // 允许的请求方法
// header("Access-Control-Allow-Headers: Content-Type"); // 允许的请求头
// // decode > 解碼
// $member = json_decode(file_get_contents("php://input"),true);

// // $username = $member -> username;
// // $password = $member -> password;
// $purpose = $member["purpose"];
// $content = $member["content"];

// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "a7913154";
// $db_select = "KNOCKKNOCK";

// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

// $pdo = new PDO($dsn, $db_user, $db_pass); // INSERT INTO 跟 VALUES 要在新增 (CONTACT_ID)
include("conn.php");
$sql = "INSERT INTO CONTACT (CONTACT_ID,CONTACT_CONTACT, CONTACT_TITLE, CONTACT_MEMBER_ID, CONTACT_CREATETIME, CONTACT_REPLY_CONTENT, CONTACT_REPLIED) VALUES (CONTACT_ID,:content, :purpose, '1', NOW(), '', '0')";

$pstmt = $pdo -> prepare($sql);
$pstmt -> bindvalue(":purpose",$purpose);
$pstmt -> bindvalue(":content",$content);

$pstmt->execute();

// $memberList = $pstmt -> fetchAll();

// // if(count($memberList)!=0){
// //     echo "success";
// // }else{
// //     echo "false";
// // }

// if(count($memberList)!=0){

//     $respBody["success"] = true;
//     $respBody["message"] = "登入成功";
//     $respBody["nickname"] = $memberList[0]["NICKNAME"];

// }else{
//     $respBody["success"] = false;
//     $respBody["message"] = "登入失敗";

// }

// echo json_encode($respBody)

// // if($username == "wen1234" && $password == "password" ){
// //     echo "success";
    
// // }else{
// //     echo "error";
// // }

?>