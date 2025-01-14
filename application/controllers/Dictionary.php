<?php

class Dictionary extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata("auth", 'Not authorized user, login first');
            redirect('user/login');
            exit;
        };
        $this->user_id = $_SESSION['user_id'];
    }

    public function home()
    {

        $this->load->view("templates/header");
        $this->load->view("dictionary/index");
        $this->load->view("templates/footer");

    }

    public function search()
    {
        if ($this->input->server("REQUEST_METHOD") === "POST") {
            $form_data = $this->input->post();

            $q = $this->db->query("select * from webster_dictionary where vocab =?;", $form_data["vocab"]);
            $res = $q->result_array();
            header("content-type:application/json");
            echo json_encode($res);
        }
    }
    public function addcard()
    {
        if ($this->input->server("REQUEST_METHOD") === "POST") {
            $form_data = $this->input->post();
            $this->db->query("INSERT INTO `flashcards` (`term`, `definition`, `user_id`) values (?,?,?)", array($form_data["vocab"],$form_data["def"],$this->user_id));
        }
    }

    public function word_saved()
    {

        if ($this->input->server("REQUEST_METHOD") === "POST") {
            $form_data = $this->input->post();
            $q = $this->db->query("select * from `flashcards` where `term`=? and user_id = ?", array($form_data["term"],$this->user_id));
            $res = $q->result_array();
            if ($res) {

                header("content-type:application/json");
                echo json_encode(array(
                    "exist" => 1,
                ));

            } else {

                header("content-type:application/json");
                echo json_encode(array(
                    "exist" => 0,
                ));

            }
        }

    }
}
