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
}
