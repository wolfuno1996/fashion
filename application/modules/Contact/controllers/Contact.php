<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
    }

    public function index(){
        $_SESSION['menu'] = 'contact';
        $this->load->view('Contact_view');

    }
}