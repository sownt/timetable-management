<?php
class Subject
{
  public $id;
  public $name;
  public $avatar;
  public $description;
  public $school_year;
  public $updated;
  public $created;

  function __construct($id, $name, $avatar, $description, $school_year, $updated, $created)
  {
    $this->id = $id;
    $this->name = $name;
    $this->avatar = $avatar;
    $this->description = $description;
    $this->school_year = $school_year;
    $this->updated = $updated;
    $this->created = $created;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM subjects');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Subject($item['id'], $item['name'], $item['avatar'], $item['description'], $item['school_year'], $item['updated'], $item['created']);
    }

    return $list;
  }

  static function add($name, $avatar, $description, $school_year)
  {
    $db = DB::getInstance();
    $req = $db->prepare('INSERT INTO subjects (name, avatar, description, school_year) VALUES (:name, :avatar, :description, :school_year)');
    $req->execute(array(
      'name' => $name,
      'avatar' => $avatar,
      'description' => $description,
      'school_year' => $school_year
    ));
  }
}
