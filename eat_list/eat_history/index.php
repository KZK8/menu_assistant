<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

//念のため削除
unset($_SESSION['msg'],$_SESSION['flag']);

try {
    $db = new Menu();

    //食べたもの一覧を取得
    $list = $db->eat_list($_SESSION['user_id']);
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
    <title>トップページ</title>
    <style>
        form {
            display: inline-block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">夕食ガチャ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">食べたもの一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../menu_random/menu/choice.php">メニュー提案</a>
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

    <div class="container my-4">
        <table class="table table-striped table-hover">
            <th>日付</th>
            <th>主菜</th>
            <th></th>
            <th>副菜</th>
            <th></th>
            <th>合計摂取カロリー</th>
            <th></th>

            <?php foreach ($list as $lists) : ?>
                <tr>
                    <td><?php echo $lists['eat_date'] ?></td>
                    <td><?php echo $lists['main_name'] ?></td>
                    <td>
                        <form action="../../menulist/detail.php" method="post">
                            <input type="hidden" name="main_id" value="<?php echo $lists['main_id'] ?>">
                            <input type="hidden" name="top" value="top">
                            <input type="submit" class="btn btn-outline-success" value="詳細">
                        </form>
                    </td>
                    <td><?php echo $lists['sub_name'] ?></td>
                    <td>
                        <form action="../../menulist/detail.php" method="post">
                            <input type="hidden" name="sub_id" value="<?php echo $lists['sub_id'] ?>">
                            <input type="hidden" name="top" value="top">
                            <input type="submit" class="btn btn-outline-success" value="詳細">
                        </form>
                    </td>
                    <td>約<?php echo $lists['total_kcal'] ?>kcal</td>
                    <td>
                        <form action="./category_edit.php" method="post">
                            <input type="hidden" name="eat_id" value="<?php echo $lists['eat_id'] ?>">
                            <input type="hidden" name="eat_date" value="<?php echo $lists['eat_date'] ?>">
                            <input type="hidden" name="category" value="<?php echo $lists['category'] ?>">
                            <input type="hidden" name="main_id" value="<?php echo $lists['main_id'] ?>">
                            <input type="hidden" name="sub_id" value="<?php echo $lists['sub_id'] ?>">
                            <input type="submit" class="btn btn-outline-primary" value="修正">
                        </form>

                        <form action="../../eat_list/eat_history/delete.php" method="post">
                            <input type="hidden" name="eat_id" value="<?php echo $lists['eat_id'] ?>">
                            <input type="hidden" name="main_id" value="<?php echo $lists['main_id'] ?>">
                            <input type="hidden" name="sub_id" value="<?php echo $lists['sub_id'] ?>">
                            <input type="submit" class="btn btn-outline-danger" value="削除">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>

        </table>

    </div>
</body>

</html>