<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

//念のため削除
unset($_SESSION['msg'], $_SESSION['flag']);

if (isset($_POST['category'])) {
    $_SESSION['category'] = $_POST['category'];
}

try {
    $db = new Menu();

    //修正するデータを取得
    $list = $db->eat_list_choice($_SESSION['user_id'], $_SESSION['eat_id'], $_SESSION['main_id'], $_SESSION['sub_id']);

    //同じジャンルの主食とメインのリストを取得
    $main_list = $db->category_main_menu_list($_SESSION['category']);
    $sub_list = $db->category_sub_menu_list($_SESSION['category']);

    $_SESSION['msg']['alert'] = '内容を修正してください';
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
    <title>修正画面</title>
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
                        <a class="nav-link active" href="../../menu_random/menu/choice.php">メニュー提案</a>
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

    <div class="container mt-5">
        <form action="./edit_action.php" method="post">
            <table class="table table-striped table-hover">
                <th width="150">日付</th>
                <th width="150">主菜</th>
                <th width="150">副菜</th>

                <tr>

                    <td><input type="date" name="eat_date" value="<?php echo $list['eat_date'] ?>"></td>
                    <td>
                        <select name="main">
                            <?php foreach ($main_list as $main_lists) : ?>
                                <option value="<?php echo $main_lists['id'] ?>" <?php if (isset($_SESSION['main_id']) &&  $main_lists['id'] == $_SESSION['main_id']) echo 'selected' ?>><?php echo $main_lists['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <td>
                        <select name="sub">
                            <?php foreach ($sub_list as $sub_lists) : ?>
                                <option value="<?php echo $sub_lists['id'] ?>" <?php if (isset($_SESSION['sub_id']) && $sub_lists['id'] == $_SESSION['sub_id']) echo 'selected' ?>><?php echo $sub_lists['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>

                </tr>
            </table>
            <input type="hidden" name="eat_id" value="<?php echo $_SESSION['eat_id'] ?>">
            <a href="./" class="btn btn-outline-primary">戻る</a>
            <input type="submit" class="btn btn-primary" value="内容確認へ">
        </form>
    </div>

</body>

</html>