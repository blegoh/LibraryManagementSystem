<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 11/07/15
 * Time: 9:51
 */

class Satpam extends CI_Model{

    private $user;
    private $valid;

    public function __construct(){
        parent::__construct();
        $this->valid = true;
    }

    public function set_username_password($username,$password){
        $query = $this->db->get_where('petugas', array('ptg_username' => $username));
        if ($query->num_rows() > 0){
            $this->user = new \models\Admin($username);
            $this->valid = ($this->user->get_password() != md5($password))? false : true;
        }else{
            $this->valid = false;
        }
    }

    public function get_login(){
        return $this->valid;
    }

    public function get_user(){
        return $this->user;
    }

}