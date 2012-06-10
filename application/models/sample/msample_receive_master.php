<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSample_receive_master extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('sample_receive_master');
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
    $q = $this->db->get('sample_receive_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $qty = MSample_receive_details::get_qty_by_receive_id($row['id']);
        $row['quantity'] = $qty;
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'receive_no' => $this->input->post('receive_no'),
        'receive_date' => $this->input->post('receive_date'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('sample_receive_master', $data);
    
    return $this->db->insert_id();
  }
  
  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'receive_no' => $this->input->post('receive_no'),
        'receive_date' => $this->input->post('receive_date')
    );

    $this->db->where('id', $this->input->post('receive_id'));
    $this->db->update('sample_receive_master', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('raw_receive_master');
  }

}
