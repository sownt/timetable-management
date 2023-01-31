<?php
class Schedule
{
  public $id;
  public $school_year;
  public $subject_id;
  public $teacher_id;
  public $week_day;
  public $lesson;
  public $notes;
  public $updated;
  public $created;

  function __construct($id, $school_year, $subject_id, $teacher_id, $week_day, $lesson, $notes, $updated, $created)
  {
    $this->id = $id;
    $this->school_year = $school_year;
    $this->subject_id = $subject_id;
    $this->teacher_id = $teacher_id;
    $this->week_day = $week_day;
    $this->lesson = $lesson;
    $this->notes = $notes;
    $this->updated = $updated;
    $this->created = $created;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM schedules');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Schedule($item['id'], $item['school_year'], $item['subject_id'], $item['teacher_id'], $item['week_day'], $item['lesson'], $item['notes'], $item['updated'], $item['created']);
    }

    return $list;
  }

  static function get($id)
  {
    $db = DB::getInstance();
    $id = intval($id);
    $req = $db->prepare('SELECT * FROM schedules WHERE id = :id');
    $req->execute(array('id' => $id));
    $item = $req->fetch();

    if (isset($item['id'])) {
      return new Schedule($item['id'], $item['school_year'], $item['subject_id'], $item['teacher_id'], $item['week_day'], $item['lesson'], $item['notes'], $item['updated'], $item['created']);
    }
    return null;
  }

  static function add($school_year, $subject_id, $teacher_id, $week_day, $lesson, $notes)
  {
    $db = DB::getInstance();
    $req = $db->prepare('INSERT INTO schedules (school_year, subject_id, teacher_id, week_day, lesson, notes, created, updated) 
                          VALUES (:school_year, :subject_id, :teacher_id, :week_day, :lesson, :notes,now(),now())');
    return $req->execute(array(
      'school_year' => $school_year,
      'subject_id' => $subject_id,
      'teacher_id' => $teacher_id,
      'week_day' => $week_day,
      'lesson' => $lesson,
      'notes' => $notes
    ));
  }

  static function update($id, $school_year, $subject_id, $teacher_id, $week_day, $lesson, $notes)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE schedules SET school_year = :school_year, subject_id = :subject_id, teacher_id = :teacher_id, week_day = :week_day, lesson = :lesson, notes = :notes WHERE id = :id');
    $req->execute(array('id' => $id, 'school_year' => $school_year, 'subject_id' => $subject_id, 'teacher_id' => $teacher_id, 'week_day' => $week_day, 'lesson' => $lesson, 'notes' => $notes));
  }

  static function delete($id)
  {
    $db = DB::getInstance();
    $id = intval($id);
    $req = $db->prepare('DELETE FROM schedules WHERE id = :id');
    $req->execute(array('id' => $id));
  }

  static function find($school_year, $subject_id, $teacher_id, $week_day, $lesson)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM schedules WHERE school_year = :school_year AND subject_id = :subject_id AND teacher_id = :teacher_id AND week_day = :week_day AND lesson = :lesson');
    $req->execute(array('school_year' => $school_year, 'subject_id' => $subject_id, 'teacher_id' => $teacher_id, 'week_day' => $week_day, 'lesson' => $lesson));
    $item = $req->fetch();

    if (isset($item['id'])) {
      return new Schedule($item['id'], $item['school_year'], $item['subject_id'], $item['teacher_id'], $item['week_day'], $item['lesson'], $item['notes'], $item['updated'], $item['created']);
    }
    return null;
  }
}
