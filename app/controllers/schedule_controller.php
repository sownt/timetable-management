<?php
require_once('base_controller.php');
require_once('app/models/subject.php');
require_once('app/models/teacher.php');
require_once('app/models/schedule.php');

class ScheduleController extends BaseController
{
    function __construct()
    {
        $this->folder = 'schedule';
    }
    function search()
    {
        $this->render(file: 'schedule_search', data: array('title' => 'Đăng nhập'));
    }
    function register()
    {
        function validation_schedule($data_schedule){
            $errors = array();
            if (!isset($data_schedule['school_year'])) {
                $errors['school_year'] = "Hãy chọn năm học";
            }
            if (!isset($data_schedule['subject_id'])) {
                $errors['subject_id'] = "Hãy chọn môn học";
            }
            if (!isset($data_schedule['teacher_id'])) {
                $errors['teacher_id'] = "Hãy chọn giáo viên";
            }
            if (!isset($data_schedule['week_day_id'])) {
                $errors['week_day_id'] = "Hãy chọn thứ";
            }
            if (!isset($data_schedule['lession_id'])) {
                $errors['lession_id'] = "Hãy chọn tiết học";
            }
            if (!isset($data_schedule['notes']) || strlen($_POST['notes']) == 0) {
                $errors['notes'] = "Hãy nhập chú ý";
            }
            return $errors;
        }
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $data = array('teachers' => $teachers,'subjects' => $subjects);
        if (isset($_POST['submit'])) {
            $data_schedule = $_POST;
            $errors = validation_schedule($data_schedule);
            if (count($errors) == 0) {
                $this->render(file: 'schedule_add_confirm', 
                                data: array_merge(array('title' => 'Schedule Confirm','schedule_data' => $_POST),$data));
            }
            else $this->render(file: 'schedule_add_input', 
                            data: array_merge(array('title' => 'Schedule Input',
                                                    'errors' => $errors, 'schedule_data' => $_POST), $data));
        }
        elseif (isset($_POST['edit_input'])){
            $this->render(file: 'schedule_add_input', 
                        data: array_merge(array('title' => 'Schedule Edit Input','schedule_data' => $_POST),$data));
        }
        elseif (isset($_POST['schedule_register'])){
            $data_schedule = $_POST;
            $errors = validation_schedule($data_schedule);

            if(count($errors) == 0){
                $idTeachers = array_column($teachers, 'id');
                $idSubjects = array_column($subjects, 'id');
                if(in_array($data_schedule['teacher_id'], $idTeachers) &&
                    in_array($data_schedule['subject_id'], $idSubjects)){
                        $is_schedule = Schedule::add($data_schedule['school_year'],$data_schedule['subject_id'],
                                    $data_schedule['teacher_id'],$data_schedule['week_day_id'],
                                    implode(',', $data_schedule['lession_id']),$data_schedule['notes']);
                        if ($is_schedule){
                            $this->render(file: 'schedule_add_complete', data: array('title' => 'Schedule Complete',));
                        }
                }else{
                    echo "loi";
                }

            }else{
                $this->render(file: 'schedule_add_input', 
                                data: array_merge(array('title' => 'Schedule Input',
                                                        'errors' => $errors, 
                                                        'schedule_data' => $_POST), $data));
            }
        }
        else $this->render(file: 'schedule_add_input', 
                            data: array_merge(array('title' => 'Schedule Input'),$data));
    }
    function register_confirm()
    {
        $this->render(file: 'schedule_add_confirm', data: array('title' => 'Schedule Confirm'));
    }
    function register_complete()
    {
        $this->render(file: 'schedule_add_complete', data: array('title' => 'Schedule Complete'));
    }
    function update()
    {
        $this->render(file: 'schedule_edit_input', data: array('title' => 'Quên mật khẩu'));
    }
    function update_confirm()
    {
        $this->render(file: 'schedule_edit_confirm', data: array('title' => 'Xác nhận đổi mật khẩu'));
    }
    function update_complete()
    {
        $this->render(file: 'schedule_edit_complete', data: array('title' => 'Đổi mật khẩu thành công'));
    }
}