<?php

use App\Model\User;
use App\Util\Common;

require_once('../App/config.php');

$post = Common::sanitize($_POST);

if (!isset($post['token']) || !Common::isValidToken($post['token'])) {
    $_SESSION['msg']['error']  = '不正な処理が行われました。';
    header('Location: ../error.php');
    exit();
}

unset($_SESSION['msg']);

//名前の空白をチェック
if (Common::check_name($post['name']) == true) {
    unset($_SESSION['msg']['name']);
} else {
    $_SESSION['msg']['name'] = '名前が入力されていません。';
    $ng_flag = false;
}

//メールアドレスの形式をチェック
if (Common::check_email($post['email']) == true) {
    unset($_SESSION['msg']['email']);
} else {
    $_SESSION['msg']['email'] = 'メールアドレスが入力されていません。';
    $ng_flag = false;
}

//パスワード半角英数字8文字以上をチェック
if (Common::check_password($post['pass']) == true) {
    unset($_SESSION['msg']['pass']);
} else {
    $_SESSION['msg']['pass'] = 'パスワードは半角英数字の8文字以上でお願いします。';
    $ng_flag = false;
}

try {
    $db = new User();

    //すでにメールアドレスが登録されているかをチェック
    $list = $db->registered_check($post['email']);

    if ($list == true) {
        $_SESSION['msg']['email'] = 'このメールアドレスは既に登録されています。';
        header('Location:./register.php');
        exit();
    }

    //$ng_flagが存在して、なおかつfalseならリダイレクト
    if (isset($ng_flag) && $flag == false) {
        header('Location:./register.php');
        exit();
    }
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location: ../error.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>新規会員登録</title>
</head>

<body>
    <div class="container">
        <h1>新規会員登録</h1>
        <form action="./register_action.php" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">お名前</label>
                <?php echo $post['name'] ?>
                <input type="hidden" name="name" value="<?php echo $post['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email1" class="form-label">メールアドレス</label>
                <?php echo $post['email'] ?>
                <input type="hidden" name="email" value="<?php echo $post['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">パスワード</label>
                <?php echo $post['pass'] ?>
                <input type="hidden" name="pass" value="<?php echo $post['pass'] ?>">
            </div>

            <input type="button" value="戻る" onclick="history.back()" class="btn btn-outline-primary">
            <button type="submit" class="btn btn-primary">登録へ</button>
        </form>

    </div>
</body>

</html>