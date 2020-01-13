<?php

class Login_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function do_login($username, $password)
    {
        $sql = "SELECT * FROM admin_user WHERE username = ?";
        $query = $this->db->query($sql, array($username)); 
        $user = $query->row_array();
        if($user)
        {
            $hashed = $user['password'];
            $verified = password_verify($password, $hashed);
            if($verified === true)
            {
                return array('status' => 1, 'msg' => '成功', 'data' => $user);
            }else
            {
                return array('status' => 2, 'msg' => '密码错误', 'data' => array());
            }
        }
        return array('status' => 2, 'msg' => '用户不存在', 'data' => array() );
    }
}