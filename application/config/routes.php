<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#Start Schedule#
$route['schedule/update'] = 'schedule/update';
$route['schedule/create'] = 'schedule/create';
$route['schedule/(:any)'] = 'schedule/view/$1';
$route['schedule'] = 'schedule/index';
#End Schedule#

#Start Learning Hub#
$route['material/seemorevideos/(:any)'] = 'material/seemorevideos/$1';
$route['material/seemorefiles/(:any)'] = 'material/seemorefiles/$1';
$route['section_b'] = 'material/section_b';
$route['material'] = 'material/index';
#End Success Story#

#*Start Material Learning#
$route['learning/createvideo'] = 'learning/createvideo';
$route['learning/docreatefile'] = 'learning/docreatefile';
$route['learning/docreatevideo'] = 'learning/docreatevideo';
$route['learning/docreate'] = 'learning/docreate';
$route['learning/updatefile'] = 'learning/updatefile';
$route['learning/updatevideo'] = 'learning/updatevideo';
$route['learning/update'] = 'learning/update';
$route['learning/edit'] = 'learning/edit';
$route['learning/editfile/(:any)'] = 'learning/editfile/$1';
$route['learning/viewfile/(:any)'] = 'learning/viewfile/$1';
$route['learning/createfile'] = 'learning/createfile';
$route['learning/create'] = 'learning/create';
//$route['learning/(:any)'] = 'learning/viewfile/$1';
$route['learning/editvideo/(:any)'] = 'learning/editvideo/$1';
$route['learning/viewvideo/(:any)'] = 'learning/viewvideo/$1';
//$route['learning/(:any)'] = 'learning/view/$1';
$route['learning'] = 'learning/index';
#End Material Learning#

#*Start Products#
$route['products/update'] = 'products/update';
$route['products/create'] = 'products/create';
$route['products/(:any)'] = 'products/view/$1';
$route['products'] = 'products/index';
#End Products#

#*Start Success Story#
$route['success/update'] = 'success/update';
$route['success/create'] = 'success/create';
$route['success/(:any)'] = 'success/view/$1';
$route['success'] = 'success/index';
#End Success Story#

#Start Gallery/Articles#
$route['gallery/(:any)/(:any)'] = 'gallery/view/$1/$1';
$route['gallery/(:any)'] = 'gallery/index/$1';
$route['gallery'] = 'gallery/index';
#End Gallery/Articles#

#Start Success Story#
$route['story/(:any)/(:any)/(:any)'] = 'story/view/$1/$1/$1';
$route['story/(:any)/(:any)'] = 'story/index/$1/$1';
$route['story/(:any)'] = 'story/index/$1';
$route['story'] = 'story/index';
#End Success Story#

$route['productpage'] = 'productpage/index'; //product
$route['hit'] = 'hit/index'; //hit counter
$route['users'] = 'admin/index'; //user profile*
$route['mypage'] = 'members/mypage'; 
$route['products'] = 'products/index'; //product *
$route['password'] = 'members/password';	
$route['member'] = 'members/index';	 //membership *
$route['forgot'] = 'agents/forgot';	 //forgot password 
$route['signup'] = 'agents/sign_up'; //register 
$route['signin'] = 'agents/index';	//login 
$route['contacts/(:any)'] = 'contacts/index/$1'; //contact us
$route['contacts'] = 'contacts/index';	

$route['videos'] = 'videos/index';

#Start Post Articles#
$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
#Start Post Articles#

$route['about/(:any)'] = 'about/index/$1'; //about me replica

$route['articles/(:any)/(:any)'] = 'pages/view_post/$1/$1';
$route['articles/(:any)'] = 'pages/view_post/$1';
$route['contents'] = 'contents/index'; //view my page 
$route['default_controller'] = 'pages/view'; //home index
$route['(:any)'] = 'pages/view_agent/$1';	// replica
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
