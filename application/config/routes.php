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

/* Auth */
$route['login'] = 'su_auth/login';
$route['logout'] = 'su_auth/logout';
$route['forgot'] = 'su_auth/forgot_password';


/* Home */
$route['services'] = 'pu_home/services';
$route['portfolio'] = 'pu_home/portfolio';
$route['portfolio/(:num)/(:any)'] = 'pu_home/portfolio/$1/$2';
$route['about'] = 'pu_home/about';

/* General */
$route['dashboard'] = 'su_admin/dashboard';

/* SU */
$route['user/profile'] = 'su_admin/profile';
$route['user/add'] = 'su_admin/create_user/';
$route['user/edit/(:any)'] = 'su_admin/update_user/$1';
$route['user/details/(:any)'] = 'su_admin/profile/$1';
$route['user/permissions/(:any)'] = 'su_admin/user_permissions/$1';
$route['user/permissions/(:any)'] = 'su_admin/user_permissions/$1';
$route['user/(:any)'] = 'pu_home/view_profile/$1';

$route['manage/(:any)'] = 'su_admin/data/$1';
$route['setting/(:any)'] = 'su_admin/setting/$1';
$route['c_data/c_users/(:any)'] = 'su_admin/c_data/c_users/$1';
$route['c_data/c_groups/(:any)'] = 'su_admin/c_data/c_groups/$1';
$route['c_data/c_groups/(:any)/(:any)'] = 'su_admin/c_data/c_groups/$1/$2';
$route['c_data/c_permissions/(:any)'] = 'su_admin/c_data/c_permissions/$1';
$route['c_data/c_permissions/(:any)/(:any)'] = 'su_admin/c_data/c_permissions/$1/$2';

$route['permission/add'] = 'su_admin/add_permission';
$route['permission/edit/(:any)'] = 'su_admin/update_permission/$1';

$route['group/add'] = 'su_admin/add_group';
$route['group/edit/(:any)'] = 'su_admin/update_group/$1';
$route['group/permissions/(:any)'] = 'su_admin/group_permissions/$1';

/* knowledge */
$route['knowledge/add'] = 'su_knowledge/add_knowledge';
$route['knowledge/edit/(:any)'] = 'su_knowledge/update_knowledge/$1';
$route['knowledge/edit'] = 'su_knowledge/update_knowledge';
$route['knowledge/(:any)'] = 'su_knowledge/data/$1';
$route['knowledge/autosave'] = 'su_knowledge/autosave';

/* Post */
$route['post/(:any)/(:any)'] = 'pu_home/view_post/$1/$2';

$route['category/add'] = 'su_knowledge/add_category';
$route['category/edit/(:any)'] = 'su_knowledge/update_category/$1';
$route['category/edit'] = 'su_knowledge/update_category';

$route['c_data/c_knowledge_draft/(:any)'] = 'su_knowledge/c_data/c_knowledge_draft/$1';
$route['c_data/c_knowledge_draft/(:any)/(:any)'] = 'su_knowledge/c_data/c_knowledge_draft/$1/$2';
$route['c_data/c_knowledge_publish/(:any)'] = 'su_knowledge/c_data/c_knowledge_publish/$1';
$route['c_data/c_knowledge_publish/(:any)/(:any)'] = 'su_knowledge/c_data/c_knowledge_publish/$1/$2';
$route['c_data/c_knowledge_category/(:any)'] = 'su_knowledge/c_data/c_knowledge_category/$1';
$route['c_data/c_knowledge_category/(:any)/(:any)'] = 'su_knowledge/c_data/c_knowledge_category/$1/$2';

/* other */
$route['default_controller'] = 'pu_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*


$route['change_password'] = 'su/change_password';
$route['create_user'] = 'su/create_user';
$route['create_group'] = 'su/create_group';
$route['edit_group/(:num)'] = 'su/edit_group/$1';
$route['activate'] = 'su/activate';

$route['penka/(:any)'] = 'su/penka/$1';

// Class auth hidden
$route['reset_password'] = 'auth/reset_password';

/* data *
$route['data/(:any)'] = 'su/data/$1';

/* add and edit *
$route['faculty/add'] = 'su/faculty/add';
$route['faculty/edit/(:num)'] = 'su/faculty/edit/$1';

$route['study_program/add'] = 'su/study_program/add';
$route['study_program/edit/(:num)'] = 'su/study_program/edit/$1';

$route['simpanan/pokok/add'] = 'su/simpanan/pokok/add';
$route['simpanan/pokok/add/(:num)'] = 'su/simpanan/pokok/add/$1';
$route['simpanan/sukarela/add'] = 'su/simpanan/sukarela/add';
$route['simpanan/sukarela/add/(:num)'] = 'su/simpanan/sukarela/add/$1';
$route['simpanan/wajib/add'] = 'su/simpanan/wajib/add';
$route['simpanan/wajib/add/(:num)'] = 'su/simpanan/wajib/add/$1';
*/


/*
$route['slide_show/(:any)'] = 'su/slide_show/$1';
$route['slide_show/(:any)/(:num)'] = 'su/slide_show/$1/$2';

$route['technical/add/(:num)'] = 'su/technical/add/$1';
$route['technical/edit/(:num)'] = 'su/technical/edit/$1';

$route['setting/seo'] = 'su/setting/seo';
$route['setting/social_media'] = 'su/setting/social_media';
$route['setting/info_web'] = 'su/setting/info_web';
$route['setting/info_detail'] = 'su/setting/info_detail';

// Class pu hidden
$route['home'] = 'pu/home';
$route['about'] = 'pu/about';
// events
$route['events'] = 'pu/events/';
$route['events/([a-zA-z_]+)'] = 'pu/events/$1';
$route['events/([a-zA-z_]+)/(:num)'] = 'pu/events/$1/$2';
$route['registration/([a-zA-z_]+)/(:num)'] = 'pu/registration/$1/$2';

$route['gallery'] = 'pu/gallery';
$route['contact'] = 'pu/contact';
*/



/* data *
$route['data/c_universitas'] = 'data/c_universitas';
$route['data/c_ukm'] = 'data/c_ukm';
$route['data/c_ukm'] = 'data/c_ukm';*/
