<?php

class Google extends CI_Controller
{
    public function index()
    {



        $this->load->view("templates/header");

        $this->load->view("Google/index");

        $this->load->view("templates/footer");

    }
}
