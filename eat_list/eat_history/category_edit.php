<?php

use App\Model\Menu;

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

//念のため削除
unset($_SESSION['msg'], $_SESSION['flag']);

//セッションに保存
$_SESSION['eat_id'] = $_POST['eat_id'];
$_SESSION['eat_date'] = $_POST['eat_date'];
$_SESSION['main_id'] = $_POST['main_id'];
$_SESSION['sub_id'] = $_POST['sub_id'];
$_SESSION['old_category'] = $_POST['category'];

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

    <div class="container my-4">
        <div class="alert alert-primary" role="alert">
            ジャンルを修正してください
        </div>
    </div>

    <div class="container">
        <form action="./edit.php" method="post">
            <input type="radio" name="category" value="<?php echo Menu::WA ?>" id="wa" <?php if ($_POST['category'] == Menu::WA) echo 'checked' ?>>
            <label for="wa">和食</label>
            <input type="radio" name="category" value="<?php echo Menu::YOU ?>" id="you" <?php if ($_POST['category'] == Menu::YOU) echo 'checked' ?>>
            <label for="you">洋食</label>
            <input type="radio" name="category" value="<?php echo Menu::TYU ?>" id="tyu" <?php if ($_POST['category'] == Menu::TYU) echo 'checked' ?>>
            <label for="tyu">中華</label>
    </div>
    <div class="container mt-4">
        <a href="../../eat_list/eat_history/index.php" class="btn btn-outline-primary">戻る</a>
        <input type="submit" class="btn btn-primary" value="次へ">
        </form>
    </div>

</body>

</html>