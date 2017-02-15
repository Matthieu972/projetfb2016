<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: abdel-latifmabrouck
 * Date: 15/01/2017
 * Time: 13:39
 */
class Contest extends CI_Model
{
    public function contestInProgress(){
        //$sql = "SELECT * FROM contest WHERE date_end >= NOW()";
        //$this->db->query($sql);
        //var_dump(date('Y-m-d'));
        $this->db->select('*');
        $this->db->from('participation');
        $this->db->join('contest', 'contest.id_contest = participation.id_contest');
        $this->db->join('users', 'users.id_facebook = participation.id_user');
       // $this->db->join('vote', 'vote.id_participation = participation.id_participation');
        $this->db->where('contest.date_end >=', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result_array();

        //var_dump($this->db->query($sql));
    }

    public function verifDateContest($date)
    {
        $this->db->select('contest.status, contest.id_contest');
        $this->db->from('contest');
        $this->db->where('date_start <=', $date);
        $this->db->where('date_end >=', $date);
        $this->db->where('status >=', true);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function contestNow($date)
    {
        $this->db->select('*');
        $this->db->from('contest');
        $this->db->join('participation', 'participation.id_contest = contest.id_contest');
        //$this->db->join('user', 'user.id_user = participation.id_user');
        $this->db->where('date_start <=', $date);
        $this->db->where('date_end >=', $date);
        $this->db->where('status >=', true);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function vote($idUser, $idParticipation){
        $this->db->select('*');
        $this->db->from('vote');
        $this->db->where('vote.id_user', $idUser);
        $this->db->where('vote.id_participation', $idParticipation);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function nbVote($idParticipation){
        $this->db->select('count(vote.id_vote) as nbVote');
        $this->db->from('vote');
        $this->db->join('participation', 'participation.id_participation = vote.id_participation');
        $this->db->where('vote.id_participation', $idParticipation);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function addvote($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->where('id_user',$data['id_participation']);
        $q = $this->db->get('vote');
        $data = array(
            'id_user' => $data['id_user'],
            'id_participation' => $data['id_participation']
        );
        //var_dump($q->num_rows());
        if ( $q->num_rows() > 0 )
        {
            $data = array(
                'id_user' => $data['id_user'],
                'id_participation' => $data['id_participation']
            );
            $this->db->where('id_user',$data['id_user']);
            $this->db->where('id_participation',$data['id_participation']);
            $this->db->update('vote', $data);
        }else{
            $this->db->insert('vote',$data);
        }
    }
    public function chekVote($idUser, $idParticipation){
        $this->db->select('*');
        $this->db->from('vote');
        $this->db->where('id_user',$idUser);
        $this->db->where('id_participation',$idParticipation);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function deleteVote($idUser, $idParticipation){
        $this->db->where('id_user',$idUser);
        $this->db->where('id_participation',$idParticipation);
        $this->db->delete('vote');
    }
}