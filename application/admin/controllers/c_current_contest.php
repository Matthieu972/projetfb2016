<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class C_current_contest extends CI_Controller
{

  public function index()
  {
  	$date_now = date('Y-m-d');
  	$data['date'] = $this->m_current_contest->dateCurrentContest($date_now);
  	$data['lastContest'] = $this->m_current_contest->lastContest($date_now);
  	$data['count'] = $this->m_current_contest->countParticipants();
    $this->load->view('v_current_contest', $data);  
  }
}

?>