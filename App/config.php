<?php

//各ファイルでセッションをスタートするため
session_start();
session_regenerate_id(true);

/**
 * クラスの自動読み込みをする
 */
spl_autoload_register(function ($class) {
    //ディレクトリまでの絶対パス/ファイル名.phpの文字列にする
    $file = sprintf(__DIR__ . '/%s.php', $class);
    //'App/App'を'App'に変換
    $file = str_replace('App/App', 'App', $file);
    //'\'を'/'に変換
    $file = str_replace('\\', '/', $file);

    if (file_exists($file)) {
        //ファイイルがあれば読み込む
        require($file);

    } else {
        //ファイルがなければエラー表示
        echo 'File not found: ' . $file;
        exit();
    }
});
