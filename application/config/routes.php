<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'Scraper/index';
$route['404_override'] = '';

/*admin*/
$route['admin'] = 'user/index';

$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

$route['admin/website'] = 'admin_website/index';
$route['admin/website/listcontent/(:any)'] = 'admin_website/listcontent/$1';
$route['admin/website/add'] = 'admin_website/add';
$route['admin/website/viewcontent/(:any)']='admin_website/viewcontent/$1';

$route['admin/website/update'] = 'admin_website/update';
$route['admin/website/update/(:any)'] = 'admin_website/update/$1';
$route['admin/website/delete/(:any)'] = 'admin_website/delete/$1';
$route['admin/website/(:any)'] = 'admin_website/index/$1'; //$1 = page number




/* End of file routes.php */
/* Location: ./application/config/routes.php */