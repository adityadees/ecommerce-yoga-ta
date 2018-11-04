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
$route['blogs/(:any)']='blog/detail/$1';
*/

$route['admin/logout']='loginadmin/logout';
$route['admin']='padmin';
$route['logout']='login/logout';
$route['forum/forum']='padmin/forum';
$route['forum/forum/(:any)'] = 'padmin/subforum/$1';
$route['bank']='padmin/bank';
$route['user']='padmin/user';
$route['transaksi']='padmin/transaksi';
$route['invoice/(:any)']='padmin/invoice/$1';
$route['type']='padmin/type';
$route['list']='padmin/list_gitar';
$route['kategori']='padmin/kategori';
$route['laporan']='padmin/laporan';
$route['printr']='padmin/printr';
$route['printr/(:any)']='padmin/printrange/$1';
$route['rm_kategori']='padmin/rm_kategori';
$route['rm_item']='padmin/rm_item';
$route['shape']='padmin/shape';
$route['barang']='padmin/barang';
$route['account']='frontend/account';
$route['account/portfolio']='frontend/portfolio';
$route['portofolio']='frontend/portofolio';
$route['account/transaksi']='frontend/transaksi';
$route['account/setting']='frontend/setting';
$route['konfirmasi/(:any)']='frontend/konfirmasi/$1';
$route['account/inbox']='frontend/inbox';
$route['account/inbox/(:any)']='frontend/inbox_detail/$1';
$route['custom']='frontend/custom';
$route['repair']='frontend/repair';
$route['cart']='frontend/cart';
$route['cart/(:any)']='frontend/detail_cart/$1';
$route['forum']='frontend/forum';
$route['forum/(:any)'] = 'frontend/subforum/$1';
$route['reply/(:any)'] = 'frontend/reply/$1';
$route['forum/newtopic/(:any)'] = 'frontend/newtopic/$1';
$route['forum/(:any)/(:any)'] = 'frontend/topic/$1';
$route['Register']='frontend/register';
$route['default_controller'] = 'frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
