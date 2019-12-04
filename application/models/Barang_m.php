<?php

class Barang_m extends CI_Model
{

    public $name;

    public function __construct()
    {
        //$this->load->database();
    }

    public function get_all()
    {
        $data = $this->db->from("barang")
                        ->get()
                        ->result();
        return $data;
    }

    public function get_by_id($id) {
        $data = $this->db->get_where('barang', array('id' => $id))->row();
        return $data;
    }

    public function insert_entry($post)
    {
        //$this->name    = $name; // please read the below note
        //$this->penerbit  = $penerbit;
        //$this->pengarang     = $pengarang;
        $kode = $post['kode'];
        $name = $post['name'];
        $brand = $post['brand'];
        $type = $post['type'];
        $image = $post['image'];
        $data = array(
            'id' => $kode,
            'name' => $name,
            'brand' => $brand,
            'type' => $type,
            'image' => $image
        );

        $this->db->insert('barang', $data);

        return true;
    }

    public function update_entry($id,$post)
    {
        $name = $post['name'];
        $brand = $post['brand'];
        $type = $post['type'];
        $image = $post['image'];
        $data = array(
            'name' => $name,
            'brand' => $brand,
            'type' => $type,
            'image' => $image
        );

        $this->db->update('barang', $data, array('id' => $id));
        return true;
    }


    public function delete($id) {
        $result = $this->db->delete('barang', ['id' => $id]);
        return $result;
    }

    public function check_duplicate($kode){
        $this->db->from('barang');
        $this->db->where('id', $kode);
        //$this->db->group_by('order_no');//no need group_by as you only want counts
        //$this->db->order_by('order_no', 'DESC');//no need order_by as you only want counts            
        return $this->db->count_all_results();;
    }
}
