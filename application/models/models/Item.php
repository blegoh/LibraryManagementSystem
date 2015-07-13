<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 10/07/15
 * Time: 10:14
 */

namespace models;


class Item extends \CI_Model{

    private $id;
    private $status;

    public function __construct($id){
        $this->id = $id;
        $query = $this->db->get_where('item_buku', array('ib_kode' => $id));
        $row = $query->first_row();
        $this->status = $row->status;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_status(){
        return $this->status;
    }
}