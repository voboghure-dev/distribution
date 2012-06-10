<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Report extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'Welcome to Sales Distribution System.';
    $data['menu'] = 'report';
    $data['content'] = 'admin/report_home';
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

}