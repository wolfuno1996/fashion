<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function filter_Cate($name,$id = null){
         if($id){
            $data['product'] = $this->Product_model->getDataFromCategory($id);
        }else{
            $data['product'] = $this->Product_model->getData();
        }
        $this->load->view('Product_view',$data);
    }

    public function filter_all($category, $price, $color) {
        $this->input->get('name_input');
        $this->input->post('1');
        $this->input->post('2');
        $this->input->post('3');
    }
}