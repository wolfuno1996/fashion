<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAllCategory(){
        //Show Categories
        $this->db->select('name');
        return $total_category = $this->db->get('category')->result_array();
    }

    public function getData(){
        $this->db->select('*');
        $dulieu['product'] = $this->db->get('product')->result_array();
        $dulieu['category'] = $this->getAllCategory();
        return $dulieu;
    }

    public function deleteProduct($id){
        $this->db->where('id',$id);
        $this->db->delete('product');
        if($this->db->affected_rows()>0){
            return 'Success';
        }
        else{
            return 'fail';
        }
    }

    public function getDataFromCategory($category){
        $this->db->select('product.id,product.name,product.price,product.color,product.content,product.img,product.qty');
        $this->db->from('product');
        $this->db->join('category','category.id_category=product.id_category');
        $this->db->where('category.name',$category);
        $dulieu['product'] = $this->db->get()-> result_array();
        $dulieu['category'] = $this->getAllCategory();
        return $dulieu;
    }


}