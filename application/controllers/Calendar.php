<?php

class Calendar extends CI_Controller
{
    public function index()
    {
        $this->load->view("templates/header");
        $this->load->view("calendar/index");
        $this->load->view("templates/footer");
    }

    public function listEventsAPI()
    {
        $q = "SELECT * FROM `quick_notes` WHERE `due_date` IS NOT NULL";
        $res = $this->db->query($q)->result_array();
        // var_dump($res);
        $arr = array();
        foreach ($res as $r) {
            $i = array();
            $i["id"] = $r["id"];
            if (isset($r["title"]) && !empty($r["title"])) {
                $i["title"] = $r["title"];
            } else {
                // $i["title"] = $r["content"];
                // $i["title"] = "event";
                $i["title"] = substr($r['content'], 0, 30)."...";
            }
            $i["start"] = $r["due_date"];
            array_push($arr, $i);
        }

        // var_dump($arr);
        header("content-type:application/json");
        echo json_encode($arr);

    }
}
