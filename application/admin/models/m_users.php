<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_users extends CI_Model
{
	
	public function get_info($id)
	{
		$this->db->where('id_facebook',$id);
        $query = $this->db->get('users');
        return $query->result_array();
	}
}






 ?>