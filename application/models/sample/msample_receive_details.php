<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSample_receive_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('sample_receive_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_by_receive_id($receive_id) {
    $this->db->where('receive_id', $receive_id);
    $q = $this->db->get('sample_receive_details');
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
    $q = $this->db->get('sample_receive_details');
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
    $this->db->insert('sample_receive_details', $data);
  }

  function delete_by_receive_id($receive_id) {
    $this->db->where('receive_id', $receive_id);
    $this->db->delete('sample_receive_details');
  }
  
  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('sample_receive_details');
  }

}
