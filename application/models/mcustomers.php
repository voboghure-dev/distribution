<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MCustomers extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_by_mpo($mpo_id) {
    $data = "";
    $this->db->where('mpo_id', $mpo_id);
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      $data .= '<select name="customer_id" id="customer_id" style="width: 185px;">';
      foreach ($q->result_array() as $row) {
        $data .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
      }
      $data .= '</select>';
    } else {
      $data .= 'No Customer Added';
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $mpo = $this->MHr_mpo_info->get_by_id($row['mpo_id']);
        $row['mpo_name'] = $mpo['name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_dropdown() {
    $q = $this->db->get('customers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['full_name'];
      }
    } else {
      $data['0'] = 'No Customer Added';
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'mpo_id' => $this->input->post('mpo_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'address' => $this->input->post('address'),
        'phone' => $this->input->post('phone'),
        'introduce' => $this->input->post('introduce'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('customers', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'mpo_id' => $this->input->post('mpo_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'address' => $this->input->post('address'),
        'phone' => $this->input->post('phone'),
        'introduce' => $this->input->post('introduce')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('customers', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('customers');
  }

}