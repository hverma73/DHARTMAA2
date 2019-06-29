<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
    }

    public function getData()
    {
        $id = $this->session->userdata("userId");
        $query = $this->db->query("SELECT * FROM userdetails WHERE userId='$id'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function checkout(){
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_rules('customername','Customer Name','required');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('mobileNo','Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == TRUE) {

            $result = array(
                "order_no" => date('dmYHis'),
                "customername" => $this->input->post('customername'),
                "email" => $this->input->post('email'),
                "address" => $this->input->post('address'),
                "mobile" => $this->input->post('mobileNo'),
            );
            $resp = $this->my_model->checkout($result);
            if ($resp == TRUE) {
                $this->session->set_flashdata('alertMsg', 'Data inserted successfully.');
                $this->cart->destroy();
                redirect('home/thank');
            } else {
                $this->session->set_flashdata('alertMsg', 'Data not inserted successfully.');
                redirect('home/checkout');
            }
        }
        $this->load->view('home/checkout');
    }

    public function index(){
        $this->load->view('home/front');
    }

    public function buy(){
        $id = $this->session->userdata("email");
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE) {

            $result = array(
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'),
            );
            // print_r($result);
            // die("HELLO");
            $resp = $this->my_model->login($result);
            if ($resp == TRUE) {
                $this->session->set_userdata("userData", $resp[0]["email"]);
                $this->session->set_flashdata('alertMsg', 'Data inserted successfully.');

                redirect('home/product');
            } else {
                $this->session->set_flashdata('alertMsg', 'Data not inserted successfully.');
                redirect('home/buy');
            }
        }
        $this->load->view('home/index');
    }

    public function item($id = ''){
        if($_REQUEST['id']){
           $id = $_REQUEST['id'];
           $data = $this->my_model->item_1($id);
           echo json_encode($data);
       }

   }

   public function itemGetAll(){
    $data = $this->my_model->itemGetAll();
    echo json_encode($data);
}

public function copyItem()
{
    $data = $this->my_model->copyItem();
    echo json_encode($data);
}

public function login()
{
        die("HELLO");
        
}

public function signup()
{
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        //$this->form_validation->set_rules('Confirmpassword', 'Confirm password', 'required|matches[password]');
    $this->form_validation->set_rules('password', 'Password', 'required');
        //$this->form_validation->set_rules('Confirmpassword', 'Confirm password', 'required|matches[password]');
    $this->form_validation->set_rules('mobileNo', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
    if ($this->form_validation->run() == TRUE) {
        $result = array(
            "firstname" => $this->input->post('firstname'),
            "lastname" => $this->input->post('lastname'),
            "email" => $this->input->post('email'),
            "password" => $this->input->post('password'),
            "mobileNo" => $this->input->post('mobileNo'),
        );
        $resp = $this->my_model->signup($result);
        if ($resp == TRUE) {
            $this->session->set_flashdata('alertMsg', 'Data inserted successfully.');
            redirect('home/buy');
        } else {
            $this->session->set_flashdata('alertMsg', 'Data not inserted successfully.');
            redirect('home/signup');
        }
    }
    $this->load->view('home/signup');
}

public function dharti()
{
    $this->load->view('home/front');
}


public function description($id = ''){
    $data['item'] = $this->my_model->getData($id);
    $this->load->view('home/description', $data);
}

public function add()
{
    if ($_REQUEST['id']) {
        $id = $_REQUEST['id'];
        $item_name = $_REQUEST['item_name'];
        $rate = $_REQUEST['rate'];
        $qty = $_REQUEST['qty'];

        $insert_data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $rate,
            'name'    => $item_name
        );
        $cart = $this->cart->insert($insert_data);
        if($cart){
            $cart_check = $this->cart->contents();
            $total = 0;
            $subtotal = array();
            $table = '<table class="table table-hover table-bordered">
            <thead>
            <tr>
            <th>Quantity</th>
            <th>Item Name</th>
            <th>Item Price</th>
            </tr>
            </thead>';
            foreach ($cart_check as $key => $value) {
                $total = $total + $value['subtotal'];
                $subtotal[] = $total;
                $table .= '<tbody id="cart_content">
                <tr>
                <th>'.$value['qty'].'</th>
                <th>'.$value['name'].'</th>
                <th><i class="fa fa-inr text_red"></i>'.$value['price'].'</th>
                </tr>
                </tbody>';
            }
            $table .= '<tfoot>
            <tr>
            <th colspan="3" align="right">
            Total: &nbsp;<i class="fa fa-inr text_red"></i>'.max($subtotal).'
            <input type="hidden" name="sub_total" id="sub_total" value="'.max($subtotal).'">
            </th>
            </tr>
            </tfoot>
            </table>';
            $table .= '<a href="'.base_url().'home/cart" class="btn btn-warning" style="border-radius:0px;margin-bottom:2vh;margin-left:3vw;margin-left: 10px;">View Cart</a>';
            $table .= '<a href='.base_url(). 'home/checkout class="btn btn-warning checkout" style="border-radius:0px;margin-bottom:2vh;margin-right:1vw;float:right;background-color: orange;">Proceed to Checkout</a>';
            echo json_encode($table);
        }else{
            echo "false";
        }
    }
}

