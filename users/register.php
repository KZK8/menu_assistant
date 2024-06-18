<?php
require_once('../App/config.php');

use App\Util\Common;

//トークン生成
$token = Common::generateToken();

unset($_SESSION['msg']['error']);
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

        <?php if (isset($_SESSION['msg']['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg']['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <form action="./register_confirm.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <div class="mb-3">
                <label for="name" class="form-label">お名前</label>
                <input type="text" name="name" class="form-control" id="name" size="1px">

                <?php if (isset($_SESSION['msg']['name'])) : ?>
                    <div class="text-danger">
                        <?php echo $_SESSION['msg']['name'] ?>
                    </div>
                <?php endif ?>

            </div>
            <div class="mb-3">
                <label for="email1" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="email">

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

            <button type="submit" class="btn btn-primary">確認へ</button>
        </form>

    </div>
</body>

</html>