<?php

class QuickNotes extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("quick_notes", $data);
    }
    public function update($id, $data)
    {
        $this->db->update("quick_notes", $data, array('id' => $id));
    }
    public function displayWithId($id)
    {
        $res = $this->db->get_where("quick_notes", array('id' => $id), 1, 0)->result_array();
        return $res;
    }
    public function list($user_id)
    {

        $this->db->select("*");
        $this->db->from("quick_notes");
        $this->db->where(array('user_id' => $user_id));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function delete($id)
    {
        $this->db->delete("quick_notes", array("id" => $id));
    }
    public function listWithCate($id, $c_id)
    {
        $data = [
            "user_id" => $id,
            "cate_id" => $c_id
        ];


        $this->db->select("*");
        $this->db->from("quick_notes");
        $this->db->where($data);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();


        // $res = $this->db->get_where("quick_notes", $data)->order_by('id', 'DESC')->result_array();
        // return $res;

    }
}
