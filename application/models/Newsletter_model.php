<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter_model extends CI_Model {
    
    public function subscriber_exists()
    {
        $query = $this->db->get_where('newsletter', array('email' => $this->input->post('email')
        ));
        return $query->num_rows() > 0;
    }
    function add_user() {
        $data['email'] = sanitizer($this->input->post('email'));
        $validity = $this->check_duplication('on_create', $data['email']);
        if($validity){
            if (strtolower($this->session->userdata('role')) == 'admin') {
                $this->db->insert('newsletter', $data);
                $this->session->set_flashdata('flash_message', get_phrase('user_registration_successfully_done'));
            }else {
                $this->db->insert('newsletter', $data);
                $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done').'. '.get_phrase('please_check_your_mail_inbox_to_verify_your_email_address').'.');
            }
        }else {

            $this->session->set_flashdata('error_message', get_phrase('this_email_id_has_been_taken'));
        }
        return;
    }
    function edit_user($user_id) {
        $data['email'] = sanitizer($this->input->post('email'));

            $this->db->where('id', $user_id);
            $this->db->update('newsletter', $data);
            $this->upload_user_image($user_id);
            $this->upload_user_background_image($user_id);
            $this->session->set_flashdata('flash_message', get_phrase('user_updated_successfully'));

        return;
    }
    public function addSubscriber()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'subscription_date' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('newsletter', $data);
    }
    
    public function getSubscribers()
    {
        $query = $this->db->get('newsletter');
        return $query->result();
    }
    
    public function editSubscriber($id)
    {
        $query = $this->db->get_where('newsletter', array(
            'id' => $id
        ));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    
    public function updateSubscriber($ns_id)
    {
        $data = array(
            'email' => $this->input->post('email')
        );
        
        $this->db->where('id', $ns_id);
        return $this->db->update('newsletter', $data);
    }
    
    public function deleteSubscriber($id)
    {
        return $this->db->delete('newsletter', array(
            'id' => $id
        ));
    }
    public function check_duplication($action = "", $email = "", $user_id = "") {
        $duplicate_email_check = $this->db->get_where('newsletter', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                return false;
            }else {
                return true;
            }
        }elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }
        }
    }
}