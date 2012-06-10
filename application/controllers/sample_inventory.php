<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sample_inventory extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
  
  //Sample Receive Part Start--
  function receive_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sample_inventory';
    $data['content'] = 'admin/sample/receive_list';
    $data['receive_master'] = $this->MSample_receive_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_receive() {
    if ($this->input->post('receive_no')) {
      $id = $this->MSample_receive_master->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('sample_inventory/add_receive_item/' . $id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/receive_master_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_receive_item($receive_id=0) {
    if ($this->input->post('quantity')) {
      $this->MSample_receive_details->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('sample_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/receive_details_entry';
      $data['receive_master'] = $this->MSample_receive_master->get_by_id($receive_id);
      $data['receive_items'] = $this->MSample_receive_details->get_all_by_receive_id($receive_id);
      $data['sample_items'] = $this->MFinish_items->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_receive($receive_id=0) {
    if ($this->input->post('receive_no')) {
      $this->MSample_receive_master->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('sample_inventory/add_receive_item/' . $this->input->post('receive_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/receive_master_edit';
      $data['receive_master'] = $this->MSample_receive_master->get_by_id($receive_id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_receive() {
    $this->MSample_receive_details->delete_by_receive_id($this->input->post('id'));
    $this->MSample_receive_master->delete($this->input->post('id'));
    echo "<h1>Raw Item deleted.</h1>";
  }

  function delete_receive_item() {
    $this->MSample_receive_details->delete($this->input->post('id'));
    echo "<h1>Item deleted.</h1>";
  }
  //Sample Receive Part Start--
  
  //Sample Supply Part Start---
  function supply_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sample_inventory';
    $data['content'] = 'admin/sample/supply_list';
    $data['supply_master'] = $this->MSample_supply_master->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add_supply() {
    if ($this->input->post('supply_no')) {
      $id = $this->MSample_supply_master->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('sample_inventory/add_supply_item/' . $id, 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/supply_master_entry';
      $data['employees'] = $this->MEmp_details->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function add_supply_item($supply_id=0) {
    if ($this->input->post('quantity')) {
      $this->MSample_supply_details->create();
      //$this->session->set_flashdata('message', 'Item created');
      redirect('sample_inventory/add_supply_item/' . $this->input->post('supply_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/supply_details_entry';
      $data['supply_master'] = $this->MSample_supply_master->get_by_id($supply_id);
      $data['sample_items'] = $this->MFinish_items->get_all_dropdown();
      $data['supply_items'] = $this->MSample_supply_details->get_all_by_supply_id($supply_id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit_supply($supply_id=0) {
    if ($this->input->post('supply_no')) {
      $this->MSample_supply_master->update();
      //$this->session->set_flashdata('message', 'Item updated.');
      redirect('sample_inventory/add_supply_item/' . $this->input->post('supply_id'), 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'sample_inventory';
      $data['content'] = 'admin/sample/supply_master_edit';
      $data['supply_master'] = $this->MSample_supply_master->get_by_id($supply_id);
      $data['employees'] = $this->MEmp_details->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete_supply() {
    $this->MSample_supply_details->delete_by_supply_id($this->input->post('id'));
    $this->MSample_supply_master->delete($this->input->post('id'));
    echo "<h1>Sample Supply deleted.</h1>";
  }

  function delete_supply_item() {
    $this->MSample_supply_details->delete($this->input->post('id'));
    echo "<h1>Sample Supply Item deleted.</h1>";
  }
  //Sample Supply Part End-----
  
  //Sample Inventory Report Part Start-----
  function report_by_date() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sample_inventory';
    $data['content'] = 'admin/sample/inventory_by_date';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }
  
  function report_by_item() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'sample_inventory';
    $data['content'] = 'admin/sample/inventory_by_item';
    $data['sample_items'] = $this->MFinish_items->get_all_dropdown();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }
  //Sample Inventory Report Part End-------

}