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
        $this->render(file: 'schedule_input', data: array('title' => 'Danh sách reset'));
    }
    function update()
    {
        $this->render(file: 'classroom_edit_input', data: array('title' => 'Quên mật khẩu'));
    }
}