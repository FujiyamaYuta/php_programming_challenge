<?php
/**************************************************

**************************************************/

//ポストで送信を受けた時に取得できるパラメータ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ** クライアントからnumberのパラメーターをpostで受け取る
    $number = $_POST["number"];	
}

try{

	$str = "";
	for ($i=0; $i<5; $i++) {
		$num = rand(0, 1);
		if($num == 0){
			$str.="ズン";
		}else {
			$str.="ドコ";
		}
	}

	registMessage($str);

} catch (PDOException $e) {
	registMessage("NotTable");
}finally{
}

// ** クライアントにメッセージをjsonのフォーマットで返す
function registMessage($message){
	$rs = array(
		"zundoko" => $message
	);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($rs);
	exit ;
}

