<?php
require_once('../App/config.php');

//ユーザー情報をリセット
unset($_SESSION['msg'], $_SESSION['user']);

session_destroy();

header('Location:./login.php');
exit();
