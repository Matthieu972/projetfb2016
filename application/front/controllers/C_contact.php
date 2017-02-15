<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 03/01/2017
 * Time: 10:27
 */
class C_contact extends CI_Controller
{
    public function index()
    {
        if(isset($_SESSION['facebook_access_token']))
        {
            $this->load->view('v_contact');
        }else{
            redirect('c_login');
        }
    }
    
    public function sendMail(){
        var_dump($_POST);
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "testfacebook574@gmail.com"; 
        $config['smtp_pass'] = "TestFacebook2017";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from($_POST['mail'], $_POST['prenom'].' '.$_POST['nom']);
        $this->email->to('amatroud0@gmail.com');

        $this->email->subject($_POST['sujet']);
        $this->email->message($_POST['msg']);

        $this->email->send();
        $this->email->print_debugger(array('headers'));
    }
}