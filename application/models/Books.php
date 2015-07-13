<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 30/06/15
 * Time: 11:58
 */

class Books extends CI_Model{
    private $books;
    private $category;
    private $limit;
    private $per_page;
    private $search;

    public function __construct(){
        parent::__construct();
        $this->books = array();
        $this->category = 0;
    }

    public function set_category($cat){
        $this->category = $cat;
    }

    public function set_search($search){
        $this->search = $search;
    }

    public function set_paging($limit,$per_page){
        $this->limit = $limit;
        $this->per_page = $per_page;
    }



    public function get_books(){
        $this->db->from('buku');
        if($this->category != 0){
            $this->db->where(array('buku.bk_kat_kode' => $this->category));
        }elseif($this->search != ''){
            $this->db->where(array('bk_judul like' => "%".$this->search."%"));
        }
        $this->db->limit($this->per_page,$this->limit);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->books[] = new \models\Book($row->bk_kode);
        }
        return $this->books;
    }

    public function get_detail_book($id){
        return new \models\Book($id);
    }

    public function get_category(){
        if($this->category == 0){
            return "All books";
        }else{
            $a = new \models\Category($this->category);
            return $a->get_name();
        }
    }
    
    public function get_total_rows(){
        $this->db->from('buku');
        if($this->category != 0){
            $this->db->where(array('buku.bk_kat_kode' => $this->category));
        }elseif($this->search != ''){
            $this->db->where(array('bk_judul like' => "%".$this->search."%"));
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

}