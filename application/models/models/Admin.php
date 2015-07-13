<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 04/07/15
 * Time: 21:52
 */

namespace models;

class Admin extends Person{

    private $username;
    private $password;
    private $level;

    public function __construct($username){
        $this->username = $username;
        $query = $this->db->get_where('petugas', array('ptg_username' => $username));
        $row = $query->first_row();
        parent::set_name($row->ptg_nama);
        $this->password = $row->ptg_password;
        $this->level = $row->ptg_level;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_level(){
        return $this->level;
    }

}