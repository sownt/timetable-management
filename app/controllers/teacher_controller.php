<?php
require_once('base_controller.php');
class TeacherController extends BaseController
{
    function __construct()
    {
        $this->folder = 'teacher';
    }
    function search()
    {
        $this->render(file: 'teacher_search', data: array('title' => 'Đăng nhập'));
    }
    function register()
    {
        $this->render(file: 'teacher_add_input', data: array('title' => 'Danh sách reset'));
    }
    function update()
    {
        $this->render(file: 'teacher_edit_input', data: array('title' => 'Quên mật khẩu'));
    }
}