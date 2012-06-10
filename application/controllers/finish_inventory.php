<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Finish_inventory extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  //Sales Part Start---------------
  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sales';
    $data['content'] = 'admin/finish/sales_list';
    $data['sales'] = $this->MFinish_sales_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_sales() {
    if ($this->input->post('sales_no')) {
      $sales_id = $this->MFinish_sales_master->create();
      redirect('finish_inventory/add_sales_item/' . $sales_id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales';
      $data['content'] = 'admin/finish/sales_master_entry';
      $last_invoice = $this->MFinish_sales_master->get_latest();
      $invoice = $last_invoice['invoice_no'];
      $c_date = date('d');
      $split = substr($invoice, 6, 2);
      if ($c_date == $split) {
        $inv = substr($invoice, 8);
        $tail = (int) $inv + 1;
        $invoice_no = date('Ymd') . $tail;
      } else {
        $invoice_no = date('Ymd') . '1';
      }
      $data['invoice_no'] = $invoice_no;
      $data['sales_no'] = $last_invoice['sales_no'] + 1;
      $data['sales_offices'] = $this->MSales_offices->get_all();
      $data['asm_list'] = $this->MHr_asm_info->get_all();
      $data['mpo_list'] = $this->MHr_mpo_info->get_all();
      $data['customer_list'] = $this->MCustomers->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_sales_item($sales_id=0) {
    if ($this->input->post('sales_id')) {
      $item = $this->MFinish_items->get_by_code($this->input->post('item_id'));

      $this->MFinish_sales_details->create($item['trade_price']);
      redirect('finish_inventory/add_sales_item/' . $this->input->post('sales_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales';
      $data['content'] = 'admin/finish/sales_details_entry';
      $data['sales_master'] = $this->MFinish_sales_master->get_by_id($sales_id);
      $data['sales_details'] = $this->MFinish_sales_details->get_by_sales_id($sales_id);
      $data['sales_offices'] = $this->MSales_offices->get_all();
      $data['asm_list'] = $this->MHr_asm_info->get_all();
      $data['mpo_list'] = $this->MHr_mpo_info->get_all();
      $data['customer_list'] = $this->MCustomers->get_all();
      $data['items'] = $this->MFinish_items->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function complete_sales() {
    $this->MFinish_sales_master->update_commission();
    redirect('finish_inventory', 'refresh');
  }

  function get_mpo() {
    echo $this->MHr_mpo_info->get_all_by_asm($this->input->post('id'));
  }
  
  function get_item_code() {
    $return_arr = $this->MFinish_items->get_all_code($this->input->post('term'));
    echo json_encode($return_arr);
  }

  function edit_sales($id=0) {
    if ($this->input->post('sales_id')) {
      $this->MFinish_sales_master->update();
      redirect('finish_inventory/add_sales_item/' . $this->input->post('sales_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales';
      $data['content'] = 'admin/finish/sales_master_edit';
      $data['sales'] = $this->MFinish_sales_master->get_by_id($id);
      $data['customers'] = $this->MCustomers->get_all_dropdown();
      $data['employees'] = $this->MEmp_details->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_sales_item($sales_id, $id) {
    $this->MFinish_sales_details->delete($id);
    redirect('finish_inventory/add_sales_item/' . $sales_id, 'refresh');
  }

  function delete_sales() {
    $this->MFinish_sales_details->delete_by_sales_id($this->input->post('id'));
    $this->MFinish_sales_master->delete($this->input->post('id'));
    echo "<h1>Sales deleted.</h1>";
  }

  //Sales Part End-------------------
  //
  //Return Part Start---------------
  function return_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sales_return';
    $data['content'] = 'admin/finish/return_list';
    $data['returns'] = $this->MFinish_return_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_return() {
    if ($this->input->post('return_no')) {
      $return_id = $this->MFinish_return_master->create();
      redirect('finish_inventory/add_return_item/' . $return_id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales_return';
      $data['content'] = 'admin/finish/return_master_entry';
      $data['employees'] = $this->MEmp_details->get_all_dropdown();
      $data['customers'] = $this->MCustomers->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_return_item($return_id=0) {
    if ($this->input->post('return_id')) {
      $this->MFinish_return_details->create();
      redirect('finish_inventory/add_return_item/' . $this->input->post('return_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales_return';
      $data['content'] = 'admin/finish/return_details_entry';
      $data['return_master'] = $this->MFinish_return_master->get_by_id($return_id);
      $data['return_details'] = $this->MFinish_return_details->get_by_return_id($return_id);
      $data['items'] = $this->MFinish_items->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_return($id=0) {
    if ($this->input->post('return_id')) {
      $this->MFinish_sales_master->update();
      redirect('finish_inventory/add_return_item/' . $this->input->post('return_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sales_return';
      $data['content'] = 'admin/finish/return_master_edit';
      $data['return'] = $this->MFinish_return_master->get_by_id($id);
      $data['customers'] = $this->MCustomers->get_all_dropdown();
      $data['employees'] = $this->MEmp_details->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_return_item() {
    $this->MFinish_return_details->delete($this->input->post('id'));
    echo "<h1>Return item deleted.</h1>";
  }

  function delete_return() {
    $this->MFinish_return_details->delete_by_return_id($this->input->post('id'));
    $this->MFinish_return_master->delete($this->input->post('id'));
    echo "<h1>Return deleted.</h1>";
  }

  //Return Part End-------------------
  //
  //Receive Part Start---------------
  function receive_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'receive';
    $data['content'] = 'admin/finish/receive_list';
    $data['finish_receives'] = $this->MFinish_receive_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_receive() {
    if ($this->input->post('receive_no')) {
      $receive_id = $this->MFinish_receive_master->create();
      redirect('finish_inventory/add_receive_item/' . $receive_id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'receive';
      $data['content'] = 'admin/finish/receive_master_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_receive_item($receive_id=0) {
    if ($this->input->post('quantity')) {
      $this->MFinish_receive_details->create();
      redirect('finish_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'receive';
      $data['receive_master'] = $this->MFinish_receive_master->get_by_id($receive_id);
      $data['receive_items'] = $this->MFinish_receive_details->get_all_by_receive_id($receive_id);
      $data['finish_items'] = $this->MFinish_items->get_all_dropdown();
      $data['content'] = 'admin/finish/receive_details_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_receive($id=0) {
    if ($this->input->post('receive_no')) {
      $this->MFinish_receive_master->update();
      redirect('finish_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'receive';
      $data['content'] = 'admin/finish/receive_master_edit';
      $data['receive_master'] = $this->MFinish_receive_master->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_receive_item() {
    $id = $this->input->post('id');
    $this->MFinish_receive_details->deletePurchaseItem($id);
    echo "<h1>Purchase item deleted.</h1>";
  }

  function delete_receive() {
    $id = $this->input->post('id');
    $this->MFinish_receive_details->deletePurchaseByPurchaseID($id);
    $this->MFinish_receive_master->deletePurchaseSupplier($id);
    echo "<h1>Purchase deleted.</h1>";
  }

  //Receive Part End---------------
}