<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 30/06/15
 * Time: 13:12
 */

namespace models;

class Book extends \CI_Model{
    private $id;
    private $title;
    private $author;
    private $publisher;
    private $detail;
    private $photo;
    private $category;
    private $date;
    private $items = array();

    public function __construct($id){
        parent::__construct();
        $this->id = $id;
        $query = $this->db->get_where('buku', array('bk_kode' => $id));
        $row = $query->first_row();
        $this->title = $row->bk_judul;
        $this->author = $row->bk_pengarang;
        $this->publisher = new Publisher($row->bk_pnb_kode);
        $this->detail = $row->bk_deskripsi;
        $this->photo = $row->bk_foto;
        $this->date = $row->bk_tgl_pengadaan;
        $this->category = new Category($row->bk_kat_kode);
        $query = $this->db->get_where('item_buku', array('ib_bk_kode' => $id));
        foreach ($query->result() as $row) {
            $this->items[] = new Item($row->ib_kode);
        }
    }

    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return $this->title;
    }

    public function get_author(){
        return $this->author;
    }

    public function get_publisher(){
        return $this->publisher;
    }

    public function get_detail(){
        return $this->detail;
    }

    public function get_photo(){
        return $this->photo;
    }

    public function get_category(){
        return $this->category;
    }

    public function get_available(){
        $count = 0;
        foreach ($this->items as $item) {
            $count = ($item->get_status() == 'tersedia') ? $count+1:$count;
        }
        return $count;
    }

    public function get_stock(){
        $count = 0;
        foreach ($this->items as $item) {
            $count = ($item->get_status() != 'hilang') ? $count+1:$count;
        }
        return $count;
    }
}