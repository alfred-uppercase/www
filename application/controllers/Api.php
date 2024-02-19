<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

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
  public function subscribe()
  {
      // $data['is_new_subscriber'] = true;
      // if (!$this->newsletter_model->subscriber_exists()) {
      //     $this->newsletter_model->addSubscriber();
      // } else {
      //     $data['is_new_subscriber'] = false;
      // }
      // echo json_encode($data);
      $response = array();

      if (!$this->newsletter_model->subscriber_exists()) {
          if ($this->newsletter_model->addSubscriber()) {
              $response['status'] = 'success';
              $response['message'] = 'Subscriber added successfully.';
          } else {
              $response['status'] = 'error';
              $response['message'] = 'Failed to add subscriber.';
          }
      } else {
          $response['status'] = 'duplicate';
          $response['message'] = 'Subscriber already exists.';
      }
      echo json_encode($response);
  }
  public function get_categories_parent()
  {
    //$CI	=&	get_instance();
    //$CI->load->database();
	$this->db->where('parent', 0);
    $result = $this->db->get('category');

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
public function register_post() {
    $data = $this->input->post();

    $email = sanitizer($this->input->post('email'));
    $name = sanitizer($this->input->post('name'));
    $lastname = sanitizer($this->input->post('lastname'));
    $civilite = sanitizer($this->input->post('selected_civilite'));
    $password = sha1(sanitizer($this->input->post('password'))); // Use bcrypt for password hashing
    $address = sanitizer($this->input->post('address'));
    $phone = sanitizer($this->input->post('phone'));
    $siret = sanitizer($this->input->post('siret'));
    $nomdesociete = sanitizer($this->input->post('nomdesociete'));
    $adresse = sanitizer($this->input->post('adresse'));
    $codepostal = sanitizer($this->input->post('codepostal'));
    $secteur = sanitizer($this->input->post('secteur'));


    if (empty($email) || empty($name) || empty($password) || empty($adresse) || empty($phone)) {
        $this->response(['error_message' => get_phrase('fill_in_all_the_fields')], REST_Controller::HTTP_BAD_REQUEST);
    }
    $existing_user = $this->user_model->check_duplication('on_create', $email);
    if (!$existing_user) {
        $this->response(['error_message' => 'Email is already taken'], REST_Controller::HTTP_CONFLICT);
    }

    // $user_id = $this->user_model->add_user($email, $name, $password, $address, $phone, $lastname, $civilite, $siret, $nomdesociete, $adresse, $codepostal, $secteur);
    // $user_id = $this->user_model->add_user('sign_up');
    $user_id = $this->user_model->add_user($siret, $nomdesociete, $adresse, $codepostal, $secteur);
    $this->response(['message' => 'User registered successfully', 'user_id' => $user_id], REST_Controller::HTTP_OK);
}
// public function validate_login_api() {
//     $email = sanitizer($this->input->post('email'));
//     $password = sanitizer($this->input->post('password'));
//     $credential = array('email' => $email, 'password' => sha1($password), 'is_verified' => 1);

//     // Checking login credential for admin
//     $query = $this->db->get_where('user', $credential);
//     if ($query->num_rows() > 0) {
//         $row = $query->row();
//         $user_data = array(
//             'user_id' => $row->id,
//             'role_id' => $row->role_id,
//             'role' => get_user_role('user_role', $row->id),
//             'name' => $row->name,
//         );

//         $response = array(
//             'status' => 'success',
//             'message' => 'Login successful',
//             'user_data' => $user_data,
//         );
//         $this->response($response, REST_Controller::HTTP_OK);
//     } else {
//         $response = array(
//             'status' => 'error',
//             'message' => 'Invalid credentials P',
//             'credentials' => $credential
//         );
//         $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
//     }
// }
public function validate_login_api() {
    $email = sanitizer($this->input->post('email'));
    $password = sanitizer($this->input->post('password'));
    $credential = array('email' => $email, 'password' => sha1($password), 'is_verified' => 1);

    // Checking login credential for admin
    $query = $this->db->get_where('user', $credential);
    if ($query->num_rows() > 0) {
        $row = $query->row();
        $user_data = array(
            'user_id' => $row->id,
            'role_id' => $row->role_id,
            'role' => get_user_role('user_role', $row->id),
            'name' => $row->name,
        );

        // Créer une session pour l'utilisateur connecté
        $this->session->set_userdata('user_data', $user_data);

        $response = array(
            'status' => 'success',
            'message' => 'Login successful',
            'user_data' => $user_data,
        );
        $this->response($response, REST_Controller::HTTP_OK);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid credentials P',
            'credentials' => $credential
        );
        $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
    }
}



