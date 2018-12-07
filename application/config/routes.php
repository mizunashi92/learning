<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['docs'] = 'docs/index';
$route['videos'] = 'videos/index';
$route['default_controller'] = 'main/index';
$route['404_override'] = 'main/index';
$route['translate_uri_dashes'] = FALSE;
