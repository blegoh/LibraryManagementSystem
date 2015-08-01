<?php

/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 13/07/15
 * Time: 14:07
 */
class Publishers extends CI_Model{

    private $publisher;

    public function __construct(){
        parent::__construct();
        $this->publisher = array();
        $query = $this->db->get('penerbit');
        foreach ($query->result() as $row) {
            $this->publisher[] = new \models\Publisher($row->pnb_kode);
        }
    }

    public function get_publishers(){
        return $this->publisher;
    }

    public function get_publisher($id = 0){
        return new \models\Publisher($id);
    }
}