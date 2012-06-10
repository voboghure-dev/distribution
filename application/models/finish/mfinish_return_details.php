<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_return_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('finish_return_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_return_id($return_id=0) {
    $data = array();
    $this->db->where('return_id', $return_id);
    $q = $this->db->get('finish_return_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = MFinish_items::get_by_id($row['item_id']);
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
  
  function get_qty_by_return_id($return_id=0) {
    $data = array();
    $this->db->select_sum('quantity');
    $this->db->where('return_id', $return_id);
    $q = $this->db->get('finish_return_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'item_id' => $this->input->post('item_id'),
        'return_id' => $this->input->post('return_id'),
        'quantity' => $this->input->post('quantity'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_return_details', $data);

    return $this->db->insert_id();
  }

  function delete_by_return_id($return_id) {
    $this->db->where('return_id', $return_id);
    $this->db->delete('finish_return_details');
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('finish_return_details');
  }

}