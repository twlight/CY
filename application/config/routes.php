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
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['wait'] = 'wait';

$route['hotloan'] = 'hotloan/index';
$route['hotloan/get_loan/(:any)'] = 'hotloan/get_loan/$1';
$route['hotloan/(:any)'] = 'hotloan/view/$1';

$route['releaseloan'] = 'releaseloan';
$route['releaseloan/success'] = 'releaseloan/success';

$route['loandetail'] = 'loandetail';
$route['loandetail/updateuserinfo'] = 'loandetail/updateuserinfo';
$route['loandetail/updateuserinfo/(:any)'] = 'loandetail/updateuserinfo/$1';
$route['loandetail/index'] = 'loandetail/index';
$route['loandetail/index/(:any)'] = 'loandetail/index/(:any)';
$route['loandetail/post'] = 'loandetail/post';
$route['loandetail/success'] = 'loandetail/success';
$route['loandetail/(:any)'] = 'loandetail';

$route['mainpage'] = 'mainpage';
$route['mainpage/calc'] = 'mainpage/calc';
$route['mainpage/calc/(:any)'] = 'mainpage/calc/$1';
$route['mainpage/getnormaluser'] = 'mainpage/getnormaluser';
$route['mainpage/get_user'] = 'mainpage/get_user';
$route['mainpage/get_user/(:any)'] = 'mainpage/get_user/$1';
$route['mainpage/getnormaluser/(:any)'] = 'mainpage/getnormaluser/$1';
$route['mainpage/addnormaluser'] = 'mainpage/addnormaluser';
$route['mainpage/addnormaluser/(:any)'] = 'mainpage/addnormaluser/$1';
$route['mainpage/(:any)'] = 'mainpage/view/$1';

$route['default_controller'] = 'mainpage';
/* End of file routes.php */
/* Location: ./application/config/routes.php */