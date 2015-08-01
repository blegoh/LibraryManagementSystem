<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 30/06/15
 * Time: 13:20
 */

namespace models;

class Category extends \CI_Model{
    private $id;
    private $name;

    public function __construct($id = 0){
        $this->id = $id;
        if($id != 0) {
            $query = $this->db->get_where('kategori', array('kat_kode' => $id));
            foreach ($query->result() as $row) {
                $this->name = $row->kat_nama;
            }
        }
    }

    public function get_id(){
        return $this->id;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function save(){
        $data = array(
            'kat_nama' => $this->name
        );
        $this->db->insert('kategori', $data);
    }

    public function update(){
        $data = array(
            'kat_nama' => $this->name
        );

        $this->db->where('kat_kode', $this->id);
        $this->db->update('kategori', $data);
    }
}