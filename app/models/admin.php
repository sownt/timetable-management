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
<<<<<<< HEAD
=======

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
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
}
