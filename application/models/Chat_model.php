<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Chat_model extends CI_Model {
   	public function __construct()
        {
                parent::__construct();
                 // Your own constructor code
         } 
 	private $Table = 'chat';
	
 
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data ); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}
	public function GetReciverChatHistory($receiver_id){
		
		$sender_id = $this->session->userdata('user_id');
		
		//SELECT * FROM `chat` WHERE `sender_id`= 197 AND `receiver_id` = 184 OR `sender_id`= 184 AND `receiver_id` = 197
		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id'";
		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where($condition);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
	}
	public function GetReciverMessageList($currentUserId){
		$this->db->select('MAX(id) as id, sender_id, message, receiver_id, MAX(message_date_time) as message_date_time');
		$this->db->from($this->Table);
		$this->db->where("(sender_id = $currentUserId OR receiver_id = $currentUserId)");
		$this->db->group_by('CASE WHEN sender_id = ' . $this->db->escape($currentUserId) . ' THEN receiver_id ELSE sender_id END', FALSE);
		$this->db->order_by('message_date_time', 'DESC');
		$query = $this->db->get();
	
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
		// $this->db->select('*');
		// $this->db->from($this->Table);
		// $this->db->where("(sender_id = $currentUserId OR receiver_id = $currentUserId)");
		// $this->db->order_by('message_date_time', 'DESC'); // Ordonner par date décroissante
		// $this->db->group_by('IF(sender_id = '.$currentUserId.', receiver_id, sender_id)'); // Grouper par l'autre utilisateur
		// $query = $this->db->get();
	
		// if ($query) {
		// 	return $query->result_array();
		// } else {
		// 	return false;
		// }
	}
	
	public function getDistinctSenders($receiver_id) {
		$this->db->select('sender_id, MAX(message_date_time) as last_message_time');
		$this->db->from($this->Table);
		$this->db->where('receiver_id', $receiver_id);
		$this->db->group_by('sender_id');
		$this->db->order_by('last_message_time', 'desc'); // Optionnel: trier par la date du dernier message
		$query = $this->db->get();
	
		if ($query) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function liste_des_message(){
		$receiver_id = $this->outh_model->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$messagelist = $this->chat_model->GetReciverMessageList($receiver_id);
		
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
 		
	}
	
	
	public function TrashById($receiver_id)
	{  
 		$res = $this->db->delete($this->Table, ['receiver_id' => $receiver_id] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}	
 }