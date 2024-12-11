<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public $user_id;
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])) {
            // $this->session->set_flashdata("auth", 'Not authorized user, login first');
            redirect('user/login', 'refresh');
            exit;
        };
        $this->user_id = $_SESSION['user_id'];
    }
    public function index()
    {
        $query = $this->db->query("select count(*) countall from flashcards where user_id=?;", $this->user_id);
        [$res] = $query->result_array();
        $f = $res['countall'];

        $query = $this->db->query("select count(*) countall from quick_notes where user_id=?;", $this->user_id);
        [$res] = $query->result_array();
        $n = $res['countall'];

        $data = array(
            'total_flash' => $f,
            'total_notes' => $n,
    );


        $this->load->view('templates/header');
        $this->load->view('welcome_message', $data);
        $this->load->view('templates/footer');
    }
}
