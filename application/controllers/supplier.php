<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Supplier extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'supplier';
    $data['content'] = 'admin/supplier_list';
    $data['suppliers'] = $this->MSuppliers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('fname')) {
      $this->MSuppliers->create();
      $this->session->set_flashdata('message', 'Supplier created');
      redirect('supplier', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'supplier';
      $data['content'] = 'admin/supplier_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit($id=0) {
    if ($this->input->post('fname')) {
      $this->MSuppliers->update();
      $this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'supplier';
      $data['content'] = 'admin/supplier_edit';
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete() {
    $this->MSuppliers->delete($this->input->post('id'));
    echo "<h1>Supplier deleted.</h1>";
  }

}

?>
