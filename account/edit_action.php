<?php
require_once('../App/config.php');

use App\Model\User;
use App\Util\Common;

$post = Common::sanitize($_POST);

try {
    $db = new User();
    //ユーザー情報を登録
    $db->update_user($_SESSION['user_id'], $post['email'], $post['pass'], $post['name']);

    //セッションにユーザー名とメールアドレスを入れる
    $_SESSION['user'] = $post['name'];
    $_SESSION['email'] = $post['email'];

    header('Location:../eat_list/eat_history/index.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../error.php');
    exit();
}
