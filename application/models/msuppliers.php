<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MSuppliers extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_by_name($id) {
    //$data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row['fname'];
      }
    }

    $q->free_result();
    return $data;
  }

  function getSupplierNameByPurchaseID($id) {
    //$data = array();
    $this->db->select('suppliers.id, suppliers.fname');
    $this->db->from('suppliers');
    $this->db->join('purchase_master', 'suppliers.id=purchase_master.supplier_id');
    $this->db->where('purchase_master.id', $id);
    $q = $this->db->get();
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
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all_dropdown() {
    $q = $this->db->get('suppliers');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['fname'];
      }
    } else {
      $data['0'] = 'No Supplier Added';
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'fname' => $this->input->post('fname'),
        'email' => $this->input->post('email'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('suppliers', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'fname' => $this->input->post('fname'),
        'email' => $this->input->post('email'),
        'edate' => date('Y-m-d')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('suppliers', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('suppliers');
  }

}