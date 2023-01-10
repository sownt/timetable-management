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
    function update()
    {
        $this->render(file: 'lecture_edit', data: array('title' => 'Sửa môn học'));
    }
}