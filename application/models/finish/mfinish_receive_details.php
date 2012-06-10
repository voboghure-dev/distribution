<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_receive_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($receive_id) {
    $data = array();
    $q = $this->db->get();
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    } else {
      $data[] = array('name' => 'None', 'price' => '0', 'quantity' => '0');
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_by_receive_id($receive_id) {
    $this->db->where('receive_id', $receive_id);
    $q = $this->db->get('finish_receive_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $item = MFinish_items::get_by_id($row['item_id']);
        $row['item_name'] = $item['description'];
        $data[] = $row;
      }
    }else{
      $data[] = array('item_name' => 'None', 'quantity' => 0, 'id' => 0);
    }

    $q->free_result();
    return $data;
  }
  
  function get_qty_by_receive_id($receive_id){
    $this->db->select_sum('quantity');
    $this->db->where('receive_id', $receive_id);
    $q = $this->db->get('finish_receive_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['quantity'];
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'receive_id' => $this->input->post('receive_id'),
        'item_id' => $this->input->post('item_id'),
        'quantity' => $this->input->post('quantity'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_receive_details', $data);
  }

  function delete($id) {
    $this->db->where('receive_id', $id);
    $this->db->delete('receive_details');
  }

}
