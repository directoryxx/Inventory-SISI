<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('barang_m');
        //$this->load->model('role_m');
        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }
    }

    public function index() {
        if (!$this->auth->privilege_check('barang','read')){
            $this->auth->no_access();
            return;
        }
        $user = $this->barang_m->get_all();

        $this->template->load('pages/barang/index', ['data' => $user]);
    }

    public function create() {
        if (!$this->auth->privilege_check('barang','create')){
            $this->auth->no_access();
            return;
        }
        $this->template->load('pages/barang/create');
        //$this->template->load('pages/user/index', ['data' => $user]);
    }

    public function store() {
        if (!$this->auth->privilege_check('barang','create')){
            $this->auth->no_access();
            return;
        }
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpeg|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            //$this->session->set_flashdata('message', 'Upload Gagal');
            //redirect('/barang/create', 'refresh');
        } else {
            $post = $this->input->post();
                
            if ($this->barang_m->check_duplicate($post['kode']) == 0){
                $data =  $this->upload->data();
                $path = "/uploads/" . $data["file_name"];
                $post['image'] = $path;
                //print_r($this->upload->data());
                $result = $this->barang_m->insert_entry($post);
                if ($result) {
                    //print_r($this->upload->data());
                    redirect('/barang', 'refresh');
                }
    
            } else {
                echo "Duplicate ID";
            }

            //$this->view->load_template('pages/upload_success', $data);
        }
        
        
    }

    public function edit($id) {
        if (!$this->auth->privilege_check('barang','update')){
            $this->auth->no_access();
            return;
        }
        //$role = $this->role_m->get_all();
        $user = $this->barang_m->get_by_id($id);
        
        $this->template->load('pages/barang/edit', ['data' => $user]);
    }

    public function update($id) {
        if (!$this->auth->privilege_check('barang','update')){
            $this->auth->no_access();
            return;
        }
        $post = $this->input->post();
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpeg|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            //$this->session->set_flashdata('message', 'Upload Gagal');
            //redirect('/barang/create', 'refresh');
        } else {
            $data =  $this->upload->data();
            $post = $this->input->post();
            $path = "/uploads/" . $data["file_name"];
            $post['image'] = $path;
            //print_r($this->upload->data());
            $result = $this->barang_m->update_entry($id, $post);
            if ($result) {
                //print_r($this->upload->data());
                redirect('/barang', 'refresh');
            } else {
                echo "error";
            }

            //$this->view->load_template('pages/upload_success', $data);
        }
        /*

        $result = $this->user_m->update($id, $post);
        if ($result) {
            redirect('user');
        }
        */
    }
    
    public function delete($id) {
        if (!$this->auth->privilege_check('barang','delete')){
            $this->auth->no_access();
            return;
        }
        $result = $this->barang_m->delete($id);
        if ($result) {
            redirect('barang');
        }
    }
}
