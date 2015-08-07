<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 13/07/15
 * Time: 15:39
 */
class Members extends CI_Model{

    private $members;
    private $status = 1;

    public function __construct(){
        parent::__construct();
        $this->members = array();
    }

    public function set_status($status){
        $this->status = $status;
    }

    public function set_paging($limit,$per_page){
        $this->db->from('anggota');
        $this->db->where('ang_status_aktif',$this->status);
        $this->db->limit($per_page,$limit);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->members[] = new \models\Member($row->ang_kode);
        }
    }

    public function get_members(){
        return $this->members;
    }

    public function get_member($id){
        return new \models\Member($id);
    }

    public function get_total_rows(){
        $this->db->from('anggota');
        $this->db->where('ang_status_aktif',$this->status);
        $query = $this->db->get();
        return $query->num_rows();
    }


}