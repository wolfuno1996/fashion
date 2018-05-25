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
        $_SESSION['menu'] = 'cart';
        $dulieu['cart'] = $this->cart->contents();
        $this->load->view('Cart_view',$dulieu);

    }

    public function show(){
        $dulieu = $this->cart->contents();
        echo json_encode($dulieu);
    }

    public function insert(){
        $id = $this->input->post('id');
        $dulieu = $this->Cart_model->getData($id);
        if($this->cart->insert($dulieu)){
            echo 'Success';
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

    public function delete(){
        $rowID = $_POST['rowID'];

        if($rowID=='all'){
            $this->cart->destroy();
        }
        else{
            $data = array(
                'rowid' => $rowID,
                'qty' => 0
            );
            if($this->cart->update($data)){
                $kq = "Success";
                echo json_encode($kq);
            }
            else{
                echo "Fail";
            }


        }
    }
}