public function bindCart()
{
    $cart_check = $this->cart->contents();
    $total = 0;
    $subtotal = array();
    $table = '<table class="table table-hover table-bordered">
    <thead>
    <tr>
    <th>Quantity</th>
    <th>Item Name</th>
    <th>Item Price</th>
    </tr>
    </thead>';
    foreach ($cart_check as $key => $value) {
        $total = $total + $value['subtotal'];
        $subtotal[] = $total;
        $table .= '<tbody id="cart_content">
        <tr>
        <th>'.$value['qty'].'</th>
        <th>'.$value['name'].'</th>
        <th><i class="fa fa-inr text_red"></i>'.$value['price'].'</th>
        </tr>
        </tbody>';
    }
    $table .= '<tfoot>
    <tr>
    <th colspan="3" align="right">
    Total: &nbsp;<i class="fa fa-inr text_red"></i>'.max($subtotal).'
    <input type="hidden" name="sub_total" id="sub_total" value="'.max($subtotal).'">
    </th>
    </tr>
    </tfoot>
    </table>';
    $table .= '<a href="'.base_url().'home/cart" class="btn btn-warning" style="border-radius:0px;margin-bottom:2vh;margin-left:3vw;margin-left: 10px;">View Cart</a>';
    $table .= '<a href='.base_url().'home/checkout class="btn btn-warning checkout" style="border-radius:0px;margin-bottom:2vh;margin-right:1vw;float:right;background-color: orange;">Proceed to Checkout</a>';
    echo json_encode($table);
}

public function update(){
    if($_REQUEST['qty']) {
        $rowid = $_REQUEST['rowid'];
        $qty = $_REQUEST['qty'];
    }

    $data = array(
        'rowid' => $rowid,
        'qty'   => $qty
    );

    $cart = $this->cart->update($data);
    if($cart)
    {
        echo "Updated";
    }else {
        echo "not updated";
    }
}

public function remove(){
    if($_REQUEST['rowid']) {
        $rowid = $_REQUEST['rowid'];
    }
    if($rowid==="all"){
        $this->cart->destroy();
    }else{
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
    }
    $cart = $this->cart->update($data);
    if($cart)
    {
        redirect($this);
    }
    else{
        echo "Not Removed";
    }
}

public function test(){
    // $data = array(
    //     'id'      => 'sku_123ABC',
    //     'qty'     => 1,
    //     'price'   => 39.95,
    //     'name'    => 'T-Shirt',
    //     'coupon'         => 'XMAS-50OFF'
    // );

    // $this->cart->update($data);
    // foreach($this->cart->contents() as $items)
    // {
    //     print_r($items);
    // }
    $this->load->view('home/thank');
}

public function cart()
{
    $this->load->view('home/cart');
}

public function product()
{
    $data['category_type'] = $this->my_model->type();
    $data['category'] = $this->my_model->category();
    $data["item"] = $this->my_model->fetch_all();
    $this->load->view('home/product', $data);
}

//     function add()
//     {
//         $this->load->library("cart");
//         $data = array(
//             "id"  => $_POST["id"],
//             "name"  => $_POST["item_name"],
//             "qty"  => $_POST["qty"],
//             "price"  => $_POST["rate"]
//         );
//         $this->cart->insert($data); //return rowid
//         echo $this->view('home/cart');
//     }

//     function load()
//     {
//         echo $this->view('home/cart');
//     }

//     function remove()
//     {
//         $this->load->library("cart");
//         $row_id = $_POST["row_id"];
//         $data = array(
//             'rowid'  => $row_id,
//             'qty'  => 0
//         );
//         $this->cart->update($data);
//         echo $this->view('home/cart');
//     }

//     function clear()
//     {
//         $this->load->library("cart");
//         $this->cart->destroy();
//         echo $this->view('home/cart');
//     }

//     function view()
//     {
//         $this->load->library("cart");
//         $output = '';
//         $output .= '
//   <h3>Shopping Cart</h3><br />
//   <div class="table-responsive">
//    <div align="right">
//     <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
//    </div>
//    <br />
//    <table class="table table-bordered">
//     <tr>
//      <th width="40%">Name</th>
//      <th width="15%">Quantity</th>
//      <th width="15%">Price</th>
//      <th width="15%">Total</th>
//      <th width="15%">Action</th>
//     </tr>

//   ';
//         $count = 0;
//         foreach ($this->cart->contents() as $items) {
//             $count++;
//             $output .= '
//    <tr> 
//     <td>' . $items["name"] . '</td>
//     <td>' . $items["qty"] . '</td>
//     <td>' . $items["price"] . '</td>
//     <td>' . $items["subtotal"] . '</td>
//     <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove</button></td>
//    </tr>
//    ';
//         }
//         $output .= '
//    <tr>
//     <td colspan="4" align="right">Total</td>
//     <td>' . $this->cart->total() . '</td>
//    </tr>
//   </table>

//   </div>
//   ';

//         if ($count == 0) {
//             $output = '<h3 align="center">Cart is Empty</h3>';
//         }
//         return $output;
//     }

public function order()
{
    if ($_REQUEST['id']) {
        $id = $_REQUEST['id'];
        $item_name = $_REQUEST['item_name'];
        $rate = $_REQUEST['rate'];
        $qty = $_REQUEST['qty'];

        $insert_data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $rate,
            'name'    => $item_name
        );
        $cart = $this->cart->insert($insert_data);
    }
}

    public function thank(){
        $this->load->view('home/thank');
    }

    public function logout()
    {
        $this->session->unset_userdata('userData');
        redirect('home/index');
    }

}