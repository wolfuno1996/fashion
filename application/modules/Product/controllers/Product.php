<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index(){
        $data['product'] = $this->Product_model->getData();
        $this->load->view('Product_view',$data);
    }
    public function filter_Cate($category){
        if($category=='all'){
            $data['product'] = $this->Product_model->getData();
            $data['category'] = $category;
        }
        else{
            $data['product'] = $this->Product_model->getDataFromCategory($category);
            $data['category'] = $category;
        }


        $this->load->view('Product_view',$data);
    }

    public function filter_all($category, $price, $color) {

        $price = base64_decode($price);
        $color = base64_decode($price);
        $price =  json_decode($price);
        $color =  json_decode($price);
        if($category=="all"){
            if(count($color)<=0){
                echo "color ko co gi";
            }else{
                echo $color;
;            }
        }
    }
}