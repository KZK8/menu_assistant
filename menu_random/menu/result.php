<?php

require_once('../../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

//アラート表示に使うための配列
$category = [0 => '和食', 1 => '洋食', 2 => '中華'];

//トータルカロリーの計算
$_SESSION['total_kcal'] = $_SESSION['main_menu']['kcal'] + $_SESSION['sub_menu']['kcal'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>結果画面</title>
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
                        <a class="nav-link active" href="./choice.php">メニュー提案</a>
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
            <?php echo $category[$_SESSION['category']] ?>のメニュー
        </div>
    </div>

    <div class="container my-4">
        <table class="table table-striped table-hover">
            <th width="150">日付</th>
            <th width="150">主菜</th>
            <th width="180">副菜</th>
            <th>合計摂取カロリー</th>

            <tr>
                <td><?php echo $_SESSION['eat_date'] ?></td>
                <td><?php echo $_SESSION['main_menu']['name'] ?></td>
                <td><?php echo $_SESSION['sub_menu']['name'] ?></td>
                <td>約<?php echo $_SESSION['total_kcal'] ?>kcal</td>
            </tr>
        </table>

        <a href="../eat_history/update.php" class="btn btn-primary">メニュー決定</a>
        <a href="./choice.php" class="btn btn-outline-primary">ジャンルを再選択</a>
        <a href="./choice_action.php" class="btn btn-success">再提案</a>
    </div>

</body>

</html>