<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 13/07/15
 * Time: 14:49
 */
class Property extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('admin')) redirect('/');
        $this->load->model('Categories');
        $this->load->model('Publishers');
    }

    public function category(){
        $data['categories'] = $this->Categories->get_kategori();
        $data['title'] = "Category";
        $this->load->view('category',$data);
    }

    public function publisher(){
        $data['publishers'] = $this->Publishers->get_publishers();
        $data['title'] = "Publisher";
        $this->load->view('publisher',$data);
    }

    public function add_category(){
        $category = $this->Categories->get_category();
        if(isset($_POST['nama'])){
            $name = $this->input->post('nama');
            $category->set_name($name);
            $category->save();
            redirect('/Property/category');
        }else {
            $data['title'] = "Add Category";
            $this->load->view('add_category', $data);
        }
    }

    public function edit_category($id){
        $category = $this->Categories->get_category($id);
        if(isset($_POST['nama'])){
            $name = $this->input->post('nama');
            $category->set_name($name);
            $category->update();
            redirect('/Property/category');
        }else {
            $data['category'] = $category;
            $data['title'] = "Edit Category";
            $this->load->view('edit_category', $data);
        }
    }

    public function add_publisher(){
        $category = $this->Categories->get_category();
        if(isset($_POST['nama'])){
            $name = $this->input->post('nama');
            $address = $this->input->post('alamat');
            $phone = $this->input->post('telp');
            $category->set_name($name);
            $category->set_address($address);
            $category->set_phone($phone);
            $category->save();
            redirect('/Property/publisher');
        }else {
            $data['title'] = "Add Publisher";
            $this->load->view('add_publisher', $data);
        }
    }

    public function edit_publisher($id){
        $category = $this->Categories->get_category($id);
        if(isset($_POST['nama'])){
            $name = $this->input->post('nama');
            $category->set_name($name);
            $category->update();
            redirect('/Property/category');
        }else {
            $data['category'] = $category;
            $data['title'] = "Edit Category";
            $this->load->view('edit_category', $data);
        }
    }
}