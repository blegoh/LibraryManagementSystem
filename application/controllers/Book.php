<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 30/06/15
 * Time: 13:04
 */

class Book extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Books');
        $this->load->model('Categories');
    }

    public function index(){
        $this->show_books();
    }

    public function show_books($category_id = 0,$page = 0){
        $this->load->library('pagination');
        $this->Books->set_category($category_id);
        $config['base_url'] = 'http://localhost/lms/index.php/book/show_books/'.$category_id.'/';
        $config['total_rows'] = $this->Books->get_total_rows();
        $config['per_page'] = 10;
        $this->Books->set_paging($page,$config['per_page']);
        $data['kategori'] = $this->Categories->get_kategori();
        $data['category_choosed'] = $this->Books->get_category();
        $data['page'] = "book";
        $data['books'] = $this->Books->get_books();
        $data['title'] = $data['category_choosed'];
        $this->pagination->initialize($config);
        $this->load->view('book',$data);
    }

    public function search($search = '',$page = 0){
        $this->load->library('pagination');
        $search = ($search == '')?$this->input->post('search'):$search;
        $this->Books->set_search($search);
        $config['base_url'] = 'http://localhost/lms/index.php/book/search/'.$search.'/';
        $config['total_rows'] = $this->Books->get_total_rows();
        $config['per_page'] = 10;
        $this->Books->set_paging($page,$config['per_page']);
        $data['kategori'] = $this->Categories->get_kategori();
        $data['category_choosed'] = "Search";
        $data['page'] = "book";
        $data['books'] = $this->Books->get_books();
        $data['title'] = "Search";
        $this->pagination->initialize($config);
        $this->load->view('book',$data);
    }

    public function detail_book($book_id){
        $book = $this->Books->get_detail_book($book_id);
        $data['kategori'] = $this->Categories->get_kategori();
        $data['title'] = $book->get_title();
        $data['book'] = $book;
        $this->load->view('detail',$data);
    }

}