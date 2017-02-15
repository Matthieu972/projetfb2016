<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_contest_management extends CI_Model
{
	
	public function insertContest($data){



        $contest_data = array(
            'name' => $data['contest_name'],
            'description' => $data['contest_description'],
            'name_price' => $data['price'], 
            'link_price' => $data['price_pic'],           
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end'],            
            'status' => 1
            );

        $this->db->insert('contest', $contest_data);
    }

    public function lastDateContest(){
        $this->db->select('contest.date_end');
        $this->db->from('contest');
        $this->db->order_by('contest.id_contest',"desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lastId(){
        $this->db->select_max('id_contest');
        $this->db->from('contest');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function endContest($id){
        $data = array(
               'status' => 0
            );
        $this->db->where('id_contest', $id);
        $this->db->update('contest', $data);
    }
}

?>