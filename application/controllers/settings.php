<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Settings extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
  //Item Part Start--------------
  function item_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'settings';
    $data['content'] = 'admin/finish/item_list';
    $data['items'] = $this->MFinish_items->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function item_add() {
    if ($this->input->post('code')) {
      $this->MFinish_items->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('settings/item_add', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/finish/item_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function item_edit($id=0) {
    if ($this->input->post('code')) {
      $this->MFinish_items->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('settings/item_list', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/finish/item_edit';
      $data['item'] = $this->MFinish_items->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function item_delete() {
    $this->MFinish_items->delete($this->input->post('id'));
    echo "<h1>Item deleted.</h1>";
  }

  //Item Part End--------------
  //
  //Customer Part Start--------------
  function customer_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'settings';
    $data['content'] = 'admin/customer_list';
    $data['customers'] = $this->MCustomers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }
  
  function get_customer(){
    echo $this->MCustomers->get_all_by_mpo($this->input->post('id'));
  }

  function customer_add() {
    if ($this->input->post('code')) {
      $this->MCustomers->create();
      //$this->session->set_flashdata('message', 'Customer created');
      redirect('settings/customer_add', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/customer_entry';
      $data['mpo_list'] = $this->MHr_mpo_info->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function customer_edit($id=0) {
    if ($this->input->post('code')) {
      $this->MCustomers->update();
      //$this->session->set_flashdata('message', 'Customer updated.');
      redirect('settings/customer_list', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/customer_edit';
      $data['customer'] = $this->MCustomers->get_by_id($id);
      $data['mpo_list'] = $this->MHr_mpo_info->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function customer_delete() {
    $this->MCustomers->delete($this->input->post('id'));
    echo "<h1>Customer deleted.</h1>";
  }

  //Customer Part End--------------
  //
  //Sales Office Part Start--------------
  function sales_office_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'settings';
    $data['content'] = 'admin/sales_office_list';
    $data['sales_offices'] = $this->MSales_offices->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function sales_office_add() {
    if ($this->input->post('name')) {
      $this->MSales_offices->create();
      redirect('settings/sales_office_list', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/sales_office_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function sales_office_edit($id=0) {
    if ($this->input->post('name')) {
      $this->MEmp_areas->update();
      redirect('settings/area_list', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/sales_office_edit';
      $data['area'] = $this->MEmp_areas->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function sales_office_delete() {
    $this->MEmp_areas->delete($this->input->post('id'));
    echo "<h1>Sales Office deleted.</h1>";
  }

  //Sales Office Part End--------------
}