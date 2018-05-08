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

        $data['product'] = $this->Product_model->getDataFromCategory($category);

        $this->load->view('Product_view',$data);
    }

    public function filter_all($category, $price, $color) {

        $mot = $this->input->post('1');
        $hai = $this->input->post('2');
        $ba = $this->input->post('3');

    }
}