public function response($data, $status = 200) {
    $this->output
         ->set_status_header($status)
         ->set_content_type('application/json', 'utf-8')
         ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
         ->_display();
    exit;
}

// function add_user($param1 = "") {
//     $data['email'] = sanitizer($this->input->post('email'));
//     $data['name'] = sanitizer($this->input->post('name'));
//     $data['lastname'] = sanitizer($this->input->post('lastname'));
//     $data['password'] = sha1(sanitizer($this->input->post('password')));
//     $data['address'] = sanitizer($this->input->post('address'));
//     $data['phone'] = sanitizer($this->input->post('phone'));
//     $data['website'] = sanitizer($this->input->post('website'));
//     $data['civilite'] = sanitizer($this->input->post('selected_civilite'));
//     $data['about'] = sanitizer($this->input->post('about'));
//     $datas['siret'] = sanitizer($this->input->post('siret'));
//     $datas['nomdesociete'] = sanitizer($this->input->post('nomdesociete'));
//     $datas['adresse'] = sanitizer($this->input->post('adresse'));
//     $datas['codepostal'] = sanitizer($this->input->post('codepostal'));
//     $datas['secteur'] = sanitizer($this->input->post('secteur'));
//     $social_links = array(
//         'facebook' => sanitizer($this->input->post('facebook')),
//         'twitter' => sanitizer($this->input->post('twitter')),
//         'linkedin' => sanitizer($this->input->post('linkedin')),
//     );
//     $data['social'] = json_encode($social_links);
//     $data['role_id'] = 2;
//     $data['wishlists'] = '[]';
//     $verification_code =  md5(rand(100000000, 200000000));
//     $data['verification_code'] = $verification_code;
//     $validity = $this->check_duplication('on_create', $data['email']);
//     if($validity){
//         if (strtolower($this->session->userdata('role')) == 'admin') {
//             $data['is_verified'] = 1;
//             $this->db->insert('user', $data);
//             $user_id = $this->db->insert_id();
//             $datas['user_id'] = $user_id;
//             $this->db->insert('company', $datas);
//             $this->upload_user_image($user_id);
//             $this->session->set_flashdata('flash_message', get_phrase('user_registration_successfully_done'));
//         }else {
//             $data['is_verified'] = 0;
//             $this->db->insert('user', $data);
//             $user_id = $this->db->insert_id();
//             $datas['user_id'] = $user_id;
//             $this->db->insert('company', $datas);
//             $this->upload_user_image($user_id);
//             $this->email_model->send_email_verification_mail($data['email'], $verification_code);
//             $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done').'. '.get_phrase('please_check_your_mail_inbox_to_verify_your_email_address').'.');
//         }
        
