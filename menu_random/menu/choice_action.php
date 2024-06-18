<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

//メニュー提案ページから来た場合のみ$_SESSION['category']に値を入れる
if (!isset($_SESSION['category'])) {
    $_SESSION['category'] = $_POST['category'];
}

//2回目以降は日付データが空になるため
if (!isset($_SESSION['eat_date'])) {
    $_SESSION['eat_date'] = $_POST['eat_date'];
}

try {
    $db = new Menu();

    //ジャンルで主菜と副菜をランダムに決める
    $_SESSION['main_menu'] = $db->random_main($_SESSION['category']);
    $_SESSION['sub_menu'] = $db->random_sub($_SESSION['category']);

    //登録処理に必要なフラグ
    $_SESSION['flag']['choice'] = 'choice';

    header('Location:./result.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../../error.php');
    exit();
}
