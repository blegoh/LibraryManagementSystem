<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 04/07/15
 * Time: 21:49
 */

namespace models;


class Person extends \CI_Model{

    protected $name;
    protected $address;
    protected $phone;

    public function set_name($name){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_address($address){
        $this->address = $address;
    }

    public function get_address(){
        return $this->address;
    }

    public function set_phone($phone){
        $this->phone = $phone;
    }

    public function get_phone(){
        return $this->phone;
    }

}