<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 22/01/2017
 * Time: 00:07
 */
class C_participation extends CI_Controller
{

    private $fb;


    public function __construct()
    {
        parent::__construct();
        $this->fb = new Facebook\Facebook([
            'app_id' => '261909090895855',
            'app_secret' => 'cce0cc1c5b671113ac2ae1e50c91e3fd',
            'grant_type' => 'client_credentials',
            'default_graph_version' => 'v2.8',
            'persistent_data_handler'=>'session'
        ]);
    }


    public function index()
    {

        /*$log = new Login();
        $log->login();*/
        if(isset($_SESSION['facebook_access_token']))
        {

            $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            $missingPermissions = array();
            $responses = $this->fb->get("/me/permissions");
            $userNodes = $responses->getDecodedBody();
            //var_dump($userNodes);
            foreach ($userNodes["data"] as $row){
                if($row['status'] == 'declined'){
                    $missingPermissions[] = $row['permission'];
                }
            }
            if(!empty($missingPermissions)){
                $helper = $this->fb->getRedirectLoginHelper();
                $permissions = ['email', 'user_photos'];
                $data['loginUrl'] = $helper->getLoginUrl(base_url().'c_login/callback', $missingPermissions);
                //echo '<script>window.top.location.href="'.$data['loginUrl'].'"</script>';
                header('Location:'.$data['loginUrl']);
                //var_dump($data['loginUrl']);
                //header("Location: https://www.facebook.com/v2.8/dialog/oauth?client_id=261909090895855&redirect_uri=".base_url().$this->fb->getLoginUrl(array("scope" => "email")));
            }
            $response = $this->fb->get("/me");
            $id_user = $response->getDecodedBody();
            //var_dump($id_user);
            $res = $this->fb->get("/".$id_user['id']."/accounts");
            $i = $res->getDecodedBody();
            //var_dump($i);
            //$this->fb->fileToUpload();
            //$this->fb->post("/".$id_user."/albums");

            //var_dump($id_user['id']);
            $response1 = $this->fb->get("/me/albums?fields=id,name,description,link,cover_photo,count,picture");
            //$data['albums'] = $response1->getDecodedBody();
            $userNode1 = $response1->getDecodedBody();

            //var_dump($userNode1);
            //var_dump($userNode1);
            if ($userNode1['data'] != 0) {


                for ($i=0; $i<count($userNode1['data']); $i++){
                    //var_dump($userNode1['data'][$i]);
                    //$id[$i] = $userNode1['data'][$i]['cover_photo']['id'];
                    $id[$i] = $userNode1['data'][$i];
                    $last_id_album = $userNode1['data'][0]['id'];

                }
                //var_dump($last_id_album);

                if($this->input->post("id")){
                    $id_album = $this->input->post("id");
                }else{
                    $id_album = $last_id_album;
                }

                $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
                $response2 = $this->fb->get("/".$id_album."/photos?fields=images");
                $data['photos'] = $response2->getDecodedBody();

                $data['albums'] = $id;
            }else{
                $data['noAlbums'] = 'Vous avez aucun album';
            }
            $this->load->view('v_participation', $data);
/*
            $loginUrl = base_url().'c_login/logout';
            echo '<a href="' . htmlspecialchars($loginUrl) . '">Deconnexion!</a>';*/
        }else{
            redirect('c_login');
        }
        //$this->load->view('v_participation');
    }

    public function participate(){
        if(isset($_SESSION['facebook_access_token']))
        {
            //var_dump($_POST);
            //var_dump($_SESSION);
            $data['id_user'] = $_SESSION["idUser"];
            $data['id_contest'] = $this->input->post("id");
            $data['link_photo'] = $this->input->post("link");
            if($this->participation->insertParticipation($data)){
                echo json_encode('success');
            }
        }else{
            redirect('c_login');
        }
    }

    public function verifDateContest()
    {
        $date = date('Y-m-d');
        $verif = $this->contest->verifDateContest($date);
        //var_dump($verif);
        if (!empty($verif) && $verif[0]['status'] == 1){
            $userPart = $this->participation->userParticipate($_SESSION["idUser"], $verif[0]['id_contest']);
            if(!empty($userPart)){
                $verif[0]['statusPart'] = 1;
            }else{
                $verif[0]['statusPart'] = 0;
            }
        }else{
            $verif[0]['status'] = 0;
        }

       /* if (!empty($verif)){
            echo json_encode($verif);
        }else{
            echo json_encode(0);
        }*/
        echo json_encode($verif);
    }

    public function listPhoto(){
        $id_album = $this->input->post("id");
        $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        $response2 = $this->fb->get("/".$id_album."/photos?fields=images");
        $data['photos'] = $response2->getDecodedBody();
        $this->load->view('v_participation', $data);
    }

    public function upload_file()
    {
        $this->load->library('upload');

        //var_dump($_FILES['fileImage']);

        $data = [
            'message' => '',
            'source' => $this->fb->fileToUpload($_FILES['fileImage']['tmp_name']),
        ];

        try {
            $response = $this->fb->post('me/photos', $data, $_SESSION['facebook_access_token']);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        //$graphNode = $response->getGaphNode();

        //echo 'Photo ID: '.$graphNode['id'];

    }

  


    public function getUser(){
        //$this->fb->get("/me?fields=id,name,email");
        $response = $this->fb->get("/me?fields=id,name,email");
        return $response->getDecodeBody();
    }
}