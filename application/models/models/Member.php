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

    public function __construct($id = 0 ){
        $this->id = $id;
        if($this->id != 0) {
            $query = $this->db->get_where('anggota', array('ang_kode' => $id));
            $row = $query->first_row();
            parent::set_name($row->ang_nama);
            parent::set_address($row->ang_alamat);
            parent::set_phone($row->ang_telp);
            $this->reg_date = $row->ang_tgl_registrasi;
            $this->exp_date = $row->ang_tgl_kadaluarsa;
            $this->status = $row->ang_status_aktif;
        }
    }

    public function set_status($status){
        $this->status = $status;
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
            'ang_nama' => $this->name,
            'ang_alamat' => $this->address,
            'ang_telp' => $this->phone,
            'ang_status_aktif' => 1
        );
        $this->db->set('ang_tgl_registrasi', 'NOW()',false);
        $this->db->set('ang_tgl_kadaluarsa', 'NOW() + INTERVAL 3 YEAR',false);
        $this->db->insert('anggota', $data);
    }

    public function update(){
        $data = array(
            'ang_nama' => $this->name,
            'ang_alamat' => $this->address,
            'ang_telp' => $this->phone,
            'ang_status_aktif' => $this->status
        );
        $this->db->where('ang_kode', $this->id);
        $this->db->update('anggota', $data);
    }
}