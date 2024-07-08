<?php

namespace App\Util;

class Common
{
    /**
     * エスケープする
     *
     * @param array $before $_POSTの配列
     * @return array エスケープ後の配列
     */
    public static function sanitize($before)
    {
        $after = array();
        foreach ($before as $k => $v) {
            $after[$k] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
        }
        return $after;
    }

    /**
     * ワンタイムトークンを作成する
     *
     * @param string $tokenName トークンのキー
     * @return string $token 32文字のランダムな文字列 
     */
    public static function generateToken($tokenName = 'token')
    {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        $_SESSION[$tokenName] = $token;
        return $token;
    }

    /**
     * ワンタイムトークンをチェックする
     *
     * @param string $token 32文字のランダムな文字列 
     * @param string $tokenName トークンのキー
     * @return boolean 送られたトークンが一致するとき：true、送られたトークンが一致、存在しないとき：false
     */
    public static function isValidToken($token, $tokenName = 'token')
    {
        if (!isset($_SESSION[$tokenName]) || $_SESSION[$tokenName] !== $token) {
            return false;
        }
        return true;
    }

    /**
     * 名前に空文字、空白が含まれているかをチェックする
     *
     * @param string $name 名前
     * @return boolean 名前に空文字、空白が含まれていないとき：true、名前に空文字、空白が含まれているとき：false
     */
    public static function check_name($name)
    {
        if (!empty($name) && preg_match('/ {1,}/', $name) == 0 && preg_match('/　+/', $name) == 0) {
            return true;
        }
        return false;
    }


    /**
     * メールアドレスの形式をチェックする
     *
     * @param string $email メールアドレス
     * @return boolean example@xxx.xx形式のとき：true、example@xxx.xx形式ではないとき：false
     */
    public static function check_email($email)
    {
        if (preg_match('/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/', $email) == 1) {
            return true;
        }
        return false;
    }

    /**
     * パスワードが半角英数字8文字以上かをチェックする
     *
     * @param string $pass パスワード
     * @return boolean パスワードが半角英数字8文字以上のとき：true、パスワードが半角英数字8文字以上ではないとき：false
     */
    public static function check_password($pass)
    {
        if (preg_match('/^[a-zA-Z0-9]{8,}$/', $pass) == 1) {
            return true;
        }
        return false;
    }
}
