<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 04/02/2017
 * Time: 23:47
 */
class Participation extends CI_Model
{
    public function insertParticipation($data){
        $data = array(
            'id_user' => $data['id_user'],
            'id_contest' => $data['id_contest'],
            'link_photo' => $data['link_photo']
        );
        $this->db->insert('participation',$data);
    }

    public function userParticipate($idUser, $idContest){
        $this->db->select('*');
        $this->db->from('participation');
        $this->db->where('participation.id_user', $idUser);
        $this->db->where('participation.id_contest', $idContest);
        $query = $this->db->get();
        return $query->result_array();
    }
}