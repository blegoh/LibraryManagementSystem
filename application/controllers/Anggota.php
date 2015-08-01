<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 13/07/15
 * Time: 15:24
 */
class Anggota extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Members');
    }

    public function index(){
        $this->show();
    }

    public function show($page=0){
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/lms/index.php/Anggota/show/';
        $config['total_rows'] = $this->Members->get_total_rows();
        $config['per_page'] = 10;
        $this->Members->set_paging($page,10);
        $data['members'] = $this->Members->get_members();
        $data['title'] = "Members";
        $this->pagination->initialize($config);
        $this->load->view('member',$data);
    }

    public function detail($id){
        $data['member'] =  $this->Members->get_member($id);
        $this->load->view('detail_anggota',$data);
    }

    public function add(){
        $data['title'] = "Add Members";
        $this->load->view('add_member',$data);
    }

    public function edit($id){
        if(isset($_POST['nama'])){

        }else{
            $data['member'] = $this->Members->get_member($id);
            $data['title'] = "Edit Members";
            $this->load->view('edit_member',$data);
        }

    }
}