<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 11/07/15
 * Time: 9:29
 */

namespace models;


class Member extends Person{

    private $id;
    private $reg_date;
    private $exp_date;
    private $status;

    public function __construct($id){
        $this->id = $id;
        $query = $this->db->get_where('anggota', array('ang_kode' => $id));
        $row = $query->first_row();
        parent::set_name($row->ang_nama);
        parent::set_address($row->ang_alamat);
        parent::set_phone($row->ang_telp);
        $this->reg_date = $row->ang_tgl_registrasi;
        $this->exp_date = $row->ang_tgl_kadaluarsa;
        $this->status = $row->ang_status_aktif;
    }

    public function get_id(){
        return $this->id;
    }

    public function get_reg_date(){
        return $this->reg_date;
    }

    public function get_exp_date(){
        return $this->exp_date;
    }

    public function get_status(){
        return $this->status;
    }

    public function save(){
        $data = array(
            'ang_nama' => 'My title',
            'ang_alamat' => 'My Name',
            'ang_telp' => 'My date'
        );

        $this->db->insert('mytable', $data);
    }
}