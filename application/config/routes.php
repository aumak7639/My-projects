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

$route['default_controller'] = "Frontend";
$route['404_override'] = 'frontend/pageNotFound';


/*********** ADMIN ROUTES *******************/







$route['admin'] = 'admin/login/loginMe';
$route['admin/login'] = 'admin/login/loginMe';
$route['admin/loginMe'] = 'admin/login/loginMe';
$route['admin/dashboard'] = 'admin/common_controller/index';
$route['admin/logout'] = 'admin/user/logout';
$route['admin/userListing'] = 'admin/user/userListing';
$route['admin/userListing/(:num)'] = "admin/user/userListing/$1";
$route['admin/addNew'] = "admin/user/addNew";

$route['admin/addNewUser'] = "admin/user/addNewUser";
$route['admin/editOld'] = "admin/user/editOld";
$route['admin/editOld/(:num)'] = "admin/user/editOld/$1";
$route['admin/editUser'] = "admin/user/editUser";
$route['admin/deleteUser'] = "admin/user/deleteUser";
$route['admin/loadChangePass'] = "admin/user/loadChangePass";
$route['admin/changePassword'] = "admin/user/changePassword";
$route['admin/pageNotFound'] = "admin/user/pageNotFound";
$route['admin/checkEmailExists'] = "admin/user/checkEmailExists";

$route['admin/forgotPassword'] = "admin/login/forgotPassword";
$route['admin/resetPasswordUser'] = "admin/login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "admin/login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "admin/login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "admin/login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "admin/login/createPasswordUser";
$route['admin/status-update'] = "admin/common_controller/status_update";


$route['admin/insert_cat_slider_data'] = "admin/common_controller/insert_cat_slider_data";
$route['admin/categories'] = "admin/category/list_category_page";
$route['admin/properties-master'] = "admin/common_controller/properties_master";
$route['admin/sub-categories'] = "admin/category/list_sub_category_page";
$route['admin/child-categories'] = "admin/category/list_child_category_page";
$route['admin/deletecats'] = "admin/common_controller/deletecats";

$route['admin/technical-specifications'] = "admin/Product/technical_specifications";

$route['admin/brands'] = "admin/Product/brands";
$route['admin/orders'] = "admin/common_controller/orders";
$route['admin/order-details/(:any)'] = "admin/common_controller/order_details/$1";
$route['admin/customers'] = "admin/common_controller/customers";

$route['admin/insert'] = "admin/common_controller/insert";
$route['admin/related-products-update'] = "admin/common_controller/rproducts_update";

$route['admin/insert_product'] = "admin/common_controller/insert_product";
$route['admin/update_product'] = "admin/common_controller/update_product";
$route['admin/update'] = "admin/common_controller/update";
$route['admin/update_product_properties_data'] = "admin/common_controller/update_product_properties_data";
$route['admin/get_records'] = "admin/common_controller/get_records";
$route['admin/delete_data'] = "admin/common_controller/delete_data";
$route['admin/delete_data_2'] = "admin/common_controller/delete_data_2";
$route['admin/get-table-data'] = "admin/common_controller/get_table_data";

$route['admin/related-products'] = "admin/common_controller/related_products";
$route['admin/header-menu'] = "admin/common_controller/header_menu";
$route['admin/top-header'] = "admin/common_controller/top_header";
$route['admin/bottom-footer'] = "admin/common_controller/bottom_footer";

$route['admin/products'] = "admin/Product/list_product_page";
$route['admin/product/(:any)'] = "admin/Product/edit_product_page/$1";
$route['admin/add-product'] = "admin/Product/add_product_page";
$route['admin/product-additional-images/(:any)'] = "admin/common_controller/product_additional_images/$1";
$route['admin/product-dimensions-images/(:any)'] = "admin/common_controller/product_dimensions_images/$1";

$route['admin/update_header_menu'] = "admin/common_controller/update_header_menu";
$route['admin/menu-header-images'] = "admin/common_controller/menu_header_images";
$route['admin/menu_header_images_post'] = "admin/common_controller/menu_header_images_post";

$route['admin/sections'] = "admin/common_controller/list_sections_page";

$route['admin/stores'] = "admin/common_controller/stores";

$route['admin/new-page'] = "admin/common_controller/new_page";
$route['admin/pages'] = "admin/common_controller/pages";
$route['admin/page-editor/(:any)'] = "admin/common_controller/page_editor/$1";
$route['admin/edit-page/(:any)'] = "admin/common_controller/edit_page/$1";
$route['admin/update_page_sections'] = "admin/common_controller/update_page_sections";
$route['admin/page/section/(:any)/(:any)'] = "admin/common_controller/update_page_section/$1/$2";

$route['admin/contact-form'] = "admin/common_controller/contact_form";
$route['admin/contact_list'] = "admin/category/contact_list";
$route['contact-form-post'] = 'frontend/contact_form_post';


$route['admin/order-help-center'] = "admin/common_controller/order_help_center";
$route['admin/product-enquiry'] = "admin/common_controller/product_enquiry";

$route['admin/payouts'] = "admin/common_controller/payouts";
$route['admin/paid-payouts'] = "admin/common_controller/paid_payouts"; 
$route['admin/unpaid-payouts'] = "admin/common_controller/unpaid_payouts";

$route['admin/payout_status_update'] = "admin/common_controller/payout_status_update";

