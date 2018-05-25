<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
    }

    public function index(){
        $_SESSION['menu'] = 'about';
        $this->load->view('About_view');

    }
}