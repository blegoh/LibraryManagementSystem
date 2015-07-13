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

    public function __construct($id){
        $this->id = $id;
        $query = $this->db->get_where('kategori', array('kat_kode' => $id));
        foreach ($query->result() as $row)
        {
            $this->name = $row->kat_nama;
        }
    }

    public function get_id(){
        return $this->id;
    }

    public function get_name(){
        return $this->name;
    }
}