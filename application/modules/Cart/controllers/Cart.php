<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->library("cart");
        $this->load->helper('form');
    }

    public function index(){

        $dulieu['cart'] = $this->cart->contents();
        $this->load->view('Cart_view',$dulieu);

    }

    public function insert(){
        $id = $this->input->post('id');
        $dulieu = $this->Cart_model->getData($id);
        if($this->cart->insert($dulieu)){
            echo "Succses";
        }else{
            echo "Fail";
        }
    }
    public function update_cart(){
        $cart_info = $_POST['cart'];

        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);

        }
        redirect('cart');
    }
}