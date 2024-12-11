<?php

class Dictionary extends CI_Controller
{
    public function index()
    {
        $this->load->view("templates/header");
        $this->load->view("dictionary/index");
        $this->load->view("templates/footer");

    }
    public function search()
    {
        if($this->input->server("REQUEST_METHOD") === "POST") {
            $form_data = $this->input->post();

            $q = $this->db->query("select * from webster_dictionary where vocab =?;", $form_data["vocab"]);
            $res = $q->result_array();
            header("content-type:application/json");
            echo json_encode($res);
        }
    }
}
