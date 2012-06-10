<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MFinish_items extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('finish_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_by_code($code) {
    $data = array();
    $this->db->where('code', $code);
    $q = $this->db->get('finish_items');
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
    $q = $this->db->get('finish_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_code($term) {
    $return_arr = array();
    $this->db->like('code', $term, 'after'); 
    $q = $this->db->get('finish_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data['value'] = $row['code'];
        $data['label'] = $row['description'];
        //$data[$row['code']] = $row['description'];
        array_push($return_arr, $data);
      }
    }
    
    $q->free_result();
    return $return_arr;
  }
  
  function get_all_dropdown() {
    $q = $this->db->get('finish_items');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['description'];
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'code' => $this->input->post('code'),
        'description' => $this->input->post('description'),
        'generic_name' => $this->input->post('generic_name'),
        'pack_size' => $this->input->post('pack_size'),
        'trade_price' => $this->input->post('trade_price'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('finish_items', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'code' => $this->input->post('code'),
        'description' => $this->input->post('description'),
        'generic_name' => $this->input->post('generic_name'),
        'pack_size' => $this->input->post('pack_size'),
        'trade_price' => $this->input->post('trade_price')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('finish_items', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('finish_items');
  }

}