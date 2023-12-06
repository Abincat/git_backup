<?php
// header("Access-Control-Allow-Origin: *"); // 允许所有源访问，也可以指定特定源
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // 允许的请求方法
// header("Access-Control-Allow-Headers: Content-Type"); // 允许的请求头
// // 前端轉來的json轉成php之中的物件
// // 請求的那個body
// // decode > 解碼
// // $member = json_decode(file_get_contents("php://input"),true);

// // $username = $member -> username;
// // $password = $member -> password;

// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "a7913154";
// $db_select = "KNOCKKNOCK";

// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";

// $pdo = new PDO($dsn, $db_user, $db_pass);
include("conn.php");
$sql = "SELECT * from QUESTION_CATEGORY";

$pstmt = $pdo -> prepare($sql);

$pstmt->execute();

$data = $pstmt -> fetchAll();

echo json_encode($data);

// foreach($data as $index => $row){
//   echo $row["QUESTION_CATEGORY_ID"];   //欄位名稱
//   echo $row["QUESTION_CATEGORY_NAME"];
//   echo " <br> ";
  
// }

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