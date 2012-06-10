<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Raw_inventory extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  //Raw Item Part Start-----
  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'raw_inventory';
    $data['content'] = 'admin/raw/item_list';
    $data['raw_items'] = $this->MRaw_items->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_item() {
    if ($this->input->post('code')) {
      $this->MRaw_items->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('raw_inventory', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/item_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_item($id=0) {
    if ($this->input->post('name')) {
      $this->MRaw_items->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('item', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'settings';
      $data['content'] = 'admin/item_edit';
      $data['item'] = $this->MItems->get_by_id($id);
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_item() {
    $this->MRaw_items->delete($this->input->post('id'));
    echo "<h1>Raw Item deleted.</h1>";
  }
  //Raw Item Part End-------
  
  //Raw Receive Part Start--
  function receive_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'raw_inventory';
    $data['content'] = 'admin/raw/receive_list';
    $data['receive_master'] = $this->MRaw_receive_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_receive() {
    if ($this->input->post('receive_no')) {
      $id = $this->MRaw_receive_master->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('raw_inventory/add_receive_item/' . $id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/receive_master_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_receive_item($receive_id=0) {
    if ($this->input->post('quantity')) {
      $this->MRaw_receive_details->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('raw_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/receive_details_entry';
      $data['receive_master'] = $this->MRaw_receive_master->get_by_id($receive_id);
      $data['receive_items'] = $this->MRaw_receive_details->get_all_by_receive_id($receive_id);
      $data['raw_items'] = $this->MRaw_items->get_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_receive($receive_id=0) {
    if ($this->input->post('receive_no')) {
      $this->MRaw_receive_master->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('raw_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/receive_master_edit';
      $data['receive_master'] = $this->MRaw_receive_master->get_by_id($receive_id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_receive() {
    $this->MRaw_receive_details->delete_by_receive_id($this->input->post('id'));
    $this->MRaw_receive_master->delete($this->input->post('id'));
    echo "<h1>Raw Item deleted.</h1>";
  }

  function delete_receive_item() {
    $this->MRaw_receive_details->delete($this->input->post('id'));
    echo "<h1>Item deleted.</h1>";
  }
  //Raw Receive Part Start--
  
  //Raw Supply Part Start---
  function supply_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'raw_inventory';
    $data['content'] = 'admin/raw/supply_list';
    $data['supply_master'] = $this->MRaw_supply_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_supply() {
    if ($this->input->post('supply_no')) {
      $id = $this->MRaw_supply_master->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('raw_inventory/add_supply_item/' . $id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/supply_master_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_supply_item($supply_id=0) {
    if ($this->input->post('quantity')) {
      $this->MRaw_supply_details->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('raw_inventory/add_supply_item/' . $this->input->post('supply_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/supply_details_entry';
      $data['supply_master'] = $this->MRaw_supply_master->get_by_id($supply_id);
      $data['raw_items'] = $this->MRaw_items->get_dropdown();
      $data['supply_items'] = $this->MRaw_supply_details->get_all_by_supply_id($supply_id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_supply($supply_id=0) {
    if ($this->input->post('supply_no')) {
      $this->MRaw_supply_master->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('raw_inventory/add_supply_item/' . $this->input->post('supply_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'raw_inventory';
      $data['content'] = 'admin/raw/supply_master_edit';
      $data['supply_master'] = $this->MRaw_supply_master->get_by_id($supply_id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_supply() {
    $this->MRaw_supply_details->delete_by_supply_id($this->input->post('id'));
    $this->MRaw_supply_master->delete($this->input->post('id'));
    echo "<h1>Raw Supply deleted.</h1>";
  }

  function delete_supply_item() {
    $this->MRaw_supply_details->delete($this->input->post('id'));
    echo "<h1>Raw Supply Item deleted.</h1>";
  }
  //Raw Supply Part End-----
  
  //Raw Inventory Report Part Start-----
  function report_by_date() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'raw_inventory';
    $data['content'] = 'admin/raw/inventory_by_date';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }
  
  function report_by_item() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'raw_inventory';
    $data['content'] = 'admin/raw/inventory_by_item';
    $data['raw_items'] = $this->MRaw_items->get_dropdown();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }
  //Raw Inventory Report Part End-------

}