<?php
class FlashCategories extends CI_Model{
    public function insert($data){
        $this->db->insert("flashcard_categories",$data);
    }
    public function update($id,$data){
        $this->db->update("flashcard_categories",$data,array('id'=>$id));
    }
    public function displayWithId($id){
        $res = $this->db->get_where("flashcard_categories",array('id'=>$id),1,0)->result_array();
        return $res;
    }
    public function list($user_id){
        $res = $this->db->get_where("flashcard_categories",array('user_id'=>$user_id))->result_array();
        return $res;
    }
    public function delete($id){
        $this->db->delete("flashcard_categories",array("id"=>$id));
    }
}