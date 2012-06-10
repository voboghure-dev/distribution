<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Human_resource extends CI_Controller {

  function __construct() {
    parent::__construct();
  }
/* RSM Part Start */
  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'human_resource';
    $data['content'] = 'admin/hr/rsm_list';
    $data['rsm_list'] = $this->MHr_rsm_info->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function rsm_add() {
    if ($this->input->post('code')) {
      $this->MHr_rsm_info->create();
      //$this->session->set_flashdata('message', 'RSM created');
      redirect('human_resource/rsm_add', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'human_resource';
      $data['content'] = 'admin/hr/rsm_entry';
      $rsm = $this->MHr_rsm_info->get_latest();
      $data['code'] = (int)$rsm['code'] + 1;
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function rsm_edit($id=0) {
    if ($this->input->post('fname')) {
      $this->MSuppliers->update();
      //$this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'supplier';
      $data['content'] = 'admin/hr/rsm_edit';
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function rsm_delete() {
    $this->MHr_rsm_info->delete($this->input->post('id'));
    echo "<h1>RSM deleted.</h1>";
  }
/* RSM Part End */
  
/* ASM Part Start */
  function asm_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'human_resource';
    $data['content'] = 'admin/hr/asm_list';
    $data['asm_list'] = $this->MHr_asm_info->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function asm_add() {
    if ($this->input->post('code')) {
      $this->MHr_asm_info->create();
      //$this->session->set_flashdata('message', 'RSM created');
      redirect('human_resource/asm_add', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'human_resource';
      $data['content'] = 'admin/hr/asm_entry';
      $data['rsm_list'] = $this->MHr_rsm_info->get_all_dropdown();
      $asm = $this->MHr_asm_info->get_latest();
      $data['code'] = (int)$asm['code'] + 1;
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function asm_edit($id=0) {
    if ($this->input->post('fname')) {
      $this->MSuppliers->update();
      //$this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'supplier';
      $data['content'] = 'admin/hr/rsm_edit';
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function asm_delete() {
    $this->MHr_asm_info->delete($this->input->post('id'));
    echo "<h1>ASM deleted.</h1>";
  }
/* ASM Part End */
  
/* MPO Part Start */
  function mpo_list() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'human_resource';
    $data['content'] = 'admin/hr/mpo_list';
    $data['mpo_list'] = $this->MHr_mpo_info->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function mpo_add() {
    if ($this->input->post('code')) {
      $this->MHr_mpo_info->create();
      //$this->session->set_flashdata('message', 'MPO created');
      redirect('human_resource/mpo_add', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'human_resource';
      $data['content'] = 'admin/hr/mpo_entry';
      $data['asm_list'] = $this->MHr_asm_info->get_all_dropdown();
      $mpo = $this->MHr_mpo_info->get_latest();
      $data['code'] = (int)$mpo['code'] + 1;
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function mpo_edit($id=0) {
    if ($this->input->post('fname')) {
      $this->MSuppliers->update();
      //$this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'supplier';
      $data['content'] = 'admin/hr/rsm_edit';
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function mpo_delete() {
    $this->MHr_mpo_info->delete($this->input->post('id'));
    echo "<h1>MPO deleted.</h1>";
  }
/* MPO Part End */
}