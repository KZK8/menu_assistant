<?php
require_once('../App/config.php');

use App\Model\User;
use App\Util\Common;

$post = Common::sanitize($_POST);

try {
    $db = new User();
    //ユーザー情報を登録
    $db->register_user($post['email'], $post['pass'], $post['name']);

    unset($_SESSION['msg']);

    header('Location:./login.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../error.php');
    exit();
}
