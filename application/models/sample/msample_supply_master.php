<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSample_supply_master extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('sample_supply_master');
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
    $q = $this->db->get('sample_supply_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $qty = MSample_supply_details::get_qty_by_supply_id($row['id']);
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
        'supply_no' => $this->input->post('supply_no'),
        'supply_date' => $this->input->post('supply_date'),
        'emp_id' => $this->input->post('emp_id'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('sample_supply_master', $data);
    
    return $this->db->insert_id();
  }
  
  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'supply_no' => $this->input->post('supply_no'),
        'supply_date' => $this->input->post('supply_date'),
        'emp_id' => $this->input->post('emp_id')
    );

    $this->db->where('id', $this->input->post('supply_id'));
    $this->db->update('sample_supply_master', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('sample_supply_master');
  }

}
