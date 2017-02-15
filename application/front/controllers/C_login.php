<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
            //$this->checkAccessToken();
            //var_dump($this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']));
            //var_dump($_SESSION['facebook_access_token']);
            //var_dump($this->checkAccessToken());
            $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            $missingPermissions = array();
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
                //$data['loginUrl'] = $helper->getLoginUrl(base_url().'c_login/callback', $missingPermissions);
                $data['loginUrl'] = $helper->getReRequestUrl(base_url(), $missingPermissions);
                echo '<script>window.top.location.href="'.$data['loginUrl'].'"</script>';
                //echo '<script>window.top.location.href="https://www.facebook.com/v2.8/dialog/oauth?client_id=261909090895855&state=5d4d49e026e77e530ca64d8582a47b38&response_type=code&sdk=php-sdk-5.4.3&redirect_uri=http%3A%2F%2Fmario.fbdev.fr%2Fc_login%2Fcallback&scope=email%2Cuser_photos"</script>';
                //header('Location:'.$data['loginUrl']);
                //var_dump($data['loginUrl']);
                //header("Location: https://www.facebook.com/v2.8/dialog/oauth?client_id=261909090895855&redirect_uri=".base_url().$this->fb->getLoginUrl(array("scope" => "email")));
            }
            
            //access token de l'application
            $accessTokenApp = '261909090895855|RMMvgf_sNsIHu7mQ7JY07cZTyY8';
            
            $tabAdmin = array();
            //récupère les droits des utilisateurs de l'application
            $response = $this->fb->get("/261909090895855/roles",$accessTokenApp);
            $userNode = $response->getDecodedBody();
            
            //recuperation des informations de l'utilisateur
            $response1 = $this->fb->get('/me?fields=id,last_name,first_name,gender,birthday,email');
            $idUser = $response1->getDecodedBody();

            //ajouter l'utilisateur dans la base de données s'il n'existe pas sinon met à jour ses informations
            $data['id_facebook']  = $idUser['id'];
            $data['first_name']   = $idUser['last_name'];
            $data['last_name']    = $idUser['first_name'];
            $data['email']        = $idUser['email'];
            if ($idUser['gender'] == 'male'){
                $data['gender'] = 'M';
            }else{
                $data['gender'] = 'F';
            }
            $data['date_cretead'] = date('Y-m-d');
            $this->users->insertUser($idUser['id'], $data);

            foreach ($userNode['data'] as $row){
                if($row['role'] == 'administrators'){
                    array_push($tabAdmin, $row['user']);
                }
            }
           // var_dump($tabAdmin);
            for ($i = 0; $i<count($tabAdmin); $i++){
                if($tabAdmin[$i] == $idUser['id']){
                    //echo "admin";
                    $_SESSION['idAdmin'] = $idUser['id'];
                    $_SESSION['nomAdmin'] = $idUser['nom'];
                    $_SESSION['prenomAdmin'] = $idUser['prenom'];
                    redirect(base_url('admin'));
                }else{
                    //echo "user";
                    $_SESSION['idUser'] = $idUser['id'];
                    $_SESSION['nomUser'] = $idUser['nom'];
                    $_SESSION['prenomUser'] = $idUser['prenom'];
                    redirect('c_home');
                    $this->load->view('v_home');
                }
            }
        }else{
        	//echo 'non connecter';
            $helper = $this->fb->getRedirectLoginHelper();
            $permissions = ['email', 'user_photos'];
            $data['loginUrl'] = $helper->getLoginUrl(base_url().'c_login/callback', $permissions);
            //echo '<a href="' . htmlspecialchars($loginUrl) . '">Se connecter!</a>';
        	$this->load->view('v_login', $data);
        }
	}

	public function callback(){
        // Get the FacebookRedirectLoginHelper
        $helper = $this->fb->getRedirectLoginHelper();
        $facebookClient = $this->fb->getClient();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in
            // Store the $accessToken in a PHP session
            // You can also set the user as "logged in" at this point
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            header('Location: '.base_url());
        } elseif ($helper->getError()) {
            // There was an error (user probably rejected the request)
            echo '<p>Error: ' . $helper->getError();
            echo '<p>Code: ' . $helper->getErrorCode();
            echo '<p>Reason: ' . $helper->getErrorReason();
            echo '<p>Description: ' . $helper->getErrorDescription();
            exit;
        }
    }
    public function checkAccessToken(){
        if(empty($_SESSION["facebook_access_token"])) return false;
        try{
            $accessTokenApp = '261909090895855|RMMvgf_sNsIHu7mQ7JY07cZTyY8';
            $response = $this->fb->get('debug_token?input_token='.$_SESSION['facebook_access_token'], $accessTokenApp);
            $graphObject = $response->getGraphObject();
            $this->fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        }catch(Exception $e){
            return false;
        }
        return true;

    }

    public function logout(){
        session_destroy();
        header('Location: '.base_url());
    }
}
