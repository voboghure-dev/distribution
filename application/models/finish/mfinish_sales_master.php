<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_sales_master extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('finish_sales_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {

        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_latest() {
    $data = array();
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $q = $this->db->get('finish_sales_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_latest_invoice() {
    $data = array();
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1, 0);
    $q = $this->db->get('finish_sales_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $this->db->order_by('sales_no', 'ASC');
    $q = $this->db->get('finish_sales_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $mpo = $this->MHr_mpo_info->get_by_id($row['mpo_id']);
        $row['employee'] = $mpo['name'];
        $customer = $this->MCustomers->get_by_id($row['customer_id']);
        $row['customer'] = $customer['name'];
        $qty = MFinish_sales_details::get_qty_by_sales_id($row['id']);
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
        'sales_no' => $this->input->post('sales_no'),
        'invoice_no' => $this->input->post('invoice_no'),
        'sales_date' => $this->input->post('sales_date'),
        'mpo_id' => $this->input->post('mpo_id'),
        'customer_id' => $this->input->post('customer_id'),
        'type' => $this->input->post('type'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_sales_master', $data);

    return $this->db->insert_id();
  }

  function update_commission() {
    $data = array(
        'commission' => $this->input->post('commission'),
    );
    $this->db->where('id', $this->input->post('sales_id'));
    $this->db->update('finish_sales_master', $data);
  }
  
  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'sales_no' => $this->input->post('sales_no'),
        'invoice_no' => $this->input->post('invoice_no'),
        'sales_date' => $this->input->post('sales_date'),
        'mpo_id' => $this->input->post('mpo_id'),
        'customer_id' => $this->input->post('customer_id'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->where('id', $sales_id);
    $this->db->update('finish_sales_master', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('finish_sales_master');
  }

}