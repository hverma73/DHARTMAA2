<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_model extends CI_Model
{

    function fetch_all()
    {
        $query = $this->db->get("item");
        return $query->result_array();
    }

    public function category()
    {
        $query = $this->db->query("SELECT * FROM category");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getData($id = ' '){
        $query = $this->db->query("SELECT * FROM item WHERE id = '$id'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function type()
    {
        $query = $this->db->query( "SELECT * FROM category_type");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    public function item_1($id = '')
    {
        $query = $this->db->query("SELECT * FROM item WHERE id = '$id'");
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function itemGetAll()
    {
        $query = $this->db->query("SELECT * FROM item");
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function copyItem()
    {
        $query = $this->db->query("SELECT * FROM item");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function login($result = '')
    {
        $id = $this->session->userData('email');
        $email = $result['email'];
        $password = $result['password'];
        $query = $this->db->query( "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }

    public function add($id = '')
    {
        $query = $this->db->query("SELECT * FROM item WHERE id = '$id'");
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }

    public function signup($result = '')
    {
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $email = $result['email'];
        $mobileNo = $result['mobileNo'];
        $password = $result['password'];
        $query = $this->db->query("INSERT INTO users VALUES('','$firstname','$lastname', '$email', '$password','$mobileNo')");
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function checkout($result = ''){
        $order_no = $result['order_no'];
        $customername = $result['customername'];
        $email = $result['email'];
        $address = $result['address'];
        $mobileNo = $result['mobile'];
        
        // $query = $this->db->query("INSERT INTO order_header VALUES('','$order_no','$customername', '$email', '$address','$mobileNo')");
        // if ($query) {
        //     return true;
        // } else {
        //     return FALSE;
        // }
        $this->db->trans_begin();

        $this->db->query("INSERT INTO order_header VALUES('','$order_no','$customername', '$email', '$address','$mobileNo')");
        $order_header_Id = $this->db->insert_id();
        foreach ($this->cart->contents() as $items)
            {
                $item_name = $items['name'];
                $quantity = $items['qty'];
                $rate = $items['price'];
                $this->db->query("INSERT INTO order_detail VALUES('','$order_header_Id','$item_name', '$quantity', '$rate')");
            }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    }

}