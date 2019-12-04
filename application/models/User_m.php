<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    function authorize($username, $password) {
        $data = $this->db->get_where('user', array(
                    'username' => $username,
                    'password' => $password
                ))->row();
        return $data;
    }

    public function get_all()
    {
        $data = $this->db->select("user.*,role.name as rolename")
                        ->from("user")
                        ->join('role','user.role_id = role.id','left')
                        ->get()
                        ->result();
        return $data;
    }

    public function insert($data)
    {
        //print_r($this->checkUsername($data['username']));
        //die();
        if ($this->checkUsername($data['username']) == 0){
            $data['password'] = hash('sha512', $data['password']);
            $result = $this->db->insert('user',$data);
            return $result;
        } else {
            return false;
        }

    }

    public function get_by_id($id) {
        $data = $this->db->get_where('user', array('id' => $id))->row();
        return $data;
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $data['password'] = hash('sha512', $data['password']);
        $result = $this->db->update('user', $data);
        return $result;
    }

    public function delete($id) {
        $result = $this->db->delete('user', ['id' => $id]);
        return $result;
    }

    public function checkUsername($username)
    {
        $check = $this->db->from('user')->where('username',$username)->count_all_results();
        return $check;
    }

}
