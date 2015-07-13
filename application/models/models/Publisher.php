<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 01/07/15
 * Time: 4:04
 */

namespace models;

class Publisher extends \CI_Model{
    private $id;
    private $name;
    private $address;
    private $phone;

    public function __construct($id){
        $this->id = $id;
        $this->db->from('penerbit');
        $this->db->where('pnb_kode', $id);
        $query = $this->db->get();
        foreach($query->result() as $row){
            $this->name = $row->pnb_nama;
            $this->address = $row->pnb_alamat;
            $this->phone = $row->pnb_telp;
        }
    }

    public function get_name(){
        return $this->name;
    }

    public function get_address(){
        return $this->address;
    }

    public function get_phone(){
        return $this->phone;
    }
}