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

<<<<<<< HEAD
=======
  static function get($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM subjects WHERE id = :id');
    $req->execute(array('id' => $id));
    $item = $req->fetch();

    return new Subject($item['id'], $item['name'], $item['avatar'], $item['description'], $item['school_year'], $item['updated'], $item['created']);
  }

>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
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
<<<<<<< HEAD
=======

  static function update($id, $name, $avatar, $description, $school_year)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE subjects SET name = :name, avatar = :avatar, description = :description, school_year = :school_year WHERE id = :id');
    $req->execute(array(
      'id' => $id,
      'name' => $name,
      'avatar' => $avatar,
      'description' => $description,
      'school_year' => $school_year
    ));
  }

  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('DELETE FROM subjects WHERE id = :id');
    $req->execute(array('id' => $id));
  }

  static function find($school_year, $keyword) {
    $list = [];
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM subjects WHERE school_year = :school_year AND name LIKE :keyword OR description LIKE :keyword');
    $req->execute(array(
      'school_year' => $school_year,
      'keyword' => '%' . $keyword . '%'
    ));

    foreach ($req->fetchAll() as $item) {
      $list[] = new Subject($item['id'], $item['name'], $item['avatar'], $item['description'], $item['school_year'], $item['updated'], $item['created']);
    }

    return $list;
  }
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
}
