<?php

use App\Util\Common;

require_once('../App/config.php');

if (!isset($_SESSION['user'])) {
    header('Location:../../users/login.php');
    exit();
}

$token = Common::generateToken();

$_SESSION['alert'] = 'アカウント情報を変更される場合は情報を入力して確認へを押してください。';

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>アカウント情報変更画面</title>
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
                        <a class="nav-link" href="../menulist/index.php">メニュー一覧</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['user'] ?>様
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./edit.php">アカウント情報変更</a></li>
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

    <div class="container mt-4">
        <div class="alert alert-primary" role="alert">
            <?php echo $_SESSION['alert'] ?>
        </div>
    </div>

    <div class="container mt-5">
        <form action="./edit_confirm.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token ?>">



            <div class="mb-3">
                <label for="name" class="form-label">名前</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['user'] ?>">

                <?php if (isset($_SESSION['msg']['name'])) : ?>
                    <div class="text-danger">
                        <?php echo $_SESSION['msg']['name'] ?>
                    </div>
                <?php endif ?>

            </div>
            <div class="mb-3">
                <label for="email1" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>">

                <?php if (isset($_SESSION['msg']['email'])) : ?>
                    <div class="text-danger">
                        <?php echo $_SESSION['msg']['email'] ?>
                    </div>
                <?php endif ?>

            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">パスワード</label>
                <input type="password" name="pass" class="form-control" id="pass">

                <?php if (isset($_SESSION['msg']['pass'])) : ?>
                    <div class="text-danger">
                        <?php echo $_SESSION['msg']['pass'] ?>
                    </div>
                <?php endif ?>

            </div>
            <a href="./delete_confirm.php" class="btn btn-outline-danger">退会</a>
            <button type="submit" class="btn btn-primary">確認へ</button>
        </form>

    </div>

</body>

</html>