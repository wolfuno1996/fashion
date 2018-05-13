<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index(){
        $page = 1;
        $sort = $this->input->get('sort');
        if(!isset($sort)){
            $sort='default-sort';
        }
        $query = $this->Product_model->getData(1,$sort);
        $data['product'] = $query['dulieu'];
        $data['total_page'] = $query['total_page'];
        $data['total_category'] = $query['total_category'];
        $data['sort'] = $query['sort'];
        $data['category'] = 'all';
        $data['current_page'] = $page;


        $this->load->view('Product_view',$data);
    }

    public function filter_Cate($category){
        $sort = $this->input->get('sort');
        $page = $this->input->get('page');
        if(!isset($page)){
            $page = 1;
        }
        if(!isset($sort)){
            $sort='default-sort';
        }
        if($category=='all'){

            $query = $this->Product_model->getData($page,$sort);
            $data['product'] = $query['dulieu'];
            $data['total_page'] = $query['total_page'];
            $data['category'] = $category;
            $data['current_page'] = $page;
            $data['total_category'] = $query['total_category'];
            $data['sort'] = $query['sort'];
            $data['limit'] = $query['limit'];
            $data['total_record'] = $query['total_record'];
        }
        else{
            $query = $this->Product_model->getDataFromCategory($category,$page,$sort);
            $data['product'] = $query['dulieu'];
            $data['total_page'] = $query['total_page'];
            $data['category'] = $category;
            $data['current_page'] = $page;
            $data['total_category'] = $query['total_category'];
            $data['sort'] = $query['sort'];
            $data['limit'] = $query['limit'];
            $data['total_record'] = $query['total_record'];
        }
        $this->load->view('Product_view',$data);
    }

    public function filter_all($category, $price, $color) {
        if($color!=null){
            $color = base64_decode($color);
            $color =  json_decode($color);
        }
        $price = base64_decode($price);
        $price =  json_decode($price);

        $query = $this->Product_model->getDataFromFilter($category, $price, $color);
        $data['product'] = $query['dulieu'];
        $data['total_category'] = $query['total_category'];
        $price = implode(" -> ",$price);
        if($color!=null) {
            $color = implode(" | ",$color);
        }
        else{
            $color = 'all color';
        }

        $data['price'] = $price;
        $data['color'] = $color;
        $data['category'] = $category;
        $this->load->view('Product_view',$data);
    }

    public function searchProduct($category,$key_word){
        $query = $this->Product_model->searchProductWithKey($category,$key_word);
        $data['product'] = $query['dulieu'];
        $data['key_word'] = $query['key_word'];
        $data['category'] = $category;
        $data['total_category'] = $query['total_category'];
        $this->load->view('Product_view',$data);
    }

}