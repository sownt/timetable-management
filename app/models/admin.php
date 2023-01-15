<?php
class Admin
{
  public $id;
  public $login_id;
  public $password;
  public $activated_flag;
  public $reset_password_token;
  public $updated;
  public $created;

  function __construct($id, $login_id, $password, $activated_flag, $reset_password_token, $updated, $created)
  {
    $this->id = $id;
    $this->login_id = $login_id;
    $this->password = $password;
    $this->activated_flag = $activated_flag;
    $this->reset_password_token = $reset_password_token;
    $this->updated = $updated;
    $this->created = $created;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM admins');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Admin($item['id'], $item['login_id'], $item['password'], $item['activated_flag'], $item['reset_password_token'], $item['updated'], $item['created']);
    }

    return $list;
  }
}