$route['admin/customers-report'] = "admin/common_controller/customers_report";
$route['admin/stores-report'] = "admin/common_controller/stores_report";
$route['admin/orders-report'] = "admin/common_controller/orders_report";
$route['admin/products-report'] = "admin/common_controller/products_report";

$route['admin/coupons'] = "admin/common_controller/coupons";
$route['admin/insert_coupon_data'] = "admin/common_controller/insert_coupon_data";

$route['admin/orders-transactions'] = "admin/common_controller/orders_transactions";

$route['admin/reviews'] = "admin/common_controller/reviews";

$route['admin/new-blog'] = "admin/common_controller/new_blog";
$route['admin/list-blogs'] = "admin/common_controller/list_blogs";
$route['admin/edit-blog/(:any)'] = "admin/common_controller/edit_blog/$1";

$route['admin/newsletter'] = "admin/common_controller/newsletter";

$route['admin/pincodes'] = "admin/common_controller/pincodes";
$route['admin/from-new-pincodes-post'] = "admin/common_controller/from_new_pincodes_post";
$route['admin/add_new_color_variant'] = "admin/common_controller/add_new_color_variant";

/*********** FRONTEND ROUTES *******************/
/*******Sea FOOD Frontend ***/

$route['seaproduct/(:any)'] = "frontend/sea_product/$1";
$route['about-us'] = "frontend/about_us";
$route['courses'] = "frontend/Courses";
$route['contact-us'] = "frontend/contact_us";
$route['sort']="frontend/sort";



$route['comment']="frontend/insert";







$route['Dashboard']="frontend/dashboard";



// $route['my-account']='frontend/my_account';
// $route['my-account']='frontend/myaccount_dashboard';
$route['wishlist-insert']='frontend/wishlist_insert';
$route['login'] = 'frontend/index';
$route['loginPost'] = 'frontend/loginPost';
$route['registerPost'] = 'frontend/registerPost';
$route['orders'] = 'frontend/orders';
$route['form_forget_password_post'] = 'frontend/form_forget_password_post';
$route['form_forget_password_otp'] = 'frontend/form_forget_password_otp';
$route['form_set_forget_password'] = 'frontend/form_set_forget_password';
$route['registerPostOTP'] = 'frontend/registerPostOTP';
$route['logout'] = 'frontend/logout';
$route['contact'] = 'frontend/contact';
$route['contact-form-post'] = 'frontend/contact_form_post';
$route['how-it-works'] = 'frontend/how_it_works';

$route['update-security-settings-form-post'] = 'frontend/update_security_settings_form_post';
$route['update-profile-form-post'] = 'frontend/update_profile_form_post';

$route['get_sub_categories'] = 'frontend/get_sub_categories';
$route['get_child_categories'] = 'frontend/get_child_categories';

$route['my-profile'] = 'frontend/my_profile';
$route['my-account'] = 'frontend/my_profile';
$route['security-settings'] = 'frontend/security_settings';
$route['my-requests'] = 'frontend/my_requests';

$route['add-to-cart'] = 'frontend/add_to_cart';
$route['add-to-cart-single'] = 'frontend/add_to_cart_single';
$route['buy-now-option'] = 'frontend/buy_now_option';
$route['update-cart'] = 'frontend/update_cart';
$route['product-wishlist'] = 'frontend/product_wishlist';
$route['product-compare'] = 'frontend/product_compare';
$route['product-compare-remove'] = 'frontend/product_compare_remove';
$route['remove-cart-item'] = 'frontend/remove_cart_item';
$route['update_cart_icon'] = 'frontend/update_cart_icon';
$route['get_cart_count'] = 'frontend/get_cart_count';
$route['cart'] = 'frontend/cart';
$route['favourites'] = 'frontend/my_profile';

$route['compare'] = 'frontend/compare';

$route['getQuickViewModalContent'] = 'frontend/getQuickViewModalContent';

$route['checkout'] = 'frontend/checkout';
$route['checkoutPost'] = 'frontend/checkoutPost';

$route['apply-coupon'] = 'frontend/apply_coupon';

$route['payment/(:any)'] = 'frontend/checkoutpayment/$1';
$route['product-order/update-payment-details'] = 'frontend/product_order_update_payment_details';

$route['my-orders'] = 'frontend/my_orders';
$route['order-success/(:any)'] = 'frontend/order_success/$1';
$route['order/(:any)'] = 'frontend/order/$1';

$route['from_contact_order_help'] = 'frontend/from_contact_order_help';

$route['search'] = 'frontend/search';
$route['search-product'] = 'frontend/search_product';
$route['tags/(:any)'] = 'frontend/shop_tags/$1';

$route['payment-success/(:any)'] = 'frontend/payment_success/$1';
$route['payment-failure'] = 'frontend/payment_failure';

$route['blog/(:any)/(:any)'] = "frontend/blog/$1/$2";
$route['blog'] = "frontend/blogs";

$route['newsletter-post'] = "frontend/newsletter_post";

$route['pincode_check'] = "frontend/pincode_check";

$route['review-post'] = "frontend/review_post";
$route['price'] = "frontend/price_filter";

$route['cron-job'] = 'frontend/cron_job';
$route['shop'] = 'frontend/shop';
$route['shops/(:any)'] = 'frontend/shops/$1';
$route['shops/(:any)/(:any)'] = 'frontend/shops/$1/$2';
$route['login'] = 'frontend/login_page';

$route['(:any)'] = 'frontend/control_function/$1/20';
$route['(:any)/(:any)'] = 'frontend/control_function/$1/$2';