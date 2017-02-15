<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class C_contest_history extends CI_Controller
{
  public function index()
  {
  	$dateNom = date('Y-m-d');
  	$query['liste'] = $this->m_contest_history->listContest($dateNom);      
    $this->load->view('v_contest_history', $query);    
  }
}

?>
