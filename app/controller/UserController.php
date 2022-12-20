<?php
require_once('./app/model/UserModel.php');
class UserController
{
    public function getUser()
    {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if ($password != '' && $username != '') {
            $user_model = new UserModel();
            $user = $user_model->login($username, $password);
            if ($user) {
                require_once('./app/view/base.php');
            } else {
                require_once('./app/view/login.php');
            }
        } else {
            require_once('./app/view/login.php');
        }
    }
}

?>
