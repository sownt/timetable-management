<?php
require_once('base_controller.php');
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
        // echo $_SERVER['REQUEST_URI'];
        // echo "<br>";
        // echo $_SERVER['QUERY_STRING'];
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
        if (isset($_POST['submit'])) {
            $data_schedule = $_POST;
            $errors = validation_schedule($data_schedule);
            if (count($errors) == 0) {
                $this->render(file: 'schedule_confirm', 
                                data: array('title' => 'Schedule Confirm','schedule_data' => $_POST));
            }
            else $this->render(file: 'schedule_input', 
                                data: array('title' => 'Schedule Input','errors' => $errors, 'schedule_data' => $_POST));
        }
        elseif (isset($_POST['edit_input'])){
            var_dump($_POST);
            $this->render(file: 'schedule_input', data: array('title' => 'Schedule Edit Input','schedule_data' => $_POST));
        }
        elseif (isset($_POST['schedule_register'])){
            echo "alo";
            var_dump($_POST);
            $this->render(file: 'schedule_complete', data: array('title' => 'Schedule Complete',));
        }
        else $this->render(file: 'schedule_input', data: array('title' => 'Schedule Input',));
    }
    function update()
    {
        $this->render(file: 'schedule_edit_input', data: array('title' => 'Quên mật khẩu'));
    }
}