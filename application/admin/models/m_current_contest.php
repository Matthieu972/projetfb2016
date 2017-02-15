<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_current_contest extends CI_Model
{
	public function countParticipants()
	{
        $this->db->select('*');
        $this->db->from('participation');
        $this->db->join('contest', 'contest.id_contest = contest.id_contest');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function dateCurrentContest($date)
    {
    	$this->db->select('contest.date_end');
    	$this->db->from('contest');
    	$this->db->where('date_start <=', $date);
        $this->db->where('date_end >=', $date);
        $this->db->where('status >=', true);
        $query = $this->db->get();
        return $query->result_array();    
    }

    public function lastContest($date)
    {
    	$this->db->select('*');
    	$this->db->from('contest');
    	$this->db->where('date_start <=', $date);
        $this->db->where('date_end >=', $date);
        $this->db->where('status >=', true);
        $query = $this->db->get();
        return $query->result_array();    
    }
}

?>