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

    }

    public function edit($id){

    }

}