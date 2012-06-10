<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_return_master extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('finish_return_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $emp = $this->MEmp_details->get_by_id($row['emp_id']);
        $row['employee'] = $emp['name'];
        $customer = $this->MCustomers->get_by_id($row['customer_id']);
        $row['customer'] = $customer['full_name'];
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $q = $this->db->get('finish_return_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $emp = $this->MEmp_details->get_by_id($row['emp_id']);
        $row['employee'] = $emp['name'];
        $customer = $this->MCustomers->get_by_id($row['customer_id']);
        $row['customer'] = $customer['full_name'];
        $qty = MFinish_return_details::get_qty_by_return_id($row['id']);
        $row['quantity'] = $qty['quantity'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'return_no' => $this->input->post('return_no'),
        'return_date' => $this->input->post('return_date'),
        'emp_id' => $this->input->post('emp_id'),
        'customer_id' => $this->input->post('customer_id'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_return_master', $data);

    return $this->db->insert_id();
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'return_no' => $this->input->post('return_no'),
        'return_date' => $this->input->post('return_date'),
        'emp_id' => $this->input->post('emp_id'),
        'customer_id' => $this->input->post('customer_id')
    );
    $this->db->where('id', $this->input->post('return_id'));
    $this->db->update('finish_return_master', $data);

    return $this->db->insert_id();
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('finish_return_master');
  }

}