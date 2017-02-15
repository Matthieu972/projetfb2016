<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class C_contest_management extends CI_Controller
{
  public function index()
  {
    $this->load->helper(array('form', 'url', 'file'));

    $this->load->library('form_validation');

    $this->form_validation->set_rules('contest_name', '"nom du concours"', 'required|min_length[6]');  
    $this->form_validation->set_rules('contest_description', '"description du concours"', 'required|min_length[25]');         

    $this->form_validation->set_rules('start_date', '"date de début"', 'required');
    $this->form_validation->set_rules('end_date', '"date de fin"', 'required');    

    $this->form_validation->set_rules('price', '"lot à gagner"', 'required'); 
    $this->form_validation->set_rules('price_pic', 'photo pour le lot', 'required',
            array('required' => 'Vous devez ajouter une %s.')
    );   

    if ($this->form_validation->run() == FALSE)
    {
        $data['contest_name'] = $this->input->post('contest_name');
        $data['contest_description']  = $this->input->post('contest_description');
        $data['price']   = $this->input->post('price'); 
        $data['price_pic']   = $this->input->post('price_pic');           
        $data['date_start']   = $this->input->post('start_date');
        $data['date_end']     = $this->input->post('end_date');  
        $this->load->view('v_contest_management', $data);
    }
    else
    {
        $folder=  dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/fichiers/';
        var_dump($folder);
        if (!is_dir($folder)) { //s'il existe un repertoire fichier sinon il l'a cree 
               mkdir($folder, 0777, TRUE);
        } 
        //upload files
        $config['upload_path']                 =  $folder;
        $config['allowed_types']               = 'gif|jpeg|png|jpg'; //type de fichier
        $config['max_size']                    = '100000';      //taille du fichier
        //$config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $lien = '';
        $nom  = '';
        if (!$this->upload->do_upload('price_pic')){
            echo "error";
            $status = "Le fichier que vous avez oploader n'est pas une image";
            $msg = $this->upload->display_errors('', '');
            var_dump($msg);
            $donnee = array('erreur'=>$status);
        }else{
            $recup = $this->upload->data();
            var_dump('Recup', $recup);
            $lien = $recup['full_path'];
            $nom = $recup['file_name'];
            //$lien = $_SERVER['DOCUMENT_ROOT'].'/exif/assets/img/test.jpg';
            //$donnee = $this->exif_info->verifFichier($lien);
        }
        var_dump($lien);
        var_dump($nom);
        $lastId = $this->m_contest_management->lastId();
        if (!empty($lastId)) {
            
            $this->m_contest_management->endContest($lastId[0]['id_contest']);
        }
       
        $data['contest_name'] = $this->input->post('contest_name');
        $data['contest_description']  = $this->input->post('contest_description');
        $data['price']   = $this->input->post('price'); 
        $data['price_pic']   = $this->input->post('price_pic');           
        $data['date_start']   = $this->input->post('start_date');
        $data['date_end']     = $this->input->post('end_date');               
        $lastDate = $this->m_contest_management->lastDateContest();
        $date_now = date('Y-m-d');
        if($data['date_start'] >= $date_now){
            $data['contest_name'] = $this->input->post('contest_name');
            $data['contest_description']  = $this->input->post('contest_description');
            $data['price']   = $this->input->post('price'); 
            $data['price_pic']   = $this->input->post('price_pic');           
            $data['date_start']   = $this->input->post('start_date');
            $data['date_end']     = $this->input->post('end_date');  
            $this->m_contest_management->insertContest($data);
            //redirect('admin/c_current_contest');
        }else{
            $data['contest_name'] = $this->input->post('contest_name');
            $data['contest_description']  = $this->input->post('contest_description');
            $data['price']   = $this->input->post('price'); 
            $data['price_pic']   = $this->input->post('price_pic');           
            $data['date_start']   = $this->input->post('start_date');
            $data['date_end']     = $this->input->post('end_date');  
            $data['error'] = '    La date debut concours doit être superieur à '.$date_now;
     
            $this->m_contest_management->insertContest($data);
            $this->load->view('v_contest_management', $data);
        }
        //var_dump($lastDate);
    }
  }
}

?>