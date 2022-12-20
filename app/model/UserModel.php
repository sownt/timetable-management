<?php
require_once('./app/model/DbModel.php');
class UserModel extends DbModel
{
    public function login($username, $password)
    {
        $con = $this->connect();
        $sql = 'SELECT * FROM  `user` WHERE username = "' . $username . '" and password = "' . $password . '" ';
        $result = $con->query($sql);
        return $user = mysqli_fetch_assoc($result);
    }
}

?>
