<?php
require_once('base_controller.php');
class HomeController extends BaseController
{
    function __construct()
    {
        $this->folder = 'home';
    }
    function display()
    {
        $data = array(
            'title' => 'Trang chủ',
            'user' => 'demo',
            'last_active' => 'Jan 6, 2023'
        );
        $this->render(data: $data);
    }
}