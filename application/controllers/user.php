<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'user';
    $data['content'] = 'admin/user_list';
    $data['users'] = $this->MUsers->get_all();
    //$this->session->set_flashdata('message', '');
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('email')) {
      $this->MUsers->create();
      $this->session->set_flashdata('message', 'User created');
      redirect('user', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'user';
      $data['content'] = 'admin/user_entry';
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function edit($id=0) {
    if ($this->input->post('email')) {
      $this->MUsers->update();
      $this->session->set_flashdata('message', 'User updated');
      redirect('user', 'refresh');
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'user';
      $data['content'] = 'admin/user_edit';
      $data['user'] = $this->MUsers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/dashboard');
    }
  }

  function delete() {
    $this->MUsers->delete($this->input->post('id'));
    echo "<h1>User deleted.</h1>";
  }

}
