<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'vue';
$route['404_override'] = 'home/page_missing';
$route['translate_uri_dashes'] = FALSE;
$route['api/(:any)'] = 'api/$1';
$route['api/get_categories/(:any)'] = 'api/get_categories/$1';
$route['api/get_categories_parent/(:any)'] = 'api/get_categories_parent/$1';
$route['api/filter_listings'] = 'api/filter_listings';
$route['api/filter_listings/(:any)'] = 'api/filter_listings/$1';
$route['api/get_listing_id'] = 'api/get_listing_id';
$route['api/get_listing_id/(:any)'] = 'api/get_listing_id/$1';
$route['api/get_slug_name'] = 'api/get_slug_name';
$route['api/get_slug_name/(:any)'] = 'api/get_slug_name/$1';
$route['api/get_phrase'] = 'api/get_phrase';
$route['api/get_phrase/(:any)'] = 'api/get_phrase/$1';
$route['api/get_country'] = 'api/get_country';
$route['api/get_country/(:any)'] = 'api/get_country/$1';
$route['api/get_countries'] = 'api/get_countries';
$route['api/get_countries/(:any)'] = 'api/get_countries/$1';
$route['api/register_post'] = 'api/register_post';
$route['api/register_post/(:any)'] = 'api/register_post/$1';
$route['api/get_user_thumbnail'] = 'api/get_user_thumbnail';
$route['api/get_user_thumbnail/(:any)'] = 'api/get_user_thumbnail/$1';
$route['api/get_user_detail'] = 'api/get_user_detail';
$route['api/get_user_detail/(:any)'] = 'api/get_user_detail/$1';
$route['api/get_amenities'] = 'api/get_amenities';
$route['api/get_amenities/(:any)'] = 'api/get_amenities/$1';
$route['home/listing'] = 'home/listing';
$route['annonces'] = 'vue';
$route['annonces/(:any)'] = 'vue';
$route['user'] = 'vue';
$route['redister'] = 'vue';
$route['profil'] = 'vue';
$route['emploi/profil'] = 'vue';
$route['emploi/candidatures'] = 'vue';
$route['mes-reservations'] = 'vue';
$route['mes-transactions'] = 'vue';
$route['mon-compte'] = 'vue';
$route['user/(:any)'] = 'vue';
$route['depose_annonces'] = 'vue';
$route['depose-une-annonces'] = 'vue';
$route['mes-annonces'] = 'vue';
$route['se-connecter'] = 'vue';
$route['home/listing/(:any)'] = 'home/listing/$1';
$route['recherche'] = 'home/search';
$route['recherche/(:any)'] = 'home/search/$1';
$route['api/get_settings'] = 'api/get_settings';
$route['api/get_settings/(:any)'] = 'api/get_settings/$1';
$route['home/filter_listings'] = 'home/filter_listings';
$route['home/filter_listings/(:any)'] = 'home/filter_listings/$1';
$route['api/get_frontend_settings/(:any)'] = 'api/get_frontend_settings/$1';
$route['api/get_all_users'] = 'api/get_all_users';
$route['api/get_all_users/(:any)'] = 'api/get_all_users/$1';
$route['api/get_sub_categories'] = 'api/get_sub_categories';
$route['api/get_sub_categories/(:any)'] = 'api/get_sub_categories/$1';
$route['api/get_listing_by_user_id'] = 'api/get_listing_by_user_id';
$route['api/get_listing_by_user_id/(:any)'] = 'api/get_listing_by_user_id/$1';
$route['api/get_listing_by_user_id_result'] = 'api/get_listing_by_user_id_result';
$route['api/get_listing_by_user_id_result/(:any)'] = 'api/get_listing_by_user_id_result/$1';
$route['api/now_open'] = 'api/now_open';
$route['api/now_open/(:any)'] = 'api/now_open/$1';
$route['api/get_cities/(:any)'] = 'api/get_cities/$1';
$route['api/validate_login_api']['POST'] = 'api/validate_login_api';
$route['api/validate_login_api/(:any)']['POST'] = 'api/validate_login_api/$1';
$route['message'] = 's/chat/index';
$route['message/send-message'] = 's/chat/send_text_message';
$route['message/chat-attachment/upload'] = 's/chat/send_text_message';
$route['message/get-chat-history-vendor'] = 's/chat/get_chat_history_by_vendor';
$route['message/chat-clear'] = 's/chat/chat_clear_client_cs';
$route['api/subscribes'] = 'newsletter/subscribe';
$route['api/add_listing'] = 'newsletter/subscribe';
$route['api/add_listing'] = 'api/add_listing';
$route['login/pending_email'] = 'login/pending_email';
$route['login/verify_email'] = 'login/verify_email';


//custom URL
$route['general/(:any)/(:any)'] = 'home/listing/$1/$2';
$route['hotel/(:any)/(:any)'] = 'home/listing/$1/$2';
$route['restaurant/(:any)/(:any)'] = 'home/listing/$1/$2';
$route['shop/(:any)/(:any)'] = 'home/listing/$1/$2';
$route['beauty/(:any)/(:any)'] = 'home/listing/$1/$2';

/**
 * We will use manual routes only for the API calls
 * We also defined spesific HTTP methods
 */
$route['api/v1/users']['GET'] = 'api/v1/user';
$route['api/v1/users/(:num)']['GET'] = 'api/v1/user/show/$1';
$route['api/v1/test-login/(:any)']['POST'] = 'api/v1/auth/test_login/$1';
$route['api/(.*)'] = '404';