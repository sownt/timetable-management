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
        $this->render(file: 'schedule_add_input', data: array('title' => 'Thêm lịch giảng dạy'));
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