//     }else {
//         if($param1 == 'sign_up'){
//             $this->db->where('email', $data['email']);
//             $this->db->where('is_verified', 0);
//             $unverified_user = $this->db->get('user');
//             if($unverified_user->num_rows() > 0){
//                 $unverified_user_row = $unverified_user->row_array();
//                 $this->email_model->send_email_verification_mail($unverified_user_row['email'], $unverified_user_row['verification_code']);
//                 $this->session->set_flashdata('flash_message', get_phrase('You have already registered').'. '.get_phrase('please_check_your_mail_inbox_to_verify_your_email_address').'.');
//                 return;
//             }
//         }
//         $this->session->set_flashdata('error_message', get_phrase('this_email_id_has_been_taken'));
//     }
//     return;
// }
function get_sub_categories($category_id = 0)
{
//   if ($category_id > 0) {
//     $this->db->where('parent', $category_id);
//   }
//   $this->db->where('parent >', '0');
//   $data = $this->db->get('category');
//   $this->output
//   ->set_content_type('application/json')
//   ->set_output(json_encode($data));
$data = array();  // Initialisez un tableau pour stocker les données des sous-catégories

if ($category_id > 0) {
    $this->db->where('parent', $category_id);
}
$this->db->where('parent >', '0');
$query = $this->db->get('category');

if ($query->num_rows() > 0) {
    // Si des données sont trouvées, stockez-les dans le tableau $data
    foreach ($query->result_array() as $row) {
        $data[] = $row;
    }
}

// Retournez les données encodées en JSON
$this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($data));
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


  function add_listing()
  {
    $photo_gallery  = array();
    $listing_owner = $this->input->post('user_id');
    if (isset($listing_owner) && !empty($listing_owner)) {
      $data['user_id'] = $listing_owner;
    } else {
      $data['user_id'] = $this->session->userdata('user_id');
    }
    $data['name'] = sanitizer($this->input->post('title'));
    $data['description'] = sanitizer($this->input->post('description'));


    if ($this->session->userdata('user_login') == '1' || $this->session->userdata('user_id') != $data['user_id']) {
      // $package_id = has_package($this->session->userdata('user_id'), 'package_id');
      // $featured_status = $this->db->get_where('package', array('id' => $package_id))->row('featured');
      // // $featured_status = $this->db->get_where('package')->row('featured');
      // if ($featured_status == 0) {
      //   $data['is_featured'] = 0;
      // } else {
      //   $data['is_featured'] = $this->input->post('is_featured');
      // }
      $package_id = has_package($this->session->userdata('user_id'), 'package_id');
      if (is_array($package_id)) {
          // Si $package_id est un tableau, choisissez l'élément approprié
          $package_id = isset($package_id['package_id']) ? $package_id['package_id'] : null;
      }
      
      // Vérifiez si $package_id est défini avant d'utiliser dans la requête
      if ($package_id !== null) {
          $featured_stat = $this->db->get_where('package', array('id' => $package_id))->row_array();
      
          if (!empty($featured_stat)) {
              $featured_status = $featured_stat['featured'];
      
              if ($featured_status == 0) {
                  $data['is_featured'] = 0;
              } else {
                  $data['is_featured'] = $this->input->post('is_featured');
              }
          } else {
              // Gérez le cas où $featured_stat est vide
              $data['is_featured'] = 0; // ou toute autre valeur par défaut
          }
      } else {
          // Gérez le cas où $package_id n'est pas défini correctement
          $data['is_featured'] = 0; // ou toute autre valeur par défaut
      }
      // $this->db->select_max('id');
      // $this->db->select('expired_date');
      // $this->db->where('user_id', $data['user_id']);
      // $package_purchased_history = $this->db->get('package_purchased_history');
      // if ($package_purchased_history->num_rows() > 0) {
      //   $data['package_expiry_date'] = $package_purchased_history->row('expired_date');
      // } else {
      //   $data['package_expiry_date'] = '';
      // }
      $this->db->select('expired_date, package_id');
      $this->db->where('user_id', $data['user_id']);
      $this->db->where('active', 1); // Ajoutez cette condition pour sélectionner le package actif
      $this->db->order_by('id', 'desc'); // Assurez-vous de trier par ordre décroissant pour obtenir le plus récent
      $this->db->limit(1); // Limitez aux résultats à 1 (le plus récent)
      $package_purchased_history = $this->db->get('package_purchased_history');
      
      if ($package_purchased_history->num_rows() > 0) {
          $data['package_expiry_date'] = $package_purchased_history->row('expired_date');
      } else {
          $data['package_expiry_date'] = '';
      }

    } else {
      $data['package_expiry_date'] = 'admin';
      $data['is_featured'] = $this->input->post('is_featured');
    }

    $data['country_id'] = sanitizer($this->input->post('country_id'));
    $data['city_id'] = sanitizer($this->input->post('city_id'));
    $data['state_id'] = sanitizer($this->input->post('state_id'));
    $data['address'] = sanitizer($this->input->post('address'));
    $data['latitude'] = sanitizer($this->input->post('latitude'));
    $data['longitude'] = sanitizer($this->input->post('longitude'));
    $data['google_analytics_id'] = sanitizer($this->input->post('google_analytics_id'));


    if (!empty($this->input->post('amenities'))) {
      $data['amenities'] = $this->make_json(sanitizer($this->input->post('amenities')));
    } else {
      $data['amenities'] = json_encode(array());
    }

    if (!empty($this->input->post('categories'))) {
      $data['categories'] = $this->make_json(sanitizer($this->input->post('categories')));
    } else {
      $data['categories'] = json_encode(array());
    }

    $data['reference'] = sanitizer($this->input->post('reference'));
    $data['marque'] = sanitizer($this->input->post('marque'));
    $data['modele'] = sanitizer($this->input->post('modele'));
    $data['prix'] = sanitizer($this->input->post('prix'));
    $data['couleur'] = sanitizer($this->input->post('couleur'));
    $data['etat'] = sanitizer($this->input->post('etat'));
    $data['os'] = sanitizer($this->input->post('os'));
    $data['reseau'] = sanitizer($this->input->post('reseau'));
    $data['memoire'] = sanitizer($this->input->post('memoire'));
    $data['ram'] = sanitizer($this->input->post('ram'));
    $data['sim'] = sanitizer($this->input->post('sim'));
    $data['copie'] = sanitizer($this->input->post('copie'));


    $data['video_provider'] = sanitizer($this->input->post('video_provider'));
    $data['video_url'] = sanitizer($this->input->post('video_url'));
    $data['tags'] = sanitizer($this->input->post('tags'));
    $data['seo_meta_tags'] = sanitizer($this->input->post('seo_meta_tags'));
    $data['meta_description'] = sanitizer($this->input->post('meta_description'));

    $data['website'] = sanitizer($this->input->post('website'));
    $data['email'] = sanitizer($this->input->post('email'));
    $data['phone'] = sanitizer($this->input->post('phone'));
    $data['listing_type'] = sanitizer($this->input->post('listing_type'));

    $social_links = array(
      'facebook' => sanitizer($this->input->post('facebook')),
      'twitter' => sanitizer($this->input->post('twitter')),
      'linkedin' => sanitizer($this->input->post('linkedin')),
    );
    $data['social'] = json_encode($social_links);
    $data['date_added'] = strtotime(date('D, d-M-Y'));
    $time_config = array();
    $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
    foreach ($days as $day) {
      $time_config[$day] = sanitizer($this->input->post($day . '_opening')) . '-' . sanitizer($this->input->post($day . '_closing'));
    }

    if ($_FILES['listing_thumbnail']['name'] == "") {
      $data['listing_thumbnail'] = 'thumbnail.png';
    } else {
      $data['listing_thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
      move_uploaded_file($_FILES['listing_thumbnail']['tmp_name'], 'uploads/listing_thumbnails/' . $data['listing_thumbnail']);
    }

    if ($_FILES['listing_cover']['name'] == "") {
      $data['listing_cover'] = 'thumbnail.png';
    } else {
      $data['listing_cover'] = md5(rand(10000000, 20000000)) . '.jpg';
      move_uploaded_file($_FILES['listing_cover']['tmp_name'], 'uploads/listing_cover_photo/' . $data['listing_cover']);
    }

    foreach ($_FILES['listing_images']['tmp_name'] as $listing_image) {
      if ($listing_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)) . '.jpg';
        move_uploaded_file($listing_image, 'uploads/listing_images/' . $random_identifier);
        array_push($photo_gallery, $random_identifier);
      }
    }
    $data['photos'] = json_encode($photo_gallery);
    $data['code'] = md5(rand(10000000, 20000000));

    if (strtolower($this->session->userdata('role')) == 'admin') {
      $data['status'] = 'active';
    } else {
      $data['status'] = 'pending';
    }

    $total_listing = $this->input->post('total_listing');
    $submited_listing = $this->input->post('submited_listing');

    $user_type = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row('role_id');

    if ($total_listing > $submited_listing || $user_type == '1') {
      $this->db->insert('listing', $data);
      $listing_id = $this->db->insert_id();
      $time_config['listing_id'] = $listing_id;
      $this->db->insert('time_configuration', $time_config);

      // Add listing inner details data
      $this->add_listing_type_wise_details(sanitizer($this->input->post('listing_type')), $listing_id);
      $this->session->set_flashdata('flash_message', get_phrase('listing_added_successfully'));
    } else {
      $this->session->set_flashdata('error_message', get_phrase('there_is_no_free_space_to_add_to_the_listing'));
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
    
//     function add_listing()
//   {
//     $photo_gallery  = array();
//     $listing_owner = $this->input->post('user_id');
//     if (isset($listing_owner) && !empty($listing_owner)) {
//       $data['user_id'] = $listing_owner;
//     } else {
//       $data['user_id'] = $this->session->userdata('user_id');
//     }
//     $data['name'] = sanitizer($this->input->post('title'));
//     $data['description'] = sanitizer($this->input->post('description'));


//     if ($this->session->userdata('user_login') == '1' || $this->session->userdata('user_id') != $data['user_id']) {
//       // $package_id = has_package($this->session->userdata('user_id'), 'package_id');
//       // $featured_status = $this->db->get_where('package', array('id' => $package_id))->row('featured');
//       // // $featured_status = $this->db->get_where('package')->row('featured');
//       // if ($featured_status == 0) {
//       //   $data['is_featured'] = 0;
//       // } else {
//       //   $data['is_featured'] = $this->input->post('is_featured');
//       // }
//       $package_id = has_package($this->session->userdata('user_id'), 'package_id');
//       if (is_array($package_id)) {
//           // Si $package_id est un tableau, choisissez l'élément approprié
//           $package_id = isset($package_id['package_id']) ? $package_id['package_id'] : null;
//       }
      
//       // Vérifiez si $package_id est défini avant d'utiliser dans la requête
//       if ($package_id !== null) {
//           $featured_stat = $this->db->get_where('package', array('id' => $package_id))->row_array();
      
//           if (!empty($featured_stat)) {
//               $featured_status = $featured_stat['featured'];
      
//               if ($featured_status == 0) {
//                   $data['is_featured'] = 0;
//               } else {
//                   $data['is_featured'] = $this->input->post('is_featured');
//               }
//           } else {
//               // Gérez le cas où $featured_stat est vide
//               $data['is_featured'] = 0; // ou toute autre valeur par défaut
//           }
//       } else {
//           // Gérez le cas où $package_id n'est pas défini correctement
//           $data['is_featured'] = 0; // ou toute autre valeur par défaut
//       }
//       // $this->db->select_max('id');
//       // $this->db->select('expired_date');
//       // $this->db->where('user_id', $data['user_id']);
//       // $package_purchased_history = $this->db->get('package_purchased_history');
//       // if ($package_purchased_history->num_rows() > 0) {
//       //   $data['package_expiry_date'] = $package_purchased_history->row('expired_date');
//       // } else {
//       //   $data['package_expiry_date'] = '';
//       // }
//       $this->db->select('expired_date, package_id');
//       $this->db->where('user_id', $data['user_id']);
//       $this->db->where('active', 1); // Ajoutez cette condition pour sélectionner le package actif
//       $this->db->order_by('id', 'desc'); // Assurez-vous de trier par ordre décroissant pour obtenir le plus récent
//       $this->db->limit(1); // Limitez aux résultats à 1 (le plus récent)
//       $package_purchased_history = $this->db->get('package_purchased_history');
      
//       if ($package_purchased_history->num_rows() > 0) {
//           $data['package_expiry_date'] = $package_purchased_history->row('expired_date');
//       } else {
//           $data['package_expiry_date'] = '';
//       }

//     } else {
//       $data['package_expiry_date'] = 'admin';
//       $data['is_featured'] = $this->input->post('is_featured');
//     }

//     $data['country_id'] = sanitizer($this->input->post('country_id'));
//     $data['city_id'] = sanitizer($this->input->post('city_id'));
//     $data['state_id'] = sanitizer($this->input->post('state_id'));
//     $data['address'] = sanitizer($this->input->post('address'));
//     $data['latitude'] = sanitizer($this->input->post('latitude'));
//     $data['longitude'] = sanitizer($this->input->post('longitude'));
//     $data['google_analytics_id'] = sanitizer($this->input->post('google_analytics_id'));


//     if (!empty($this->input->post('amenities'))) {
//       $data['amenities'] = $this->make_json(sanitizer($this->input->post('amenities')));
//     } else {
//       $data['amenities'] = json_encode(array());
//     }

//     if (!empty($this->input->post('categories'))) {
//       $data['categories'] = $this->make_json(sanitizer($this->input->post('categories')));
//     } else {
//       $data['categories'] = json_encode(array());
//     }


//     $data['video_provider'] = sanitizer($this->input->post('video_provider'));
//     $data['video_url'] = sanitizer($this->input->post('video_url'));
//     $data['tags'] = sanitizer($this->input->post('tags'));
//     $data['seo_meta_tags'] = sanitizer($this->input->post('seo_meta_tags'));
//     $data['meta_description'] = sanitizer($this->input->post('meta_description'));

//     $data['website'] = sanitizer($this->input->post('website'));
//     $data['email'] = sanitizer($this->input->post('email'));
//     $data['phone'] = sanitizer($this->input->post('phone'));
//     $data['listing_type'] = sanitizer($this->input->post('listing_type'));

//     $social_links = array(
//       'facebook' => sanitizer($this->input->post('facebook')),
//       'twitter' => sanitizer($this->input->post('twitter')),
//       'linkedin' => sanitizer($this->input->post('linkedin')),
//     );
//     $data['social'] = json_encode($social_links);
//     $data['date_added'] = strtotime(date('D, d-M-Y'));
//     $time_config = array();
//     $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
//     foreach ($days as $day) {
//       $time_config[$day] = sanitizer($this->input->post($day . '_opening')) . '-' . sanitizer($this->input->post($day . '_closing'));
//     }

//     if ($_FILES['listing_thumbnail']['name'] == "") {
//       $data['listing_thumbnail'] = 'thumbnail.png';
//     } else {
//       $data['listing_thumbnail'] = md5(rand(10000000, 20000000)) . '.jpg';
//       move_uploaded_file($_FILES['listing_thumbnail']['tmp_name'], 'uploads/listing_thumbnails/' . $data['listing_thumbnail']);
//     }

//     if ($_FILES['listing_cover']['name'] == "") {
//       $data['listing_cover'] = 'thumbnail.png';
//     } else {
//       $data['listing_cover'] = md5(rand(10000000, 20000000)) . '.jpg';
//       move_uploaded_file($_FILES['listing_cover']['tmp_name'], 'uploads/listing_cover_photo/' . $data['listing_cover']);
//     }

//     foreach ($_FILES['listing_images']['tmp_name'] as $listing_image) {
//       if ($listing_image != "") {
//         $random_identifier = md5(rand(10000000, 20000000)) . '.jpg';
//         move_uploaded_file($listing_image, 'uploads/listing_images/' . $random_identifier);
//         array_push($photo_gallery, $random_identifier);
//       }
//     }
//     $data['photos'] = json_encode($photo_gallery);
//     $data['code'] = md5(rand(10000000, 20000000));

//     if (strtolower($this->session->userdata('role')) == 'admin') {
//       $data['status'] = 'active';
//     } else {
//       $data['status'] = 'pending';
//     }

//     $total_listing = $this->input->post('total_listing');
//     $submited_listing = $this->input->post('submited_listing');

//     $user_type = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row('role_id');

//     if ($total_listing > $submited_listing || $user_type == '1') {
//       $this->db->insert('listing', $data);
//       $listing_id = $this->db->insert_id();
//       $time_config['listing_id'] = $listing_id;
//       $this->db->insert('time_configuration', $time_config);

//       // Add listing inner details data
//       $this->add_listing_type_wise_details(sanitizer($this->input->post('listing_type')), $listing_id);
//       $this->session->set_flashdata('flash_message', get_phrase('listing_added_successfully'));
//     } else {
//       $this->session->set_flashdata('error_message', get_phrase('there_is_no_free_space_to_add_to_the_listing'));
//     }
//   }

}
