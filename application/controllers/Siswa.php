<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('siswa/siswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_siswa' => $row->kd_siswa,
		'nm_siswa' => $row->nm_siswa,
		'nis' => $row->nis,
		'kelamin' => $row->kelamin,
		'agama' => $row->agama,
		'tempat_lahir' => $row->tempat_lahir,
		'email' => $row->email,
		'alamat' => $row->alamat,
		'no_telepon' => $row->no_telepon,
		'password' => $row->password,
	    );
            $this->load->view('siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'kd_siswa' => set_value('kd_siswa'),
	    'nm_siswa' => set_value('nm_siswa'),
	    'nis' => set_value('nis'),
	    'kelamin' => set_value('kelamin'),
	    'agama' => set_value('agama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'email' => set_value('email'),
	    'alamat' => set_value('alamat'),
	    'no_telepon' => set_value('no_telepon'),
	    'password' => set_value('password'),
	);
        $this->load->view('siswa/siswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_siswa' => $this->input->post('nm_siswa',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'kelamin' => $this->input->post('kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'kd_siswa' => set_value('kd_siswa', $row->kd_siswa),
		'nm_siswa' => set_value('nm_siswa', $row->nm_siswa),
		'nis' => set_value('nis', $row->nis),
		'kelamin' => set_value('kelamin', $row->kelamin),
		'agama' => set_value('agama', $row->agama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'email' => set_value('email', $row->email),
		'alamat' => set_value('alamat', $row->alamat),
		'no_telepon' => set_value('no_telepon', $row->no_telepon),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_siswa', TRUE));
        } else {
            $data = array(
		'nm_siswa' => $this->input->post('nm_siswa',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'kelamin' => $this->input->post('kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telepon' => $this->input->post('no_telepon',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Siswa_model->update($this->input->post('kd_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_siswa', 'nm siswa', 'trim|required');
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('kelamin', 'kelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('kd_siswa', 'kd_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-18 16:47:42 */
/* http://harviacode.com */