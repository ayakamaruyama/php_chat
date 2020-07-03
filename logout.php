<?php
require_once "./init.php";
$_SESSION = [];
//  クッキーの削除
if (ini_get("session.use_cookies")) {
  setcookie(session_name(), '', time() - 42000);
}
// セッションの削除
session_destroy();
header('location: login.php');
exit();

