<?php

class Quicknote extends CI_Controller
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
        $this->load->model("QuickNotes");
        $this->load->model("NoteCates");
    }

    public function insert()
    {
        if ($this->input->server("REQUEST_METHOD") == "GET") {
            $query_note_cate = $this->db->query("select * from `note_cate` where `user_id`=?", $this->user_id);
            $note_cate_res = $query_note_cate->result_array();
            $this->load->view("templates/header");
            $this->load->view("quicknote/insert", array("data" => $note_cate_res));
            $this->load->view('templates/footer');

        } elseif ($this->input->server("REQUEST_METHOD") == "POST") {
            $form_data = $this->input->post();


            $filtered_data = array();
            foreach ($form_data as $k => $v) {
                if ($v == "") {
                    continue;
                }
                $filtered_data[$k] = $v;
            }
            $filtered_data['user_id'] = $this->user_id;
            $filtered_data['is_active'] = "1";

            $this->QuickNotes->insert($filtered_data);
            redirect("quicknote/list");
        }
    }

    public function update($id = null)
    {
        if ($this->input->server("REQUEST_METHOD") == "GET") {
            $query = $this->db->query("select * from `note_cate` where `user_id`=?", $this->user_id);
            $note_cates = $query->result_array();
            $no_cate = array('id' => 0,'name' => 'No Cateogry');
            $note_cates[] = $no_cate;
            [$data] = $this->QuickNotes->displayWithId($id);

            // var_dump($data);
            // exit;


            $pass_d = array("note_cates" => $note_cates,"data" => $data);
            $this->load->view("templates/header");
            $this->load->view("quicknote/update", $pass_d);
        } elseif ($this->input->server("REQUEST_METHOD") == "POST") {
            $form_data = $this->input->post();
            // $this->load->model("FlashCategories");

            // $filtered_data = array();
            // foreach($form_data as $k => $v) {
            //     if($v == "") {
            //         continue;
            //     }
            //     $filtered_data[$k] = $v;
            // }
            $form_data['update_time'] = date('Y-m-d H:i:s');

            $this->QuickNotes->update($form_data["id"], $form_data);
            redirect("quicknote/list");
        }
    }
    public function list()
    {
        if ($this->input->server("REQUEST_METHOD") == "GET") {

            $res_n = $this->QuickNotes->list($this->user_id);
            $res_c = $this->NoteCates->list($this->user_id);

            $data = [
                "note" => $res_n,
                "cate" => $res_c,
                "display" => "content",
            ];
            $this->load->view("templates/header");
            $this->load->view("quicknote/list", $data);
            $this->load->view('templates/footer');

        } elseif ($this->input->server("REQUEST_METHOD") == "POST") {
            $data = $this->input->post();
            if (isset($data["keyword"]) && !empty($data["keyword"])) {
                //enabled keyword


                if ($data["c_id"] == 0) {
                    //list all categories notes
                    $q = $this->db->query("SELECT * FROM `quick_notes` WHERE `user_id` = ? AND `content` LIKE ? ORDER BY `id` DESC", array($this->user_id,'%'.$data["keyword"].'%'));
                    $res = $q->result_array();
                } else {
                    //list filtered categories notes

                    $q = $this->db->query("SELECT * FROM `quick_notes` WHERE `user_id` = ? AND `cate_id` = ? AND `content` LIKE ? ORDER BY `id` DESC", array($this->user_id,$data["c_id"],'%'.$data["keyword"].'%'));
                    $res = $q->result_array();

                }


            } else {
                //no keyword
                if ($data["c_id"] == 0) {
                    //list all categories notes
                    $res = $this->QuickNotes->list($this->user_id);
                } else {
                    //list filtered categories notes
                    $res = $this->QuickNotes->listWithCate($this->user_id, $data["c_id"]);
                }


            }


            $res_c = $this->NoteCates->list($this->user_id);


            $data = array(
                "note" => $res,
                "cate" => $res_c,
                "c_id" => $data["c_id"],
                "display" => $data["display"],
            );
            $this->load->view("templates/header");
            $this->load->view("quicknote/list", $data);
            $this->load->view('templates/footer');


        }

    }
    public function delete($id)
    {
        $this->QuickNotes->delete($id);
        redirect("quicknote/list");
    }

    public function addNoteCate()
    {
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $user_id = $_SESSION["user_id"];
            $this->load->view("templates/header");
            $this->load->view('notecate/insert', array("user_id" => $user_id));
            $this->load->view('templates/footer');
        } elseif ($this->input->server('REQUEST_METHOD') == "POST") {
            $form_data = $this->input->post();
            $data = array(
                "name" => $form_data['name'],
                "user_id" => $form_data['user_id'],
            );

            $this->db->query("insert into note_cate (name,user_id) values (?,?);", $data);
            redirect("quicknote/insert");


        }
    }



    public function initCate()
    {
        if ($this->input->server("REQUEST_METHOD") == "GET") {
            $this->load->view("templates/header");
            $this->load->view("notecate/initCate");
            $this->load->view("templates/footer");
        }
    }


    public function addInitNoteCate()
    {
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $form_data = $this->input->post();
            $arr = $form_data["notecate"];
            if (isset($arr) && !empty($arr)) {
                foreach ($arr as $i) {

                    $this->db->query("insert into note_cate (name,user_id) values (?,?);", array($i,$this->user_id));

                }
            }
        }

        redirect("/", "refresh");
    }

    public function testpagelist($p = null)
    {
        $sql = "SELECT * FROM `quick_notes` where `user_id` = 1";
        // $pageAt = 1;

        if ($p == null) {
            $pageAt = 1;
        } else {
            $pageAt = $p;
        }
        $limitPerPage = 10;
        //1. count rows

        $new = "count(*)";
        $start = 'SELECT ';
        $end = ' FROM';
        $sql_count = preg_replace('#('.preg_quote($start).')(.*)('.preg_quote($end).')#si', '$1'.$new.'$3', $sql);
        $res = $this->db->query($sql_count)->result_array();
        $row_count = $res[0]['count(*)'];

        //2. count page total numbers;

        $page_count = ceil($row_count / $limitPerPage);

        //3. calculate page option array
        //$c = $pageAt, $m =$pageNum;
        function rangeWithDots($c, $m)
        {
            $current = $c;
            $last = $m;
            $delta = 2;
            $left = $current - $delta;
            $right = $current + $delta + 1;
            $range = array();
            $rangeWithDots = array();
            $l = -1;

            for ($i = 1; $i <= $last; $i++) {
                if ($i == 1 || $i == $last || $i >= $left && $i < $right) {
                    array_push($range, $i);
                }
            }

            for ($i = 0; $i < count($range); $i++) {
                if ($l != -1) {
                    if ($range[$i] - $l === 2) {
                        array_push($rangeWithDots, $l + 1);
                    } elseif ($range[$i] - $l !== 1) {
                        array_push($rangeWithDots, '...');
                    }
                }

                array_push($rangeWithDots, $range[$i]);
                $l = $range[$i];
            }

            return $rangeWithDots;
        }
        $pageOptions = array();
        foreach (rangeWithDots($pageAt, $page_count) as $value) {
            array_push($pageOptions, $value);
        }

        //4. pagination query

        function paginationQuery($query, $pageAt, $limitPerPage)
        {

            $this_page_first_result = ($pageAt - 1) * $limitPerPage;
            $sql = $query." LIMIT ".$this_page_first_result.", ".$limitPerPage;
            return $sql;
        }

        $paged_sql = paginationQuery($sql, $pageAt, $limitPerPage);
        $d = $this->db->query($paged_sql)->result_array();

        $data = array(
            "limitPerPage" => $limitPerPage,
            "pageAt" => $pageAt,
            "pageOptions" => $pageOptions,
            "data" => $d
        );
        $this->load->view("templates/header");
        $this->load->view("quicknote/testpagelist", $data);
        $this->load->view("templates/footer");
    }
}
