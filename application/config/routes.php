<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
| Examples:	my-controller	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routes for user section
$route['login'] = 'Login';
$route['register'] = 'Register';
$route['home'] = 'Home';
$route['checkout'] = 'Checkout';
$route['shoppingcart'] = 'ShoppingCart';
$route['singleProduct'] = 'Product/view';
$route['profile'] = 'Profile';

// Routes for admin section
$route['admin/login'] = 'admin/Login';
$route['admin/register'] = 'admin/Register';
$route['admin/dashboard'] = 'admin/Dashboard';
$route['admin/orderdata'] = 'admin/OrderData';
$route['admin/productcategory'] = 'admin/ProductCategory';
$route['admin/productdata'] = 'admin/ProductData';
$route['admin/productstock'] = 'admin/ProductStock';
$route['admin/salesdata'] = 'admin/SalesData';
$route['admin/storedata'] = 'admin/StoreData';
$route['admin/userdata'] = 'admin/UserData';
$route['admin/userdataadmin'] = 'admin/UserDataAdmin';
$route['admin/userdatacustomer'] = 'admin/UserDataCustomer';
$route['admin/userdataemployee'] = 'admin/UserDataEmployee';

// Routes for employee section
$route['employee/login'] = 'employee/Login';
$route['employee/orderdata'] = 'employee/OrderData';
$route['employee/ordermanual'] = 'employee/OrderManual';
$route['employee/productcategory'] = 'employee/ProductCategory';
$route['employee/productdata'] = 'employee/ProductData';
$route['employee/productstock'] = 'employee/ProductStock';
$route['employee/dashboard'] = 'employee/Dashboard';