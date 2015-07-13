<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 11/07/15
 * Time: 16:47
 */
class Collections extends CI_Model{

    private $books;

    public function __construct(){
        parent::__construct();
        $this->books = array();
    }

    public function set_books($limit,$per_page){
        $this->db->from('buku');
        $this->db->limit($per_page,$limit);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->books[] = new \models\Book($row->bk_kode);
        }
    }

    public function get_books(){
        return $this->books;
    }

    public function get_total_rows(){
        $this->db->from('buku');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_detail_book($id){
        return new \models\Book($id);
    }
}