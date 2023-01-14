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
        $data = array(
            'title' => 'Sửa thông tin giảng viên',
            'is_access' => '1',
            'teacher' => array(
                "id" => "1",
                "name" => "Nguyễn Văn A",
                "specialization" => "001",
                "degree" => "003",
                "avatar" => "web/avatar/avatar_20230114081307_1.jpg",
                "description" => "Tôi năm nay 29 tuổi, lấy bằng tiến sĩ ở Đại học bôn ba. Sở thích của tôi là đọc báo, chơi game và nghe nhạc. Tôi nuôi 100 con chó và 100 con mèo. Mỗi loại một nửa là béo, một nữa là gầy. Tôi gõ VNI nên đôi khi nhầm thanh hõi với thanh ngả. Siuuuuuuuu...."
            )
        );
        $this->render(file: 'teacher_edit_input', data: $data);
    }
}