<?php
require_once('../App/config.php');

use App\Model\User;
use App\Util\Common;

$post = Common::sanitize($_POST);

if (!isset($post['token']) || !Common::isValidToken($post['token'])) {
    $_SESSION['msg']['error']  = '不正な処理が行われました。';
    header('Location: ../error.php');
    exit();
}

try {
    $db = new User();

    //ログインチェック
    $list = $db->check_user($post['email']);

    //メールアドレスが存在してなおかつ退会していないかどうか
    if ($list == true && $list['is_deleted'] == 0) {
        if (password_verify($post['pass'], $list['pass'])) {
            unset($_SESSION['msg']['error']);

            //名前とユーザーIDをセッションに保存
            $_SESSION['user'] = $list['name'];
            $_SESSION['user_id'] = $list['id'];
            $_SESSION['email'] = $list['email'];

            header('Location:../eat_list/eat_history/index.php');
            exit();
        } else {
            $_SESSION['msg']['error'] = 'メールアドレスまたはパスワードが違います';
            header('Location:./login.php');
            exit();
        }
    } else {
        $_SESSION['msg']['error'] = 'メールアドレスまたはパスワードが違います';
        header('Location:./login.php');
        exit();
    }
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location: ../error.php');
    exit();
}
