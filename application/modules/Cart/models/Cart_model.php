<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function getData($id){
        $this->db->select('id,name,price,img');
        $this->db->from('product');
        $this->db->where('id',$id);
        $dulieu = $this->db->get()->result_array();
        $dulieu[0]['qty']=1;
        return $dulieu;
    }
}