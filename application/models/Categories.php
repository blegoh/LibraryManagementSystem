<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 30/06/15
 * Time: 10:33
 */


class Categories extends CI_Model{

    private $kategori;

    public function __construct(){
        $this->kategori = array();
        $query = $this->db->get('kategori');
        foreach ($query->result() as $row) {
            $this->kategori[] = new \models\Category($row->kat_kode);
        }
    }

    public function get_kategori(){
        return $this->kategori;
    }

}