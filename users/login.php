<?php
require_once('../App/config.php');

use App\Util\Common;

$token = Common::generateToken();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>ログイン</title>
</head>

<body>
    <div class="container">
        <h1>ログイン</h1>
        <form action="./login_action.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <?php if (isset($_SESSION['msg']['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['msg']['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="mb-3">
                <label for="email1" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php if (isset($_SESSION['email'])) $_SESSION['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">パスワード</label>
                <input type="password" name="pass" class="form-control" id="pass" value="<?php if (isset($_SESSION['pass'])) $_SESSION['pass'] ?>">
            </div>
            <a href="./register.php" class="btn btn-outline-primary">新規会員登録</a>
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>

    </div>
</body>

</html>