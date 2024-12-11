<?php

class NoteCates extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert("note_cate", $data);
    }
    public function update($id, $data)
    {
        $this->db->update("note_cate", $data, array('id' => $id));
    }
    public function displayWithId($id)
    {
        $res = $this->db->get_where("note_cate", array('id' => $id), 1, 0)->result_array();
        return $res;
    }
    public function list($user_id)
    {
        $res = $this->db->get_where("note_cate", array('user_id' => $user_id))->result_array();
        return $res;
    }
    public function delete($id)
    {
        $this->db->delete("note_cate", array("id" => $id));
    }
}
