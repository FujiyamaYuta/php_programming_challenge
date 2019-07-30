<?php
/**************************************************

**************************************************/

//ポストで送信を受けた時に取得できるパラメータ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ** クライアントからnumberのパラメーターをpostで受け取る
    $number = $_POST["number"];	
}

try{
	if (is_numeric($number)) {
		$result = 0;
		$num = (int)$number;
		for($i = 1; $i <= $num ; $i++) {
			$result += $i;
		}
		registMessage($result);
	}else {
		registMessage($number);
	}

} catch (PDOException $e) {
	registMessage("Error");
}finally{
}

// ** クライアントにメッセージをjsonのフォーマットで返す
function registMessage($message){
	$rs = array(
		"message" => $message
	);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($rs);
	exit ;
}

