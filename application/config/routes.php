<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'base';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about-us'] = 'base/about_us';
$route['menu'] = 'base/menu';
$route['gallery'] = 'base/gallery';
$route['contact-us'] = 'base/contact_us';


# For Admin #


$route['admin'] = 'auth/login';
$route['adminpanel'] = 'auth/login';


