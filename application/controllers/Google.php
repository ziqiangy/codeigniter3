<?php

class Google extends CI_Controller
{
    public function index()
    {
        $client = new Google\Client();
        $client->setAuthConfig('./secure/client_secret.json');

        $client->addScope('email');
        $client->addScope('profile');


        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);

            $oauth2 = new Google\Service\Oauth2($client);

            $userInfo = $oauth2->userinfo->get();

            // var_dump($userInfo->email, $userInfo->name, $userInfo->id, $userInfo->family_name, $userInfo->given_name, $userInfo->picture);

            // var_dump($userInfo);

            $user_arr = array($userInfo->email, $userInfo->id, $userInfo->family_name, $userInfo->given_name, $userInfo->given_name);

            $sql = "SELECT * FROM users WHERE google_id = ?";
            $query = $this->db->query($sql, array($userInfo->id));
            $row = $query->row();
            if (isset($row)) {
                //login
                $_SESSION['user_id'] = $row->id;
                $_SESSION['username'] = $row->username;


                redirect('/', 'refresh');


            } else {
                //register
                $id = $this->db->query("INSERT INTO `users` (email, google_id, lastname, firstname, username) values (?,?,?,?,?);", $user_arr);
                //SELECT SCOPE_IDENTITY();
                $query = $this->db->query($sql, array($userInfo->id));
                $row = $query->row();
                if (isset($row)) {
                    $_SESSION['user_id'] = $row->id;
                    $_SESSION['username'] = $row->username;

                    $q = $this->db->query("select `status` from `users` where `id`=?;", $_SESSION['user_id']);
                    [$res] = $q->result_array();
                    if ($res['status'] == 'first_register') {
                        $q = $this->db->query("UPDATE `users` SET `status` = 'normal' WHERE `users`.`id` = ?", $_SESSION['user_id']);
                        redirect('quicknote/initCate', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }

                }
            }
            redirect('/', 'refresh');




        } else {
            $redirect_uri = $client->setRedirectUri(base_url()."index.php/google/oauth2callback");
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }


    }


    public function oauth2callback()
    {




        $client = new Google\Client();
        $client->setAuthConfigFile('./secure/client_secret.json');
        $client->setRedirectUri(base_url()."index.php/google/oauth2callback");
        $client->addScope('email');
        $client->addScope('profile');



        // $auth_url = $client->createAuthUrl();
        // header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));


        // if (isset($_GET['code'])) {

        //     $client->authenticate($_GET['code']);
        //     $_SESSION['access_token'] = $client->getAccessToken();
        //     $redirect_uri = 'http://ciapptest.com/index.php/google';
        //     header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

        // }

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = base_url()."index.php/google";
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

    }


    public function check()
    {
        var_dump($_SESSION['access_token']);
    }

    public function remove()
    {
        $_SESSION['access_token'] = '';
    }
}
