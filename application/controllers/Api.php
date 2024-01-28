<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    /*cache control*/
    $this->load->database();
    $this->load->model('crud_model');
    $this->load->model('frontend_model');
    $this->load->model('email_model');
    $this->load->library('session');
    $this->load->helper('directory');
    // Set the timezone
    date_default_timezone_set(get_settings('timezone'));
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    $this->load->helper("file");
  }
  public function validate_login($from = "") {
    if(!$this->crud_model->check_rechaptcha()  && get_settings('recaptcha_status') == 1){
        $this->session->set_flashdata('error_message', get_phrase('recaptcha_validation_failed'));
        redirect(site_url('home/login'), 'refresh');
    }

    $email = sanitizer($this->input->post('email'));
    $password = sanitizer($this->input->post('password'));
    $credential = array('email' => $email, 'password' => sha1($password), 'is_verified' => 1);

    // Checking login credential for admin
    $query = $this->db->get_where('user', $credential);

    if ($query->num_rows() > 0) {
        $row = $query->row();
        $this->session->set_userdata('is_logged_in', 1);
        $this->session->set_userdata('user_id', $row->id);
        $this->session->set_userdata('role_id', $row->role_id);
        $this->session->set_userdata('role', get_user_role('user_role', $row->id));
        $this->session->set_userdata('name', $row->name);
        if ($row->role_id == 1) {
            $this->session->set_userdata('admin_login', '1');
            redirect(site_url('admin/dashboard'), 'refresh');
        }else if($row->role_id == 2){
            $this->session->set_userdata('user_login', '1');
            redirect(site_url('user/dashboard'), 'refresh');
        }
    }else {
        $this->session->set_flashdata('error_message', get_phrase('provided_credentials_are_invalid'));
        redirect(site_url('home/login'), 'refresh');

    }

   }
  public function get_categories()
  {
    $CI	=&	get_instance();
    $CI->load->database();

    $result = $CI->db->get('category');

    $datas = $result->result_array();

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($datas));
  }
  public function get_all_users($user_id = 0) {
    if ($user_id > 0) {
        $this->db->where('id', $user_id);
    }
    $user = $this->db->get('user')->row_array(); // Fetch a single row as an associative array
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($user));
}
public function get_listing_by_user_id($user_id = ""){
    $this->db->where('user_id', $user_id);
    $this->db->where('status', 'active');
    $conts = $this->db->get('listing')->num_rows();
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($conts));
}
public function get_listing_by_user_id_result($user_id = ""){
    $this->db->where('user_id', $user_id);
    $this->db->where('status', 'active');
    $conts = $this->db->get('listing')->result_array();
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($conts));
}
function now_open($listing_id = '') {
    $CI	=&	get_instance();
    $CI->load->database();
    $time_configurations = $CI->db->get_where('time_configuration', array('listing_id' => $listing_id))->row_array();
    $today = strtolower(date('l'));
    $current_hour = date('H');
    $time_configuration_for_today = explode('-', $time_configurations[$today]);
    if ($time_configuration_for_today[0] == 'closed' || $time_configuration_for_today[1] == 'closed') {
      $closed = get_phrase('closed');
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($closed));
    }else {
      if( $time_configuration_for_today[0] <= $current_hour && $time_configuration_for_today[1] >= $current_hour ){
        $now_open = get_phrase('now_open');
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($now_open));
      }else{
        $closed = get_phrase('closed');
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($closed));
      }
    }
  }

  function get_cities()
  {
    $CI	=&	get_instance();
    $CI->load->database();


    $result = $CI->db->get('city');
    $datas = $result->result_array();

    $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($datas));
  }
  function get_listing_id($listing_id = ""){
    $CI =&  get_instance();
    $CI->load->database();
    $listing = $listing_id;
    $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($listing));
  }
  function get_slug_name($listing_id = ""){
    $CI =&  get_instance();
    $CI->load->database();
    $listing = $CI->db->get_where('listing', array('id' => $listing_id))->row_array();
    $slug = slugify($listing['name']);
    $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($slug));
  }
    public function get_data() {
        // Logique pour récupérer les données depuis la base de données
        $data = array('1','2','3');

        // Convertir les données en format JSON et les renvoyer
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
	function get_phrase($phrase = '') {
		$CI	=&	get_instance();
		$CI->load->database();
		$language_code = $CI->db->get_where('settings' , array('type' => 'language'))->row()->description;
		$key = strtolower(preg_replace('/\s+/', '_', $phrase));

		$langArray = openJSONFile($language_code);
		if (array_key_exists($key, $langArray)) {
		} else {
			$langArray[$key] = ucfirst(str_replace('_', ' ', $key));
			$jsonData = json_encode($langArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
			file_put_contents(APPPATH.'language/'.$language_code.'.json', stripslashes($jsonData));
		}
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($langArray[$key]));
	}
    function get_user_thumbnail($user_id = "") {
        if (file_exists('uploads/user_image/'.$user_id.'.jpg')) {
            $linkj = base_url('uploads/user_image/'.$user_id.'.jpg');
        }else {
            $linkj = base_url('uploads/user_image/user.png');
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($linkj));
    }
    function get_amenities($amenity_id = "", $attribute = "")
    {
        $amenity_id = 1; // Remplacez par la valeur réelle de l'amenity_id
        $attribute = 1; // Remplacez par la valeur réelle de l'attribut
    
        $amenity_data = $this->frontend_model->get_amenity($amenity_id, $attribute);
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($amenity_data));
    }

    public function get_user_detail($user_id = "") {
        $user_details = $this->user_model->get_all_users($user_id)->row_array()->row()->name;
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($user_details));
    }
    
    function get_frontend_settings($type = '') {
      $CI	=&	get_instance();
      $CI->load->database();

      $CI->db->where('type', $type);
      $result = $CI->db->get('frontend_settings')->row('description');
      // return $result;
      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }
    function get_settings($type = '') {
        $CI	=&	get_instance();
        $CI->load->database();
    
        $CI->db->where('type', $type);
        $result = $CI->db->get('settings')->row('description');
        // return $result;
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
      }
    function filter_listings($page_number = 1)
    {

        $category_ids = array();
        $amenity_ids    = array();
        $city_id        = "";
        $state_id        = "";
        $price_range  = 0;
        $with_video   = 0;
        $with_open   = 'all';
        $search_string="";

     

        //name  //zzz

        if (isset($_GET['search_string']) && !empty($_GET['search_string'])) {
            $search_string=$_GET['search_string'];
           
        }
        else
        {
            $search_string="";
        }

    

     

        if (isset($_GET['selected_city_id']) && !empty($_GET['selected_city_id'])) {
            if ($_GET['selected_city_id'] != '') {
                $city_id = $_GET['selected_city_id'];
            } else {

                $city_id = '';
            }
        }

        if (isset($_GET['selected_category_id']) && !empty($_GET['selected_category_id'])) {
           
                $category_id = $_GET['selected_category_id'];
                array_push($category_ids, $category_id);
            
        }


        // // OLD CODE
        // // Get the category ids
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $selected_categories = explode('--', $_GET['category']);
            foreach ($selected_categories as $category) {
                $category_id = $this->db->get_where('category', array('slug' => $category))->row()->id;
                array_push($category_ids, $category_id);
            }
        }

        // Get the amenity ids
        if (isset($_GET['amenity']) && !empty($_GET['amenity'])) {
            $selected_amenities = explode('--', $_GET['amenity']);
            foreach ($selected_amenities as $amenity) {
                $amenity_id = $this->db->get_where('amenities', array('slug' => $amenity))->row()->id;
                array_push($amenity_ids, $amenity_id);
            }
        }

        // Get the city ids
        if (isset($_GET['city']) && !empty($_GET['city'])) {
            if ($_GET['city'] != 'all') {
                $city_id = $this->db->get_where('city', array('slug' => $_GET['city']))->row()->id;
            } else {

                $city_id = 'all';
            }
        }

        // Get the state ids
        if (isset($_GET['state']) && !empty($_GET['state'])) {
            if ($_GET['state'] != 'all') {
                $state_id = $this->db->get_where('state', array('slug' => $_GET['state']))->row()->id;
            } else {
                $state_id = 'all';
            }
        }

        // Get video existance filter
        if (isset($_GET['video']) && !empty($_GET['video'])) {
            $with_video = $_GET['video'];
        }

        // Get status existance filter
        if (isset($_GET['status']) && !empty($_GET['status'])) {
            $with_open = $_GET['status'];
        }

        // Get Price range filter
        if (isset($_GET['price-range']) && !empty($_GET['price-range'])) {
            $price_range = $_GET['price-range'];
        }

        // If all the filter options remain default, redirect to listings method
        if ($_GET['category'] == "" && $_GET['amenity'] == "" && $_GET['city'] == "all" && $price_range == 0 && $_GET['video'] == 0 && $_GET['status'] == 'all') {
            redirect(site_url('home/listings'), 'refresh');
        }

        $all_listings = $this->frontend_model->filter_listing_all_rows($search_string,$category_ids, $amenity_ids, $state_id, $city_id, $price_range, $with_video, $with_open);
        $listings = $this->frontend_model->filter_listing($search_string,$category_ids, $amenity_ids, $state_id, $city_id, $price_range, $with_video, $with_open, $page_number);


        $page_data['geo_json']       =  $this->make_geo_json_for_map($listings);


        $total_listings = count($all_listings);
        if ($total_listings > 12) :

            $page_data['pagination'] = "filter_page";
            $total_page_number = $total_listings / 12;
            if ($total_listings % 12 != 0) :
                $total_page_number = intval($total_page_number) + 1;
            endif;

            $page_data['total_page_number'] = $total_page_number;
            $page_data['active_page_number'] = $page_number;
        else :
            $page_data['pagination'] = false;
        endif;

        $page_data['page_name']    =  'listings';
        $page_data['title']        = get_phrase('listings');
        $page_data['listings']     = $listings;
        $page_data['category_ids'] = $category_ids;
        //$page_data['selected_category_id'] = $selected_category_id;
        $page_data['amenity_ids']  = $amenity_ids;
        $page_data['city_id']      = $city_id;
        $page_data['search_string']      = $search_string;
        $page_data['state_id']      = $state_id;
        $page_data['with_video']   = $with_video;
        $page_data['with_open']   = $with_open;
        $page_data['price_range']  = $price_range;
        // $this->load->view('frontend/index', $page_data);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($page_data));
    }
    function get_country($listing_id = "") {
        if (empty($listing_id)) {
            $listing_id = $this->input->post('listing_id');
        }
    
        $city = $this->db->get_where('city', array('id' => $listing_id))->row_array();
        if (!$city) {
            // Handle the case where the city is not found
            // You can return an error response or set default values
            $city = array('name' => 'Unknown City', 'state_id' => null);
        }
    
        $state = $this->db->get_where('state', array('id' => $city['state_id']))->row_array();
        if (!$state) {
            // Handle the case where the state is not found
            // You can return an error response or set default values
            $state = array('name' => 'Unknown State', 'country_id' => null);
        }
    
        $country = $this->db->get_where('country', array('id' => $state['country_id']))->row_array();
        if (!$country) {
            // Handle the case where the country is not found
            // You can return an error response or set default values
            $country = array('name' => 'Unknown Country');
        }
    
        $result = array(
            'city' => $city['name'],
            'state' => $state['name'],
            'country' => $country['name']
        );
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }
    function get_countries($country_id = 0)
    {
      if ($country_id > 0) {
        $this->db->where('id', $country_id);
      }
      $result = $this->db->get('country');
      $datas = $result->row_array();
      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($datas));
    }
    
  
}
