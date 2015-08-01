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
    private $num_pages;
    private $year;
    private $price;
    private $items = array();

    public function __construct($id = 0){
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
        $this->num_pages = $row->bk_jml_hal;
        $this->year = $row->bk_th_terbit;
        $this->price = $row->bk_harga;
        $query = $this->db->get_where('item_buku', array('ib_bk_kode' => $id,'status !=' => 'hilang'));
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

    public function set_title($title){
        $this->title = $title;
    }

    public function get_author(){
        return $this->author;
    }

    public function set_author($author){
        $this->author = $author;
    }

    public function get_publisher(){
        return $this->publisher;
    }

    public function set_publisher($publisher){
        $this->publisher = new Publisher($publisher);
    }

    public function get_detail(){
        return $this->detail;
    }

    public function set_detail($detail){
        $this->detail = $detail;
    }

    public function get_photo(){
        return $this->photo;
    }

    public function set_photo($photo){
        $this->photo = $photo;
    }

    public function get_category(){
        return $this->category;
    }

    public function set_category($category){
        $this->category = new Category($category);
    }

    public function get_num_pages(){
        return $this->num_pages;
    }

    public function set_num_pages($num_pages){
        $this->num_pages = $num_pages;
    }

    public function get_year(){
        return $this->year;
    }

    public function set_year($year){
        $this->year = $year;
    }

    public function get_price(){
        return $this->price;
    }

    public function set_price($price){
        $this->price = $price;
    }

    public function get_available(){
        $count = 0;
        foreach ($this->items as $item) {
            $count = ($item->get_status() == 'tersedia') ? $count+1:$count;
        }
        return $count;
    }

    public function get_items(){
        return $this->items;
    }

    public function get_stock(){
        return count($this->items);
    }

    public function set_stock($stock){
        if($this->get_stock() < $stock){
            $data = array();
            for($i=0;$i<($stock - $this->get_stock());$i++){
                $item = array(
                    'ib_bk_kode' => $this->id,
                    'status' => 'tersedia'
                );
                array_push($data,$item);
            }
        }
    }

    public function save(){
        $data = array(
            'bk_judul' => $this->title,
            'bk_pengarang' => $this->author,
            'bk_jml_hal' => $this->num_pages,
            'bk_th_terbit' => $this->year,
            'bk_deskripsi' => $this->detail,
            'bk_harga' => $this->price,
            'bk_kat_kode' => $this->category->get_id(),
            'bk_pnb_kode' => $this->publisher->get_id(),
            'bk_foto' => ''
        );
        $this->db->insert('buku', $data);
        $query = $this->db->get('buku');
        $row = $query->last_row();
        $this->id = $row->bk_kode;
    }

    public function update(){
        $data = array(
            'bk_judul' => $this->title,
            'bk_pengarang' => $this->author,
            'bk_jml_hal' => $this->num_pages,
            'bk_th_terbit' => $this->year,
            'bk_deskripsi' => $this->detail,
            'bk_harga' => $this->price,
            'bk_kat_kode' => $this->category->get_id(),
            'bk_pnb_kode' => $this->publisher->get_id()
        );
        $this->db->where('bk_kode', $this->id);
        $this->db->update('buku', $data);
    }
}
