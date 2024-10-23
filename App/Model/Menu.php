<?php

namespace App\Model;

class Menu extends Base
{
    /**
     * ジャンルの定義
     * 
     * WA = 和食
     * YOU = 洋食
     * TYU = 中華
     * ALL = すべて
     */
    const WA = 0;
    const YOU = 1;
    const TYU = 2;
    const ALL = 3;

    /**
     * Baseのデータベース接続をコンストラクタする
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *ユーザー毎の食べたものの一覧を取得する 
     *
     * @param int $user_id ユーザーID
     * @return array 食べたもの履歴の配列
     */
    public function eat_list($user_id)
    {
        $sql = 'SELECT eat_history.id AS eat_id, eat_history.eat_date, eat_history.category AS category, eat_history.total_kcal, main.name AS main_name, sub.name AS sub_name, main.id AS main_id, sub.id AS sub_id FROM eat_history JOIN main ON eat_history.main_id = main.id JOIN sub ON eat_history.sub_id = sub.id JOIN users ON eat_history.user_id = users.id WHERE user_id = :user_id AND eat_history.is_deleted = 0 ORDER BY eat_date DESC';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     *ランダム関数を使って主菜を取得する 
     *
     * @param int $category ジャンル
     * @return array 主菜の情報の配列
     */
    public function random_main($category)
    {
        $sql = 'SELECT * FROM main WHERE category = ' . $category . '';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $count = count($list);
        $rand_int = rand(0, $count - 1);

        return $list[$rand_int];
    }

    /**
     *ランダム関数を使って副菜を取得する 
     *
     * @param int $category ジャンル
     * @return array 副菜の情報の配列
     */
    public function random_sub($category)
    {
        $sql = 'SELECT * FROM sub WHERE category = ' . $category . '';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $count = count($list);
        $rand_int = rand(0, $count - 1);

        return $list[$rand_int];
    }

    /**
     * 既にその日のメニューが決定しているかをチェックする
     *
     * @param int $user_id ユーザーID
     * @param string $eat_date　食べた日付
     * @return boolean 同じ日付が存在するとき：true、同じ日付が存在しないとき：false
     */
    public function check_eat_list($user_id, $eat_date)
    {
        date_default_timezone_set('Asia/Tokyo');
        $sql = 'SELECT eat_history.id AS eat_id, eat_date, main.name AS main_name, sub.name AS sub_name ,eat_history.total_kcal FROM eat_history JOIN main ON eat_history.main_id = main.id JOIN sub ON eat_history.sub_id = sub.id WHERE user_id = :user_id AND eat_date = :eat_date AND eat_history.is_deleted = 0';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->bindValue(':eat_date', $eat_date, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 決定したメニューを食べたもの一覧に登録する
     *
     * @param int $user_id ユーザーID
     * @param int $main_id 主菜ID
     * @param int $sub_id 副菜ID
     * @param int $total_kcal トータルカロリー
     * @param int $category ジャンル
     * @param string $eat_date 食べた日付
     * @return void
     */
    public function register_eat_list($user_id, $main_id, $sub_id, $total_kcal, $category, $eat_date)
    {
        $sql = "INSERT INTO eat_history(user_id, main_id, sub_id, total_kcal, category, eat_date) VALUES ($user_id,$main_id,$sub_id,$total_kcal,$category,:eat_date)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':eat_date', $eat_date, \PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * 削除、修正する食べたもののデータを選択する
     *
     * @param int $user_id ユーザーID
     * @param int $eat_id 食べたもの一覧のID
     * @param int $main_id 主菜ID
     * @param int $sub_id 副菜ID
     * @return void
     */
    public function eat_list_choice($user_id, $eat_id, $main_id, $sub_id)
    {
        $sql = 'SELECT eat_history.eat_date, eat_history.total_kcal, main.name AS main_name, sub.name AS sub_name FROM eat_history,main,sub,users WHERE user_id = :user_id AND eat_history.is_deleted = 0 AND eat_history.id = :eat_history_id AND main.id = :main_id AND sub.id = :sub_id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->bindValue(':eat_history_id', $eat_id, \PDO::PARAM_STR);
        $stmt->bindValue(':main_id', $main_id, \PDO::PARAM_STR);
        $stmt->bindValue(':sub_id', $sub_id, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 食べたものリストから削除する
     *
     * @param int $eat_id 食べたもの一覧のID
     * @return void
     */
    public function delete_eat_list($eat_id)
    {
        $sql = 'UPDATE eat_history SET is_deleted = 1 WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $eat_id, \PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * 主菜メニューの一覧を取得する
     *
     * @return array 主菜メニューの配列
     */
    public function main_menu_list()
    {
        $sql = 'SELECT * FROM main ORDER BY category ASC';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 副菜メニューの一覧を取得する
     *
     * @return array 副菜メニューの配列
     */
    public function sub_menu_list()
    {
        $sql = 'SELECT * FROM sub ORDER BY category ASC';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * ジャンル別主菜メニューの一覧を取得する
     *
     * @param int $category ジャンル
     * @return array ジャンル別の主菜メニューの配列
     */
    public function category_main_menu_list($category)
    {
        $sql = 'SELECT * FROM main WHERE category = ' . $category . ' ORDER BY name ASC';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * ジャンル別副菜メニューの一覧を取得する
     *
     * @param int $category ジャンル
     * @return array ジャンル別の副菜メニューの配列
     */
    public function category_sub_menu_list($category)
    {
        //ジャンル別副菜メニューの一覧
        $sql = 'SELECT * FROM sub WHERE category = ' . $category . ' ORDER BY name ASC';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 主菜メニューの詳細を取得する
     *
     * @param int $main_id 主菜ID
     * @return array 主菜メニュー詳細の配列
     */
    public function main_menu_detail($main_id)
    {
        $sql = 'SELECT * FROM main WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $main_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 副菜メニューの詳細を取得する
     *
     * @param int $sub_id 副菜ID
     * @return array 副菜メニュー詳細の配列
     */
    public function sub_menu_detail($sub_id)
    {
        $sql = 'SELECT * FROM sub WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $sub_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 新たなメニューを食べたもの一覧に上書き修正する
     *
     * @param int $main_id 主菜ID
     * @param int $sub_id 副菜ID
     * @param int $total_kcal トータルカロリー
     * @param int $category ジャンル
     * @param string $eat_date 食べた日付
     * @param int $eat_id 食べたもの一覧のID
     * @return void
     */
    public function edit_eat_list($main_id, $sub_id, $total_kcal, $category, $eat_date, $eat_id)
    {
        $sql = "UPDATE eat_history SET main_id = :main_id, sub_id = :sub_id, total_kcal = :total_kcal, category =:category, eat_date = :eat_date  WHERE id = :eat_id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':main_id', $main_id, \PDO::PARAM_INT);
        $stmt->bindValue(':sub_id', $sub_id, \PDO::PARAM_INT);
        $stmt->bindValue(':total_kcal', $total_kcal, \PDO::PARAM_INT);
        $stmt->bindValue(':category', $category, \PDO::PARAM_INT);
        $stmt->bindValue(':eat_date', $eat_date, \PDO::PARAM_STR);
        $stmt->bindValue(':eat_id', $eat_id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
