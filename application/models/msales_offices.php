<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSales_offices extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $this->db->limit(1);
    $q = $this->db->get('sales_offices');
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
    $this->db->order_by('id', 'ASC');
    $q = $this->db->get('sales_offices');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_dropdown() {
    $q = $this->db->get('sales_offices');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['name'];
      }
    } else {
      $data['0'] = 'No Sales Office Added';
    }

    $q->free_result();
    return $data;
  }
  
  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'name' => $this->input->post('name'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('sales_offices', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'name' => $this->input->post('name'),
    );

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('sales_offices', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('emp_areas');
  }

}