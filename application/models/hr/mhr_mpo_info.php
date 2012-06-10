<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MHr_mpo_info extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $this->db->limit(1);
    $q = $this->db->get('hr_mpo_info');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_latest() {
    $data = array();
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $q = $this->db->get('hr_mpo_info');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_by_asm($asm_id) {
    $data = "";
    $this->db->where('asm_id', $asm_id);
    $q = $this->db->get('hr_mpo_info');
    if ($q->num_rows() > 0) {
      $data .= '<select name="mpo_id" id="mpo_id" style="width: 185px;">';
      foreach ($q->result_array() as $row) {
        $data .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
      }
      $data .= '</select>';
    } else {
      $data .= 'No MPO Added';
    }

    $q->free_result();
    return $data;
  }
  
  function get_areas_group() {
    $data = array();
    $this->db->group_by('zone');
    $q = $this->db->get('hr_mpo_info');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_dropdown() {
    $q = $this->db->get('hr_mpo_info');
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

  function get_all() {
    $data = array();
    //$this->db->order_by('id', 'ASC');
    $q = $this->db->get('hr_mpo_info');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $asm = $this->MHr_asm_info->get_by_id($row['asm_id']);
        $row['asm_name'] = $asm['name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'asm_id' => $this->input->post('asm_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'designation' => $this->input->post('designation'),
        'zone' => $this->input->post('zone'),
        'joining' => $this->input->post('joining'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('hr_mpo_info', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'name' => $this->input->post('name'),
    );

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('hr_mpo_info', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('hr_mpo_info');
  }

}