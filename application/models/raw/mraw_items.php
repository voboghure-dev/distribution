<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MRaw_items extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('raw_items');
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
    $q = $this->db->get('raw_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_dropdown() {
    $data = array();
    $q = $this->db->get('raw_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['name'];
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('raw_items', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('raw_items', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('raw_items');
  }

}