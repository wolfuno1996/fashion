<?php
class Home extends MX_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
    }
    public function index(){
        $_SESSION['menu'] = 'home';
        $this->load->view('Home_view');
    }

}