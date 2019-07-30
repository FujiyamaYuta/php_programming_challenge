<?php
/**************************************************

**************************************************/

//ポストで送信を受けた時に取得できるパラメータ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ** クライアントからnumberのパラメーターをpostで受け取る
    // $number = $_POST["number"];	
}

try{
	$json = file_get_contents("https://jsonplaceholder.typicode.com/posts");
	registMessage($json);
} catch (PDOException $e) {
	registMessage("ERROR");
}finally{
}

// ** クライアントにメッセージをjsonのフォーマットで返す
function registMessage($message){
	header('Content-Type: application/json; charset=utf-8');
	echo $message;
	exit ;
}

