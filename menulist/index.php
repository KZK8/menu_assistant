<?php

use App\Model\Menu;

require_once('../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

$db = new Menu();

unset($_SESSION['msg'], $_SESSION['flag']);

try {
    if (isset($_GET['category']) && $_GET['category'] != Menu::ALL) {
        $main_list = $db->category_main_menu_list($_GET['category']);
        $sub_list = $db->category_sub_menu_list($_GET['category']);
    } else {
        //初期設定とすべての時
        $main_list = $db->main_menu_list();
        $sub_list = $db->sub_menu_list();
    }
} catch (Exception $e) {
    $_SESSION['msg']['error'] = '申し訳ございません。エラーが発生しました。';
    header('Location:../error.php');
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
    <title>メニュー一覧画面</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../eat_list/eat_history/index.php">夕食ガチャ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../eat_list/eat_history/index.php">食べたもの一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../menu_random/menu/choice.php">メニュー提案</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./">メニュー一覧</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['user'] ?>様
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../account/edit.php">アカウント情報変更</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../users/logout.php">ログアウト</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 d-flex justify-content-center">
        メニューの絞り込み
        <form action="./index.php" method="get">
            <select name="category">
                <option value="<?php echo Menu::ALL ?>" <?php if (isset($_GET['category']) && $_GET['category'] == Menu::ALL) echo 'selected' ?>>すべて</option>
                <option value="<?php echo Menu::WA ?>" <?php if (isset($_GET['category']) && $_GET['category'] == Menu::WA) echo 'selected' ?>>和食</option>
                <option value="<?php echo Menu::YOU ?>" <?php if (isset($_GET['category']) && $_GET['category'] == Menu::YOU) echo 'selected' ?>>洋食</option>
                <option value="<?php echo Menu::TYU ?>" <?php if (isset($_GET['category']) && $_GET['category'] == Menu::TYU) echo 'selected' ?>>中華</option>
            </select>
            <input type="submit" value="決定">
        </form>
    </div>

    <div class="container my-4 d-flex justify-content-center">
        <table>
            <tr>
                <td valign="top">
                    <table class="table table-striped table-hover">
                        <th>主菜料理名</th>
                        <th>カロリー</th>
                        <th>操作</th>

                        <?php foreach ($main_list as $main_lists) : ?>
                            <tr>
                                <td><?php echo $main_lists['name'] ?></td>
                                <td>約<?php echo $main_lists['kcal'] ?>kcal</td>
                                <td>
                                    <form action="./detail.php" method="post">
                                        <input type="hidden" name="main_id" value="<?php echo $main_lists['id'] ?>">
                                        <input type="hidden" name="list" value="list">
                                        <input type="submit" class="btn btn-outline-success" value="詳細">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </td>

                <td valign="top">
                    <table class="table table-striped table-hover">
                        <th>副菜料理名</th>
                        <th>カロリー</th>
                        <th>操作</th>

                        <?php foreach ($sub_list as $sub_lists) : ?>
                            <tr>
                                <td><?php echo $sub_lists['name'] ?></td>
                                <td>約<?php echo $sub_lists['kcal'] ?>kcal</td>
                                <td>
                                    <form action="./detail.php" method="post">
                                        <input type="hidden" name="sub_id" value="<?php echo $sub_lists['id'] ?>">
                                        <input type="hidden" name="list" value="list">
                                        <input type="submit" class="btn btn-outline-success" value="詳細">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>