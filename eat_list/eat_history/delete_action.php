<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

try {
    $db = new Menu();

    //食べたデータを削除
    $list = $db->delete_eat_list($_POST['eat_id']);

    header('Location:../../eat_list/eat_history/index.php');
    exit();
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../../error.php');
    exit();
}
