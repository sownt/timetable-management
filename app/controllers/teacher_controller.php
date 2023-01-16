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
        $this->render(file: 'teacher_edit_input', data: array('title' => 'Sửa thông tin giảng viên'));
    }
    function update_confirm()
    {
        $this->render(file: 'teacher_edit_confirm', data: array('title' => 'Xác nhận chỉnh sửa'));
    }
    function update_complete()
    {
        $this->render(file: 'teacher_edit_complete', data: array('title' => 'Chỉnh sửa thành công'));
    }
}