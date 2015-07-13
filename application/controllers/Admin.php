<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 04/07/15
 * Time: 21:16
 */

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        $this->home();
    }

    public function home(){
        if($this->session->has_userdata('admin')){
            $data['title'] = "Home Admin";
            $this->load->view('home_admin',$data);
        }else{
            redirect('/');
        }
    }

    public function login(){
        if($this->session->has_userdata('admin')){
            echo $this->session->admin;
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('Satpam');
            $this->Satpam->set_username_password($username,$password);
            if($this->Satpam->get_login()){
                $admin = $this->Satpam->get_user();
                $this->session->set_userdata('admin', $admin->get_username());
                redirect('/Admin/home');
            }else{
                redirect('/');
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('admin');
        redirect('/');
    }
}