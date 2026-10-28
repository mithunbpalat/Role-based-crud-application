<?php
 
class Auth_Model extends CI_Model{

    public function getUser($email){
        $user = $this->db->where('eml', $email)
                ->get('usrs')
                ->row();
        return $user;
    }        

}