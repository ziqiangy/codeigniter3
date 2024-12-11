<?php
class Flashcate extends CI_Controller{
    public $user_id;
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata("auth",'Not authorized user, login first');
            redirect('user/login');
            exit;
        };
        $this->user_id = $_SESSION['user_id'];
        $this->load->model("FlashCategories");
    }

    public function insert(){
        if($this->input->server("REQUEST_METHOD")=="GET"){
            $this->load->view("templates/header");
            $this->load->view("flashcate/insert");
        }elseif($this->input->server("REQUEST_METHOD")=="POST"){
            $form_data = $this->input->post();
            $data = array(
                "user_id" => $this->user_id,
                "name" => $form_data["name"]
            );
            // $this->load->model("FlashCategories");
            $this->FlashCategories->insert($data);
            redirect("flashcate/list");
        }
    }

    public function update($id = NULL){
        if($this->input->server("REQUEST_METHOD")=="GET"){
            // $this->load->model("FlashCategories");
            [$data] = $this->FlashCategories->displayWithId($id);
            $this->load->view("templates/header");
            $this->load->view("flashcate/update",$data);
        }elseif($this->input->server("REQUEST_METHOD")=="POST"){
            $form_data = $this->input->post();
            // $this->load->model("FlashCategories");
            $this->FlashCategories->update($form_data["id"],array("name"=>$form_data["name"]));
            redirect("flashcate/list");
        }
    }
    public function list(){
        $res = $this->FlashCategories->list($this->user_id);
        $this->load->view("templates/header");
        $this->load->view("flashcate/list",array("data"=>$res));
    }
    public function delete($id){
        $this->FlashCategories->delete($id);
        redirect("flashcate/list");
    }

}