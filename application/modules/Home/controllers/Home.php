<?php
class Home extends MX_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('Home_view');
    }
    public function user(){
        echo "thanhdeptrai";
    }
}