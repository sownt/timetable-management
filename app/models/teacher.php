<?php
class Teacher
{
  public $id;
  public $name;
  public $avatar;
  public $description;
  public $specialized;
  public $degree;
  public $updated;
  public $created;

  function __construct($id, $name, $avatar, $description, $specialized, $degree, $updated, $created)
  {
    $this->id = $id;
    $this->name = $name;
    $this->avatar = $avatar;
    $this->description = $description;
    $this->specialized = $specialized;
    $this->degree = $degree;
    $this->updated = $updated;
    $this->created = $created;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM admins');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Teacher($item['id'], $item['name'], $item['avatar'], $item['description'], $item['specialized'], $item['degree'], $item['updated'], $item['created']);
    }

    return $list;
  }
}
