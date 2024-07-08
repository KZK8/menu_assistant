<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

unset($_SESSION['flag']);

try {
    $db = new Menu();

    //その日すでにメニューが決定済みかをチェック
    $list = $db->check_eat_list($_SESSION['user_id'], $_SESSION['eat_date']);

    if ($list == true && !isset($_SESSION['equal_date'])) {
        //上書きする場合のみ先に入力済みのデータを削除する
        $db->delete_eat_list($list['eat_id']);
        $db->edit_eat_list($_SESSION['main_menu']['id'], $_SESSION['sub_menu']['id'], $_SESSION['total_kcal'], $_SESSION['category'], $_SESSION['eat_date'], $_SESSION['eat_id']);
    } else {
        $db->edit_eat_list($_SESSION['main_menu']['id'], $_SESSION['sub_menu']['id'], $_SESSION['total_kcal'], $_SESSION['category'], $_SESSION['eat_date'], $_SESSION['eat_id']);
    }

    if (isset($_SESSION['equal_date'])) {
        unset($_SESSION['equal_date']);
    }

    header('Location:../../eat_list/eat_history/index.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../../error.php');
    exit();
}
