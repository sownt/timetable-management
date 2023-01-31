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

  static function login($login_id, $password)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM admins WHERE login_id = :login_id AND password = :password');
    $req->execute(array('login_id' => $login_id, 'password' => $password));
    $item = $req->fetch();

    if (isset($item['id'])) {
      return new Admin($item['id'], $item['login_id'], $item['password'], $item['activated_flag'], $item['reset_password_token'], $item['updated'], $item['created']);
    }
    return null;
  }
  static function reset($login_id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE admins SET reset_password_token = :reset_password_token WHERE login_id = :login_id');
    $req->execute(array('reset_password_token' => md5($login_id), 'login_id' => $login_id));
    return null;
  }
  static function resetList()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM admins WHERE reset_password_token IS NOT NULL');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Admin($item['id'], $item['login_id'], $item['password'], $item['activated_flag'], $item['reset_password_token'], $item['updated'], $item['created']);
    }

    return $list;
  }
  static function newPassword($login_id, $newPassword)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE admins SET reset_password_token = :reset_password_token, password = :password WHERE login_id = :login_id');
    $req->execute(array('reset_password_token' => '', 'password' => $newPassword, 'login_id' => $login_id));
    return null;
  }
}
