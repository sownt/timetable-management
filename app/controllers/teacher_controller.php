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
    function register_confirm()
    {
        $this->render(file: 'teacher_add_confirm', data: array('title' => 'Xác nhận đăng ký giảng viên'));
    }
    function register_complete()
    {
        $this->render(file: 'teacher_add_complete', data: array('title' => 'Đăng ký giảng viên thành công'));
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
<<<<<<< HEAD
}
=======
}
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
