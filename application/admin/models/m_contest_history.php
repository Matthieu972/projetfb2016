<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_contest_history extends CI_Model
{
	
	public function listContest($date){
        $this->db->select('*');
        $this->db->from('contest');
        $this->db->where('date_end <', $date);
        $this->db->where('status =', 0);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>