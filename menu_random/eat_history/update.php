<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

try {
    $db = new Menu();

    //日付が既に存在しているかチェック
    $list = $db->check_eat_list($_SESSION['user_id'], $_SESSION['eat_date']);

    if ($list == true) {
        $_SESSION['msg']['alert'] = 'この日は既に別のメニューを決定されていますが上書きしますか？';
        $button_message = '上書き';
    } else {
        unset($_SESSION['msg']);
        $_SESSION['msg']['alert'] = 'このメニューを登録しますか？';
        $button_message = '登録';
    }
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../../error.php');
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
    <title>上書き確認画面</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../eat_list/eat_history/index.php">夕食ガチャ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../eat_list/eat_history/index.php">食べたもの一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../menu/choice.php">メニュー提案</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../menulist/index.php">メニュー一覧</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['user'] ?>様
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../../account/edit.php">アカウント情報変更</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../users/logout.php">ログアウト</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="alert alert-primary" role="alert">
            <?php echo $_SESSION['msg']['alert'] ?>
        </div>
    </div>

    <?php if ($list == true) : ?>
        <div class="container mt-5">
            以前に決定済みのメニュー
            <table class="table table-striped table-hover">
                <th>日付</th>
                <th width="150">主菜</th>
                <th width="150">副菜</th>
                <th>合計摂取カロリー</th>

                <tr>
                    <td><?php echo $list['eat_date'] ?></td>
                    <td><?php echo $list['main_name'] ?></td>
                    <td><?php echo $list['sub_name'] ?></td>
                    <td>約<?php echo $list['total_kcal'] ?>kcal</td>
                </tr>
            </table>
        </div>
    <?php endif ?>

    <div class="container mt-5">
        今回決定したメニュー
        <table class="table table-striped table-hover">
            <th>日付</th>
            <th width="150">主菜</th>
            <th width="150">副菜</th>
            <th>合計摂取カロリー</th>

            <tr>
                <td><?php echo $_SESSION['eat_date'] ?></td>
                <td><?php echo $_SESSION['main_menu']['name'] ?></td>
                <td><?php echo $_SESSION['sub_menu']['name'] ?></td>
                <td>約<?php echo $_SESSION['total_kcal'] ?>kcal</td>
            </tr>
        </table>
    </div>

    <!-- ランダムでの登録処理と修正の登録処理を分岐させる -->
    <div class="container mt-5">
        <?php if (isset($_SESSION['flag']['choice']) && $_SESSION['flag']['choice'] == 'choice') : ?>
            <form action="./update_action.php" method="post">
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-outline-primary">戻る</a>
                <a href="./update_action.php" class="btn btn-primary"><?php echo $button_message ?></a>
            </form>
        <?php elseif (isset($_SESSION['flag']['edit']) && $_SESSION['flag']['edit'] == 'edit') : ?>
            <form action="./edit_update_action.php" method="post">
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-outline-primary">戻る</a>
                <a href="./edit_update_action.php" class="btn btn-primary"><?php echo $button_message ?></a>
            </form>
        <?php endif ?>
    </div>

</body>

</html>