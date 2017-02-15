<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 24/01/2017
 * Time: 10:43
 */
class C_contest extends CI_Controller
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

    public function index(){
        if(isset($_SESSION['facebook_access_token']))
        {
            if(isset($_POST['idUser']) && (isset($_POST['idParticipate']))){
                $chek = $this->contest->chekVote($_POST['idUser'], $_POST['idParticipate']);
                if(!empty($chek)){
                    $this->contest->deleteVote($_POST['idUser'], $_POST['idParticipate']);
                }else{
                    $data['date_vote'] = $date = date('Y-m-d');
                    $data['id_user'] = $_POST['idUser'];
                    $data['id_participation'] = $_POST['idParticipate'];
                    $this->contest->addvote($data);
                }
            }
            $date_now = date('Y-m-d');
            $data['contestProgress'] = $this->contest->contestInProgress();
            $data['contests'] = $this->contest->contestNow($date_now);
            for($i=0; $i<count($data['contests']); $i++){
                $cnt = $this->contest->nbVote($data['contests'][$i]['id_participation']);
                $vote = $this->contest->vote($_SESSION['idUser'], $data['contests'][$i]['id_participation']);
                foreach($cnt as $row){
                    $data['contests'][$i]['count'] = $row['nbVote'];
                }
                if(!empty($vote)){
                    foreach($vote as $row){
                        $data['contests'][$i]['vote'] = $row['id_vote'];
                    }
                }
            }
            
            $this->load->view('v_contest', $data);
        }else{
            redirect('c_login');
        }
    }
    
      public function vote(){
        //var_dump($_POST);
        $chek = $this->contest->chekVote($_POST['idUser'], $_POST['idParticipate']);
        if(!empty($chek)){
            $this->contest->deleteVote($_POST['idUser'], $_POST['idParticipate']);
        }else{
            $data['id_user'] = $_POST['idUser'];
            $data['id_participation'] = $_POST['idParticipate'];
            $this->contest->addvote($data);
        }
        redirect('c_contest');
    }
}