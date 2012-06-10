<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Homepage extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'home';
    $data['content'] = 'home';
    $this->load->vars($data);
    $this->load->view('template');
  }

  function login() {
    if ($this->input->post('email')) {
      $this->form_validation->set_rules('email', 'Username', 'trim|required|valid_email|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() == TRUE) {
        $email = $this->input->post('email');
        $pw = substr(do_hash($this->input->post('password')), 0, 16);
        $this->MUsers->verify($email, $pw);

        if ($this->session->userdata('user_id')) {
          redirect('finish_inventory', 'refresh');
        } else {
          redirect('homepage', 'refresh');
        }
      } else {
        $data['title'] = 'Welcome to Sales Distribution System.';
        $data['menu'] = 'home';
        $data['content'] = 'homepage';
        $this->load->vars($data);
        $this->load->view('template');
      }
    } else {
      $data['title'] = 'Welcome to Sales Distribution System.';
      $data['menu'] = 'home';
      $data['content'] = 'homepage';
      $this->load->vars($data);
      $this->load->view('template');
    }
  }

  function logout() {
    $data = array();
    $data['user_id'] = $this->session->userdata('user_id');
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();

    $this->session->set_flashdata('error', "Successfully loged out!");
    redirect('homepage', 'refresh');
  }

  function about() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'about';
    $data['content'] = 'about';
    $this->load->vars($data);
    $this->load->view('template');
  }

  function contact() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'contact';
    $data['content'] = 'contact';
    $this->load->vars($data);
    $this->load->view('template');
  }

}