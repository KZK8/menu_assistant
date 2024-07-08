<?php

use App\Model\User;

require_once('../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

try {
    $db = new User();

    //ユーザー情報を疑似削除
    $db->delete_user($_SESSION['user_id']);

    header('Location:../users/logout.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../../error.php');
    exit();
}
