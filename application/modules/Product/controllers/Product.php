<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MX_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('Product_view');
    }
}