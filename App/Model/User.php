<?php

namespace App\Model;

class User extends Base
{
    /**
     * Baseのデータベース接続をコンストラクタする
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 既に同じメールアドレスがユーザー登録されていないかのチェックする
     *
     * @param string $email メールアドレス
     * @return boolean 同じメールアドレスが存在するとき：true、同じメールアドレスが存在しないとき：false
     */
    public function registered_check($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * ユーザー情報をデータベースに登録する
     *
     * @param string $email メールアドレス
     * @param string $pass パスワード
     * @param string $name ユーザー名
     * @return void
     */
    public function register_user($email, $pass, $name)
    {
        $sql = 'INSERT INTO users (email,pass,name) VALUES (:email,:pass,:name)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * ログインチェックをする
     *
     * @param string $email メールアドレス
     * @return boolean メールアドレスが存在するとき：true、メールアドレスが存在しないとき：false
     */
    public function check_user($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 退会処理をする
     *
     * @param int $id ユーザーID
     * @return void
     */
    public function delete_user($id)
    {
        $sql = 'UPDATE users SET is_deleted = 1 WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * 変更したアカウント情報を修正する
     *
     * @param int $user_id ユーザーI
     * @param string $email メールアドレス
     * @param string $pass パスワード
     * @param string $name ユーザー名
     * @return void
     */
    public function update_user($user_id, $email, $pass, $name)
    {
        $sql = 'UPDATE users SET email = :email, pass = :pass, name = :name WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $user_id, \PDO::PARAM_INT);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
    }
}
