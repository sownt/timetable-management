<?php
require_once('base_controller.php');
class AuthController extends BaseController
{
    function __construct()
    {
        $this->folder = 'auth';
    }
    function login()
    {
        $data = array(
            'title' => 'Đăng nhập',
        );
        $this->render(file: 'login', data: $data);
    }
    function reset()
    {
        $data = array(
            'title' => 'Danh sách yêu cầu',
        );
        $this->render(file: 'reset', data: $data);
    }
    function request()
    {
        $data = array(
            'title' => 'Quên mật khẩu',
        );
        $this->render(file: 'request', data: $data);
    }
}