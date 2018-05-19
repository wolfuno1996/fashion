<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();

    }

    public function count_record($data){
        return count($data);
    }

    public function getAllCategory(){
        //Show Categories
        $this->db->select('name');
        return $total_category = $this->db->get('category')->result_array();
    }

    public function getData($current_page,$sort){
        //Phân trang Product

        $limit = 3;
        $this->db->select('*');
        $data =  $this->db->get('product') ->result_array();
        $total_record = $this->count_record($data);
        $total_page = ceil($total_record/$limit);
        if($current_page>$total_page){
            $current_page = $total_page;
        }else if($current_page<1){
            $current_page=1;
        }
        $start = ($current_page-1) * $limit;
        //Select lần nữa
        $this->db->select('*');
        if($sort=="price-asc"){
            $this->db->order_by('price','ASC');
        }
        if($sort=='price-desc'){
            $this->db->order_by('price','DESC');
        }
        $dulieu=  $this->db->get('product',$limit,$start) ->result_array();


        $total_category = $this->getAllCategory();

        //Chuyển data về controller

        return array(
            'limit' => $limit,
            'total_record' => $total_record,
            'total_category' => $total_category,
            'dulieu' => $dulieu,
            'total_page'=> $total_page,
            'sort'=>$sort
        );


    }
    public function getDataFromCategory($category,$current_page,$sort){
        //Phân trang Product
        $limit = 2;
        $this->db->select('product.name,product.price,product.color,product.content,product.img');
        $this->db->from('product');
        $this->db->join('category','category.id_category=product.id_category');
        $this->db->where('category.name',$category);
        if($sort=="price-asc"){
            $this->db->order_by('price','ASC');
        }
        if($sort=='price-desc'){
            $this->db->order_by('price','DESC');
        }
        //$this->db->where('id_category',$category) ;
        $data = $this->db->get()-> result_array();
        $total_record = $this->count_record($data);
        $total_page = ceil($total_record/$limit);
        if($current_page>$total_page){
            $current_page = $total_page;
        }else if($current_page<1){
            $current_page=1;
        }
        $start = ($current_page-1) * $limit;
        //Select lần nữa
        $this->db->select('product.name,product.price,product.color,product.content,product.img');
        $this->db->from('product');
        $this->db->join('category','category.id_category=product.id_category');
        $this->db->where('category.name',$category);
        $this->db->limit($limit,$start);
        if($sort=="price-asc"){
            $this->db->order_by('price','ASC');
        }
        if($sort=='price-desc'){
            $this->db->order_by('price','DESC');
        }
        $dulieu = $this->db->get()-> result_array();

        //Show Categories
        $total_category = $this->getAllCategory();

        return array(
            'limit' => $limit,
            'total_record' => $total_record,
            'total_category' => $total_category,
            'dulieu' => $dulieu,
            'total_page'=> $total_page,
            'sort'=>$sort
        );
    }

    public function getDataFromFilter($category, $price, $color){
        //Show Categories
        $total_category = $this->getAllCategory();
        $min_price = $price[0];
        $max_price = $price[1];
        if($category=="all"){
            if(!empty($color)){
                $this->db->select('*');
                $this->db->where("price BETWEEN $min_price and $max_price");
                $this->db->where_in("color",$color);
                $dulieu = $this->db->get('product')->result_array();
            }
            else{
                $this->db->select('*');
                $this->db->where("price BETWEEN $min_price and $max_price");
                $dulieu = $this->db->get('product')->result_array();
            }
        }
        else{
            if(!empty($color)){
                $this->db->select('product.name,product.price,product.color,product.img');
                $this->db->from('product');
                $this->db->join('category','category.id_category=product.id_category');
                $this->db->where('category.name',$category);
                $this->db->where("price BETWEEN $min_price and $max_price");
                $this->db->where_in("color",$color);
                $dulieu = $this->db->get()->result_array();
            }
            else{
                $this->db->select('product.name,product.price,product.color,product.img');
                $this->db->from('product');
                $this->db->join('category','category.id_category=product.id_category');
                $this->db->where('category.name',$category);
                $this->db->where("price BETWEEN $min_price and $max_price");
                $dulieu = $this->db->get()->result_array();
            }
        }

        return array(
            'total_category' => $total_category,
            'dulieu' => $dulieu,
        );
    }

    public function searchProductWithKey($category,$key_word){
        if($category=='all'){
            $this->db->select('*');
            $this->db->like('name',$key_word);
            $dulieu = $this->db->get('product')->result_array();
            $total_category = $this->getAllCategory();

            //Chuyển data về controller
            return array(
                'total_category' => $total_category,
                'dulieu' => $dulieu,
                'key_word'=>$key_word
            );
        }
        else{
            $this->db->select('product.name,product.price,product.color,product.img');
            $this->db->from('product');
            $this->db->join('category','category.id_category=product.id_category');
            $this->db->where('category.name',$category);
            $this->db->like('product.name',$key_word);
            $dulieu = $this->db->get()->result_array();
            $total_category = $this->getAllCategory();

            //Chuyển data về controller
            return array(
                'total_category' => $total_category,
                'dulieu' => $dulieu,
                'key_word'=>$key_word
            );
        }
    }

    public function getDetailProductWithID($id){
        $this->db->select('product.name,product.price,product.color,product.img,product.content,category.name as category,product.thumb_img');
        $this->db->from('product');
        $this->db->join('category','category.id_category=product.id_category');
        $this->db->where('product.id',$id);
        $dulieu = $this->db->get()->result_array();
        $thumb_img = $dulieu[0]['thumb_img'];
        $thumb_img = explode(',',$thumb_img);
        $dulieu[0]['thumb_img']= $thumb_img;
        return $dulieu;
    }
}