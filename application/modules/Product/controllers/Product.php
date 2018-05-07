<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->model('Product_model');
        $data['product'] = $this->Product_model->getData();
        $this->load->view('Product_view',$data);
    }
}