<?php
  // ログイン済みチェック 付け加えたコードです
  if (!isset($_SESSION["user"]["name"])) {
    header('location: login.php');
    exit();
  }
	if(empty($_POST["message"]["message"])){
		header('location: index.php');
		exit();
		//mb_strlen()関数で$_POSTのmessageの文字数に変換してる
	}elseif(mb_strlen($_POST["message"]["message"]) < 5 || mb_strlen($_POST["message"]["message"]) > 140){
		header('location: index.php');
		exit();
	}else {
		//index.phpのformから送られてきたPOSTを$msgに代入
		$msg = $_POST["message"];
		//(object)で$msgの配列をObject型に変換してる
		$new_chat = (object)$msg;
		//chat.jsonを文字列をとして開いて、phpの変数に変換して$messagesに代入
		$path ="./chat.json";
		$messages = json_decode(file_get_contents($path));
		//arry_push()関数を使用して$messages配列に$new_chatを追加する
		array_push($messages, $new_chat);
		//json_encodeでJSONを文字列に変換して、$messagesに再代入してる
		$messages = json_encode($messages);
		//file_put_contents()関数で$pathを開いて、$messagesを上書きしてる
		file_put_contents($path, $messages);
		//index.phpへ移動する
		header('location:index.php');
		//リダイレクトするように書いたら必ず記述
		exit();
	}
?>

























