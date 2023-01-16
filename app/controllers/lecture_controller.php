<?php
require_once('base_controller.php');
class LectureController extends BaseController
{
    function __construct()
    {
        $this->folder = 'lecture';
    }
    function search()
    {
        $this->render(file: 'lecture_search', data: array('title' => 'Tìm kiếm'));
    }
    function register()
    {
        $this->render(file: 'lecture_add_input', data: array('title' => 'Đăng ký môn học'));
    }
    function register_confirm()
    {
        $this->render(file: 'lecture_add_confirm', data: array('title' => 'Xác nhận đăng ký môn học'));
    }
    function register_complete()
    {
        $this->render(file: 'lecture_add_complete', data: array('title' => 'Đăng ký môn học hoàn tất!'));
    }
    function update()
    {
        $this->render(file: 'lecture_edit_input', data: array('title' => 'Sửa môn học'));
    }
}