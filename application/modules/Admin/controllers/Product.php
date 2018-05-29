<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index(){
        $query = $this->Product_model->getData();
        $dulieu['product'] = $query['product'];
        $dulieu['category'] = $query['category'];
        $this->load->view('Product_view',$dulieu);
    }
    public function delete(){
        $id = $this->input->post('id');
        $check = $this->Product_model->deleteProduct($id);
        echo json_encode($check);
    }

    public function showProductFromCategory($category){
        $query = $this->Product_model->getDataFromCategory($category);
        $dulieu['product'] = $query['product'];
        $dulieu['category'] = $query['category'];
        $this->load->view('Product_view',$dulieu);
    }

    public function addProduct(){
        $query = $this->Product_model->getData();
        $dulieu['category'] = $query['category'];
        $this->load->view('AddProduct_view',$dulieu);
    }
}
    ?>