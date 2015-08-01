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

    public function __construct($id = 0){
        $this->id = $id;
        if($id != 0) {
            $this->db->from('penerbit');
            $this->db->where('pnb_kode', $id);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $this->name = $row->pnb_nama;
                $this->address = $row->pnb_alamat;
                $this->phone = $row->pnb_telp;
            }
        }
    }

    public function get_id(){
        return $this->id;
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

    public function set_name($name){
        $this->name = $name;
    }

    public function set_address($address){
        $this->address = $address;
    }

    public function set_phone($phone){
        $this->phone = $phone;
    }

    public function save(){
        $data = array(
            'pnb_nama' => $this->name,
            'pnb_alamat' => $this->address,
            'pnb_tlp' => $this->phone
        );
        $this->db->insert('penerbit', $data);
    }

    public function update(){
        $data = array(
            'pnb_nama' => $this->name,
            'pnb_alamat' => $this->address,
            'pnb_tlp' => $this->phone
        );

        $this->db->where('pnb_kode', $this->id);
        $this->db->update('penerbit', $data);
    }
}