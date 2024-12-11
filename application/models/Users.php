<?php
class Users extends CI_Model{
    

    public function insertOneUser($data){
        
        
        $this->db->insert('users',$data);
    }

    public function searchByUsername($data){
        // print_r($data);
        $res= $this->db->select('*')->where('username',$data)->limit(1)->get('users')->result_array();
        // $query = $this->db->get('users');
        // return $query;
        // print_r($res);
        return $res;
        
    }

    public function searchByEmail($data){
        $res = $this->db->select("*")->where('email',$data)->limit(1)->get('users')->result_array();
        return $res;
    }

    public function searchCurrentUser($id){
        //try to find only one result show. try to find write sql and pass
        $res = $this->db->select("*")->where('id',$id)->limit(1)->get('users')->result_array();

        return $res;
    }

    public function updateCurrentUserFields($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function deactivateUser($id){
        $this->db->where('id',$id);
        $data = array('is_active'=>0);
        $this->db->update('users',$data);
    }

    public function userIsActive($data){
        [$data] = $this->db->select("*")->where('email',$data)->limit(1)->get('users')->result_array();
        return $data['is_active'];
    }
}