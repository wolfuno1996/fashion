<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function getData(){
        $this->db->select('*');
        return $this->db->get('product')->result_array();
    }
    public function getDataFromCategory($category){
        $this->db->select('product.name,product.price,product.color,product.content,product.img');
        $this->db->from('product');
        $this->db->join('category','category.id_category=product.id_category');
        $this->db->where('category.name',$category);
        //$this->db->where('id_category',$category) ;
        return $this->db->get()-> result_array();
    }


}