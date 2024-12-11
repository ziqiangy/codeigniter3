<?php

class Group extends CI_Controller
{
    public function insert()
    {
        if($this->input->server('REQUEST_METHOD') == "GET") {
            $query_users = $this->db->query("SELECT * FROM `users`");
            $users = $query_users->result_array();

            $this->load->view("templates/header");
            $this->load->view("group/insert", array("users" => $users));
            $this->load->view("templates/footer");
        } elseif($this->input->server("REQUEST_METHOD") == "POST") {
            // var_dump($this->input->post());
            $form_data = $this->input->post();
            $this->db->query("INSERT INTO `group` (name) VALUES (?)", $form_data['name']);
            $query_groupid = $this->db->query("SELECT LAST_INSERT_ID();");
            $groupid_arr = $query_groupid->result_array();
            $groupid = $groupid_arr[0]["LAST_INSERT_ID()"];
            // var_dump($g roupid);
            foreach($form_data['user_id'] as $uid) {
                $this->db->query("INSERT INTO `group_user` (`group_id`,`user_id`) VALUES (?,?)", array($groupid,$uid));
            }

        }
    }
}
