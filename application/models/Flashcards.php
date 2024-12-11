<?php
class Flashcards extends CI_Model{
    public function insertOne($data){
        $this->db->insert('flashcards',$data);
    }

    public function updateOne($id,$data){
        $this->db->update('flashcards',$data,array('id'=>$id));
    }

    public function displayOne($id){
        $res = $this->db->get_where('flashcards',array('id'=>$id),1,0)->result_array();
        return $res;

    }

    public function displayOneOffset($offset, $user_id){
        $res = $this->db->where('user_id',$user_id)->get('flashcards',1,$offset)->result_array();
        return $res;
    }

    public function countAll($user_id){
        $res = $this->db->where('user_id',$user_id)->count_all_results('flashcards');
        return $res;
    }

    public function displayAll($user_id){
        $res = $this->db->where('user_id',$user_id)->get('flashcards')->result_array();
        return $res;
    }

    public function deleteOne($id){
        $this->db->delete('flashcards',array('id'=>$id));

    }
    public function disable($id){
        $data = array(
            "is_active"=> 0,
        );
        $this->db->update('flashcards',$data,array('id'=>$id));
    }

    public function queryAllFlashWithCate($user_id){
        $query = "select f.id, f.term, f.definition, fc.name category_name from flashcards f LEFT join flashcard_categories fc on f.category_id = fc.id where f.user_id = ?;";
        $res = $this->db->query($query,array($user_id))->result_array();
        return $res;

    }

    public function flashWithCateOffset($offset,$user_id){
        $query = "select f.id, f.term, f.definition, fc.name category_name from flashcards f LEFT join flashcard_categories fc on f.category_id = fc.id where f.user_id = ? LIMIT 1 OFFSET ?;";
        $res = $this->db->query($query,array($user_id,$offset))->result_array();
        return $res;
    }

    public function displayWithCateId($user_id,$category_id){
        $array = array('user_id' => $user_id, 'category_id' => $category_id);
        $res = $this->db->where($array)->get('flashcards')->result_array();
        
        return $res;
    }
}