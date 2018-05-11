<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index($page){
        $query = $this->Product_model->getData(1);
        $data['product'] = $query['dulieu'];
        $data['total_page'] = $query['total_page'];
        $data['total_category'] = $query['$total_category'];
        $data['category'] = 'all';
        $data['current_page'] = $page;

        $this->load->view('Product_view',$data);
    }

    public function filter_Cate($category,$page){
        if($category=='all'){
            $query = $this->Product_model->getData($page);
            $data['product'] = $query['dulieu'];
            $data['total_page'] = $query['total_page'];
            $data['category'] = $category;
            $data['current_page'] = $page;
            $data['total_category'] = $query['$total_category'];
        }
        else{
            $query = $this->Product_model->getDataFromCategory($category,$page);
            $data['product'] = $query['dulieu'];
            $data['total_page'] = $query['total_page'];
            $data['category'] = $category;
            $data['current_page'] = $page;
            $data['total_category'] = $query['$total_category'];
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
        $data['product'] = $this->Product_model->getDataFromFilter($category, $price, $color);
        $data['category'] = $category;
        $this->load->view('Product_view',$data);
    }

    public function searchProduct($category,$key_word){
        $query = $this->Product_model->searchProductWithKey($category,$key_word);
        $data['product'] = $query['dulieu'];
        $data['key_word'] = $query['key_word'];
        $data['category'] = $category;
        $data['total_category'] = $query['$total_category'];
        $this->load->view('Product_view',$data);
    }

}