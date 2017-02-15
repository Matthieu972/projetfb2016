<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 24/01/2017
 * Time: 10:43
 */
class C_home extends CI_Controller
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
        if(isset($_SESSION['facebook_access_token']))
        {
            $missingPermissions = array();
            $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            $responses = $this->fb->get("/me/permissions");
            $userNodes = $responses->getDecodedBody();
            foreach ($userNodes["data"] as $row){
                if($row['status'] == 'declined'){
                    $missingPermissions[] = $row['permission'];
                }
            }
            if(!empty($missingPermissions)){
                $helper = $this->fb->getRedirectLoginHelper();
                $permissions = ['email', 'user_photos'];
                $data['loginUrl'] = $helper->getLoginUrl(base_url(), $permissions);
                echo '<script>window.top.location.href="'.$data['loginUrl'].'"</script>';
            }
            
            $accessTokenApp = '261909090895855|RMMvgf_sNsIHu7mQ7JY07cZTyY8';
            $tabAdmin = array();
            $response = $this->fb->get("/261909090895855/roles",$accessTokenApp);
            $userNode = $response->getDecodedBody();
            $response1 = $this->fb->get('/me?fields=id,last_name,first_name,gender,birthday,email');
            $idUser = $response1->getDecodedBody();
            
            foreach ($userNode['data'] as $row){
                if($row['role'] == 'administrators'){
                    array_push($tabAdmin, $row['user']);
                }
            }
            for ($i = 0; $i<count($tabAdmin); $i++){
                if($tabAdmin[$i] == $idUser['id']){
                    echo "admin";
                    $_SESSION['idAdmin'] = $idUser['id'];
                    $_SESSION['nomAdmin'] = $idUser['nom'];
                    $_SESSION['prenomAdmin'] = $idUser['prenom'];
                    redirect(base_url('admin'));
                }else{
                    echo "user";
                    $_SESSION['idUser'] = $idUser['id'];
                    //$_SESSION['nomUser'] = $idUser['nom'];
                    //$_SESSION['prenomUser'] = $idUser['prenom'];
                    //redirect('c_home');
                }
            }
            
            $this->load->view('v_home');
        }else{
            redirect('c_login');
        }
    }
}