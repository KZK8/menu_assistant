<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

try {
    $db = new Menu();

    //主食と副菜のIDからそのメニュー情報を取得
    $_SESSION['main_menu'] = $db->main_menu_detail($_POST['main']);
    $_SESSION['sub_menu'] = $db->sub_menu_detail($_POST['sub']);

    //合計摂取カロリーを計算
    $_SESSION['total_kcal'] = $_SESSION['main_menu']['kcal'] + $_SESSION['sub_menu']['kcal'];

    //修正前と同じ日付ならフラグを作成、別の日付ならセッションへ保存
    if ($_SESSION['eat_date'] == $_POST['eat_date']) {
        $_SESSION['equal_date'] = 'equal_date';
    } else {
        $_SESSION['eat_date'] = $_POST['eat_date'];
    }

    //登録時のフラグ
    $_SESSION['flag']['edit'] = 'edit';

    header('Location:../../menu_random/eat_history/update.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    var_dump($e);
    header('Location:../../error.php');
    exit();
}
