<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 11/07/15
 * Time: 14:07
 */

class Collection extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        if(!$this->session->has_userdata('admin')) redirect('/');
        $this->load->model('Collections');
        $this->load->model('Categories');
        $this->load->model('Publishers');
        $this->load->library('pagination');
    }

    public function index(){
        $this->show(0);
    }

    public function show($limit = 0){
        $this->Collections->set_books($limit,15);
        $data['books'] = $this->Collections->get_books();
        $data['title'] = "Collection";
        $config['base_url'] = 'http://localhost/lms/index.php/Collection/show/';
        $config['total_rows'] = $this->Collections->get_total_rows();
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        $this->load->view('collection',$data);
    }

    public function detail($id){
        $data['book'] = $this->Collections->get_detail_book($id);
        $this->load->view('detail_coll',$data);
    }

    public function add(){
        $data['title'] = 'Add New Book';
        $data['categories'] = $this->Categories->get_kategori();
        $data['publishers'] = $this->Publishers->get_publishers();
        $this->load->view('new_collection',$data);
    }

    public function edit($id){
        $data['book'] = $this->Collections->get_detail_book($id);
        if(isset($_POST['judul'])){
            $data['book']->set_title($this->input->post('judul'));
            $data['book']->set_author($this->input->post('pengarang'));
            $data['book']->set_num_pages($this->input->post('halaman'));
            $data['book']->set_year($this->input->post('thn'));
            $data['book']->set_detail($this->input->post('deskripsi'));
            $data['book']->set_price($this->input->post('harga'));
            $data['book']->set_category($this->input->post('kategori'));
            $data['book']->set_publisher($this->input->post('penerbit'));
            $data['book']->update();
            redirect('/Collection');
        }else{
            $data['title'] = 'Edit '.$data['book']->get_title();
            $data['categories'] = $this->Categories->get_kategori();
            $data['publishers'] = $this->Publishers->get_publishers();
            $this->load->view('edit_collection',$data);
        }

    }

    public function items($id){
        $data['book'] = $this->Collections->get_detail_book($id);
        $data['title'] = $data['book']->get_title()."'s items";
        $this->load->view('items',$data);
    }

}