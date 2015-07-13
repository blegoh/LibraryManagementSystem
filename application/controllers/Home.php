<?php


class Home extends CI_Controller{
    private $kategori;

    public function index(){
        $this->load->model('Categories');
        $this->kategori = $this->Categories->get_kategori();
        $data['kategori'] = $this->kategori;
        $data['title'] = 'Home';
        $this->load->view('home',$data);
    }
}