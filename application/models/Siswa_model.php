<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public $table = 'siswa';
    public $id = 'kd_siswa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kd_siswa', $q);
	$this->db->or_like('nm_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('kelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_telepon', $q);
	$this->db->or_like('password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kd_siswa', $q);
	$this->db->or_like('nm_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('kelamin', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_telepon', $q);
	$this->db->or_like('password', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-18 16:47:42 */
/* http://harviacode.com */