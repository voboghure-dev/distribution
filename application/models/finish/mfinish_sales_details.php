<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_sales_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('finish_sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_sales_id($sales_id=0) {
    $data = array();
    $this->db->where('sales_id', $sales_id);
    $q = $this->db->get('finish_sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = MFinish_items::get_by_code($row['item_id']);
        $row['name'] = $item['description'];
        $row['trade_price'] = $item['trade_price'];
        $data[] = $row;
      }
    } else {
      $data[] = array('name' => 'None', 'trade_price' => '0', 'quantity' => '0', 'id' => '0');
    }

    $q->free_result();
    return $data;
  }
  
  function get_qty_by_sales_id($sales_id=0) {
    $data = array();
    $this->db->select_sum('quantity');
    $this->db->where('sales_id', $sales_id);
    $q = $this->db->get('finish_sales_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create($item_price) {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'item_id' => strtoupper($this->input->post('item_id')),
        'sales_id' => $this->input->post('sales_id'),
        'quantity' => $this->input->post('quantity'),
        'bonus_qty' => $this->input->post('bonus_qty'),
        'unit_price' => $item_price,
        'vat' => $this->input->post('vat'),
        'total_price' => ($this->input->post('quantity') * $item_price * $this->input->post('vat'))/100 + ($this->input->post('quantity') * $item_price),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_sales_details', $data);

    return $this->db->insert_id();
  }

  function delete_by_sales_id($sales_id) {
    $this->db->where('sales_id', $sales_id);
    $this->db->delete('finish_sales_details');
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('finish_sales_details');
  }

}