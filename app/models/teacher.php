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
    $req = $db->query('SELECT * FROM teachers');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Teacher($item['id'], $item['name'], $item['avatar'], $item['description'], $item['specialized'], $item['degree'], $item['updated'], $item['created']);
    }

    return $list;
  }

  static function get($id)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM teachers WHERE id = $id");
    
    foreach ($req->fetchAll() as $item) {
      $list[] = new Teacher($item['id'], $item['name'], $item['avatar'], $item['description'], $item['specialized'], $item['degree'], $item['updated'], $item['created']);
    }
    return $list[0];
  }

  static function add($name, $specialized, $degree, $avatar, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare('INSERT INTO teachers (name, specialized, degree, avatar, description, created, updated) VALUES (:name, :specialized, :degree, :avatar, :description, now(), now())');
    $req->execute(array(
      'name' => $name,
      'specialized' => $specialized,
      'degree' => $degree,
      'avatar' => $avatar,
      'description' => $description
    ));
  }

  static function update($id, $name, $specialized, $degree, $avatar, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE teachers SET name = :name, specialized = :specialized, degree = :degree, avatar = :avatar, description = :descriptiion, updated = now() WHERE id = :id');
    $req->execute(array(
      'name' => $name,
      'specialized' => $specialized,
      'degree' => $degree,
      'avatar' => $avatar,
      'description' => $description,
      'id' => $id
    ));
  }
}
