<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Frontend extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('frontend_model');
        $this->load->model('email_model');

        $this->global['pageTitle'] = "Seakings";

        $this->global['header_bottom'] = 1;

        $this->global['scripts'] = '';

        $this->global['tis'] = $this;

        $this->global['top_menu_logo'] = $this->frontend_model->get_records('tbl_general_settings', "option_name = 'top-header-logo'")[0];
        $this->global['top_menu_all_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' order by name asc");

        $this->global['bottom_footer_col1'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column1'")[0];
        $this->global['bottom_footer_col2'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column2'")[0];
        $this->global['bottom_footer_col3'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column3'")[0];
        $this->load->library("pagination");


        if (isset($_SESSION['login_id'])) {
            $this->global['user_details'] = $this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "'")[0];
        }
    }

    public function index() {

        $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

        $this->loadPage("index", $this->global);
    }

    public function how_it_works() {
        $this->global['pageTitle'] = "How It Works - SeakiNgs";

        $this->loadPage("how_it_works", $this->global);
    }

    public function blogs() {
        $this->global['pageTitle'] = "Blogs - SeakiNgs";

        $this->global['records'] = $this->frontend_model->get_records("tbl_blogs", "status = '0' order by id desc limit 0, 10");

        $this->global['totalBlogs'] = sizeof($this->frontend_model->get_records("tbl_blogs", "status = '0'"));

        $this->loadPage("blog", $this->global);
    }

    public function about_us() {

        $this->global['pageTitle'] = "Marumani";

        //$this->global['record'] = $this->frontend_model->get_records("tbl_product", "status = '0' and id=$id");

        $this->loadPage("about-us", $this->global);
    }

    public function Courses() {

        $this->global['pageTitle'] = "Marumani";

        //$this->global['record'] = $this->frontend_model->get_records("tbl_product", "status = '0' and id=$id");

        $this->loadPage("courses", $this->global);
    }

    public function dashboard() {

        $this->global['pageTitle'] = "sea product";

        $this->global['record'] = $this->frontend_model->get_records("tbl_product", "status = '0' and id=$id");

        $this->loadPage("my-account", $this->global);
    }

    public function contact_us() {

        $this->global['pageTitle'] = "sea product";

        $this->global['record'] = $this->frontend_model->get_records("tbl_contact_form", "status = '0' and id=$id");

        $this->loadPage("contact-us", $this->global);
    }

    public function compare() {
        $this->global['pageTitle'] = "Compare - SeakiNgs";

        $this->loadPage("compare", $this->global);
    }

    public function blog($id, $slug) {
        $records = $this->frontend_model->get_records("tbl_blogs", "status = '0' and id = '$id'");

        if (sizeof($records) > 0) {
            $this->global['record'] = $records[0];
            $this->global['pageTitle'] = $records[0]->meta_title . " - SeakiNgs";

            $this->loadPage("blog-detail", $this->global);
        } else {
            redirect('404');
        }
    }

    public function contact() {
        $this->global['pageTitle'] = "Contact us - SeakiNgs";

        $this->loadPage("contact", $this->global);
    }

    public function contact_form_post() {
        $data['result'] = 0;
        $info['name'] = $this->input->post("name");
        $info['email'] = $this->input->post("email");
        $info['phone_number'] = $this->input->post("phone_number");
        $info['subject'] = $this->input->post("subject");
        $info['message'] = $this->input->post("message");

        if ($insert_id = $this->frontend_model->insert("tbl_contact_form", $info)) {
            $this->email_model->contact_us($insert_id);
            $this->email_model->send_sms($info['phone_number'], "Thanks for contacting us. Our representative will get in touch with you shortly! - seakings.com");
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function review_post() {
        $data['result'] = 0;
        $info['product_id'] = $this->input->post("product_id");
        $info['comment'] = $this->input->post("comment");
        $info['ratings'] = $this->input->post("ratings");
        $info['user_id'] = $_SESSION['login_id'];

        if ($insert_id = $this->frontend_model->insert("tbl_reviews", $info)) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function newsletter_post() {
        $data['result'] = 0;
        $info['email'] = $this->input->post("email");

        if ($insert_id = $this->frontend_model->insert("tbl_newsletter", $info)) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function pincode_check() {
        $data['result'] = 0;
        $pincode = $this->input->post("pincode");

        if (sizeof($this->frontend_model->get_records('tbl_pincodes', "status = '0' and pincode = '$pincode'")) > 0) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function login() {
        redirect('/');
    }

    public function getQuickViewModalContent() {
        $this->load->view("public/includes/quickViewModalContent");
    }

    public function get_sub_categories() {
        if (isset($_POST['main-category'])) {
            $main_category = base64_decode($_POST['main-category']);
            $subs = $this->frontend_model->get_records("tbl_sub_category", "category_id = '$main_category' and status = '0' order by name asc");
            $i = 0;
            foreach ($subs as $sub) {
                $data['subs'][$i] = $sub;
                $data['subs'][$i]->value = base64_encode($sub->id);
                $data['subs'][$i]->name = ucfirst($sub->name);
                $i++;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function get_child_categories() {
        if (isset($_POST['sub-category'])) {
            $sub_category = base64_decode($_POST['sub-category']);
            $childs = $this->frontend_model->get_records("tbl_child_category", "sub_category_id = '$sub_category' and status = '0' order by name asc");
            $i = 0;
            foreach ($childs as $child) {
                $data['child'][$i] = $child;
                $data['child'][$i]->value = base64_encode($child->id);
                $data['child'][$i]->name = ucfirst($child->name);
                $i++;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function logout() {
        session_destroy();
        redirect(base_url());
    }

    public function form_forget_password_post() {
        $data['result'] = 0;
        if (!empty($this->input->post('phone'))) {
            $phone_number = $this->input->post('phone');
            $otp = rand(111111, 999999);
            $records = $this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $phone_number . "'");
            if (sizeof($records) > 0) {
                $info['otp'] = $otp;
                $this->frontend_model->update("tbl_general_users", $info, "id='" . $records[0]->id . "'");
                $_SESSION['forget_password_phone_number'] = $phone_number;
                $this->email_model->send_sms($phone_number, $otp . " is your OTP to reset your password for seakings.com account.");
                $data['result'] = 1;
            } else {
                $data['result'] = 2;
            }
        }
        echo json_encode($data);
    }

    public function form_forget_password_otp() {
        $data['result'] = 0;
        if (!empty($this->input->post('otp'))) {
            if (isset($_SESSION['forget_password_phone_number'])) {
                $otp = $this->input->post('otp');
                $records = $this->frontend_model->get_records('tbl_general_users', "otp = '" . $otp . "' and phone_number = '" . $_SESSION['forget_password_phone_number'] . "'");
                if (sizeof($records) > 0) {
                    $_SESSION['forget_password_otp_verified'] = true;
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    public function form_set_forget_password() {
        $data['result'] = 0;
        if (!empty($this->input->post('password'))) {
            if (isset($_SESSION['forget_password_phone_number']) && $_SESSION['forget_password_otp_verified'] == true) {
                $phone_number = $_SESSION['forget_password_phone_number'];
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password');
                if ($password == $confirm_password) {
                    $info['otp'] = "";
                    $info['is_verified'] = "1";
                    $info['password'] = md5($password);
                    $this->frontend_model->update("tbl_general_users", $info, "phone_number='" . $phone_number . "'");
                    unset($_SESSION['forget_password_phone_number']);
                    unset($_SESSION['forget_password_otp_verified']);
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    function insert() {

        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'row_id') {
                if ($key == 'slug') {
                    if (strlen($value) > 0) {
                        $info[$key] = $this->slugify($value);
                    } else {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    }
                } else {
                    $info[$key] = $value;
                }
            }
        }

        $table = $this->input->post('table_name');

        if ($table == "tbl_sections") {
            $info['section_code'] = "section-" . time() . "-" . uniqid();
        }

        $folder_name = 'common';


        if (sizeof($_FILES) > 0) {
            if ($table == 'tbl_product_images') {
                $incc = 0;
                while ($incc < sizeof($_FILES['file_name']['name'])) {
                    if ($_FILES['file_name']['error'][$incc] != 4) {
                        $file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['file_name']["name"][$incc], PATHINFO_EXTENSION));
                        if ($this->product_images_upload('file_name', $file_new_name, 'uploads/products/', $incc) == true) {
                            $info['file_name'] = $file_new_name;
                            //echo $file_new_name;
                            $this->frontend_model->insert('tbl_product_images', $info);
                        }
                    }

                    $incc++;
                }

                $data['result'] = 1;
            } elseif ($table == 'tbl_product_dimensions_images') {
                $incc = 0;
                while ($incc < sizeof($_FILES['file_name']['name'])) {
                    if ($_FILES['file_name']['error'][$incc] != 4) {
                        $file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['file_name']["name"][$incc], PATHINFO_EXTENSION));
                        if ($this->product_images_upload('file_name', $file_new_name, 'uploads/products/', $incc) == true) {
                            $info['file_name'] = $file_new_name;
                            //echo $file_new_name;
                            $this->frontend_model->insert('tbl_product_dimensions_images', $info);
                        }
                    }

                    $incc++;
                }

                $data['result'] = 1;
            } else {
                foreach ($_FILES as $key => $value) {
                    $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
                    if ($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true) {
                        $info[$key] = $file_new_name;
                    }
                }
                if ($insert_id = $this->frontend_model->insert($table, $info)) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                        $info2['slug'] = $info['slug'];
                        $this->frontend_model->update($table, $info2, "id=" . $insert_id);
                        $this->insert_slug($info, $table, $insert_id);
                    }
                    $data['result'] = 1;
                    $data['insert_id'] = $insert_id;
                } else {
                    $data['result'] = 0;
                }
            }
        } else {
            if ($insert_id = $this->frontend_model->insert($table, $info)) {
                if (array_key_exists('slug', $info)) {
                    $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                    $info2['slug'] = $info['slug'];
                    $this->frontend_model->update($table, $info2, "id=" . $insert_id);
                    $this->insert_slug($info, $table, $insert_id);
                }
                $data['result'] = 1;
                $data['insert_id'] = $insert_id;
            } else {
                $data['result'] = 0;
            }
        }

        echo json_encode($data);
    }

    public function loginPost() {
        if (!empty($this->input->post('email'))) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $records = $this->frontend_model->get_records('tbl_general_users', "email = '" . $email . "' and password = '" . $password . "' and is_verified = '1'");
            if (sizeof($records) > 0) {
                if ($records[0]->status == 0) {
                    $_SESSION['is_login'] = true;
                    $_SESSION['login_id'] = $records[0]->id;
                    $data['result'] = 1;
                    $data['base_url'] = base_url();
                } else {
                    $data['result'] = 2;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function registerPost() {
        $data['result'] = 0;
        if (!empty($this->input->post('email'))) {
            if ($this->input->post('password') == $this->input->post('confirm_password')) {
                $info['first_name'] = $this->input->post('first_name');
                $info['last_name'] = $this->input->post('last_name');
                $info['email'] = $this->input->post('email');
                $info['password'] = md5($this->input->post('password'));
                //$info['otp'] = rand(111111, 999999);;
                if (sizeof($this->frontend_model->get_records('tbl_general_users', "email = '" . $this->input->post('email') . "'")) > 0) {
                    $data['result'] = 2;
                } else {
                    if ($insert_id = $this->frontend_model->insert('tbl_general_users', $info)) {
                        //$this->email_model->send_sms($info['phone_number'], $info['otp'] . " is your OTP to verify your seakings.com account.");
                        $_SESSION['register_post_phone_number'] = $info['email'];
                        $data['result'] = 1;
                    }
                }
            }
        }
        echo json_encode($data);
    }

    public function registerPostOTP() {
        $data['result'] = 0;
        if (!empty($this->input->post('otp'))) {
            if (isset($_SESSION['register_post_phone_number'])) {
                $otp = $this->input->post('otp');
                $record = $this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $_SESSION['register_post_phone_number'] . "' and otp = '$otp'");
                if (sizeof($record) > 0) {
                    $info1['is_verified'] = "1";
                    $info1['otp'] = "";
                    $this->frontend_model->update("tbl_general_users", $info1, "phone_number='" . $_SESSION['register_post_phone_number'] . "'");
                    $_SESSION['is_login'] = true;
                    $_SESSION['login_id'] = $record[0]->id;
                    unset($_SESSION['register_post_phone_number']);
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    public function update_profile_form_post() {
        if (isset($_SESSION['login_id'])) {
            $info['first_name'] = $this->input->post('first_name');
            $info['last_name'] = $this->input->post('last_name');

            if ($this->frontend_model->update('tbl_general_users', $info, "id='$_SESSION[login_id]'")) {
                $data['result'] = 1;
                if ($this->input->post('password')) {
                    if ($this->input->post('new_password') == $this->input->post('confirm_new_password')) {
                        $password = md5($this->input->post('password'));
                        $info['password'] = md5($this->input->post('new_password'));
                        if (sizeof($this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "' and password='$password'")) > 0) {
                            if ($this->frontend_model->update('tbl_general_users', $info, "id = '" . $_SESSION['login_id'] . "'")) {
                                $data['result'] = 1;
                            } else {
                                $data['result'] = 0;
                            }
                        } else {
                            $data['result'] = 2;
                        }
                    } else {
                        $data['result'] = 0;
                    }
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function my_profile() {
        if (isset($_SESSION['is_login'])) {
            $this->global['pageTitle'] = "My Profile - SeakiNgs";

            $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

            $this->loadPage("my-account", $this->global);
        } else {
            redirect('404');
        }
    }

    public function security_settings() {
        $this->global['pageTitle'] = "Security Settings - SeakiNgs";

        $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

        $this->loadPage("security-settings", $this->global);
    }

    public function my_requests() {
        $this->global['pageTitle'] = "My Enquiries - SeakiNgs";

        $this->global['my_enquiries'] = $this->frontend_model->get_custom_query("select a.*, b.name as product_name, b.slug, b.product_image from tbl_product_enquiry as a, tbl_product as b where a.status = '0' and a.product_id = b.id and a.user_id = '$_SESSION[login_id]' order by id desc");

        $this->loadPage("my-requests", $this->global);
    }

    public function my_orders() {
        if (isset($_SESSION['is_login'])) {
            $user_id = $_SESSION['login_id'];
            $this->global['ongoing_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process != 'completed' and b.process != 'cancelled' order by id desc");
            $this->global['completed_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'completed' order by id desc");
            $this->global['cancelled_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'cancelled' order by id desc");

            $this->global['pageTitle'] = "My Orders - SeakiNgs";

            $this->loadPage("my-orders", $this->global);
        } else {
            redirect(base_url() . "login");
        }
    }

    public function order($order_id) {
        if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'id')) {
            if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') != 0) {
                if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') == $_SESSION['login_id']) {
                    $this->global['pageTitle'] = "Order - SeakiNgs";

                    $this->global['order'] = $this->frontend_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
                    $this->global['order_items'] = $this->frontend_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
                    $this->global['order_addresses'] = $this->frontend_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");

                    $this->loadPage("order-detail", $this->global);
                } else {
                    redirect(base_url());
                }
            } else {
                $this->global['pageTitle'] = "Order - SeakiNgs";

                $this->global['order'] = $this->frontend_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
                $this->global['order_items'] = $this->frontend_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
                $this->global['order_addresses'] = $this->frontend_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");

                $this->loadPage("order-detail", $this->global);
            }
        } else {
            redirect(base_url());
        }
    }

    public function order_success($order_id) {
        if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'id')) {
            if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') != 0) {
                if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') == $_SESSION['login_id']) {
                    $this->global['pageTitle'] = "Order Success - SeakiNgs";

                    unset($_SESSION['cart_items']);

                    $this->loadPage("order-success", $this->global);
                } else {
                    redirect(base_url());
                }
            } else {
                $this->global['pageTitle'] = "Order Success - SeakiNgs";

                unset($_SESSION['cart_items']);

                $this->loadPage("order-success", $this->global);
            }
        } else {
            redirect(base_url());
        }
    }

    public function cart() {
        if (!isset($_SESSION['cart_items'])) {
            redirect(base_url());
        } else {
            if (sizeof($_SESSION['cart_items']) < 1) {
                redirect(base_url());
            } else {
                $this->global['pageTitle'] = "Cart - Seakings";

                $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

                $this->global['scripts'] = '<script type="text/javascript" src="' . base_url() . 'assets/front/js/cart.js "></script>';
                $this->global['carts'] = $_SESSION['cart_items'];
                $this->loadPage("cart", $this->global);
            }
        }
    }

    public function update_cart_icon() {
        $this->load->view("public/includes/cart");
    }

    public function get_cart_count() {
        $this->load->view("public/includes/cart_count");
    }

    public function checkout() {
        if (!isset($_SESSION['cart_items'])) {
            redirect(base_url());
        } else {
            if (sizeof($_SESSION['cart_items']) > 0) {
                $this->global['pageTitle'] = "Checkout - SeakiNgs";

                $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

                $this->global['scripts'] = '<script type="text/javascript" src="' . base_url() . 'assets/front/js/checkout.js "></script>';
                $this->global['carts'] = $_SESSION['cart_items'];

                if ($this->frontend_model->get_record('tbl_general_settings', "status = '0' and option_name = 'guest_checkout'", 'value') == 0) {
                    if (isset($_SESSION['is_login'])) {
                        $this->loadPage("checkout", $this->global);
                    } else {
                        $this->session->set_flashdata('msg', '<center class="flash-msg-error">Please login before checkout!</center>');
                        redirect(base_url() . "login");
                    }
                } else {
                    $this->loadPage("checkout", $this->global);
                }
            } else {
                redirect(base_url());
            }
        }
    }

    function search() {

        $searchtext = $this->input->post('text');
        if (!isset($_SESSION['sort'])) {
            $sort = "order by date_time desc";
        } else {
            $sort = $_SESSION['sort'];
        }
        if (!isset($_SESSION['min']) && !isset($_SESSION['max'])) {
            $min = 100;
            $max = 500;
        } else {
            $min = $_SESSION['min'];
            $max = $_SESSION['max'];
        }

        $config = array();
        $config["base_url"] = base_url('shop');
        $config['per_page'] = 10;
        $config["total_rows"] = sizeof($this->frontend_model->get_records('tbl_product', " name like '%$searchtext%' and  status ='0' and price>='$min' and price<='$max' order by date_time desc")
        );
        $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] = 5;
        $config['full_tag_open'] = ' <ul class="lab-ul d-flex flex-wrap justify-content-center">
                                   ';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = "<li><a>";
        $config['first_tag_close'] = "</a></li>";
        $config['next_link'] = ' <span class="flaticon-right-arrow"></span>';
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='d-none d-sm-block'><a>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li class='d-none d-sm-block'>";
        $config['num_tag_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;


        $_SESSION['scount'] = $config['total_rows'];
        $_SESSION['slinks'] = $this->pagination->create_links();
        $_SESSION['sres'] = $config['per_page'];
        $_SESSION['spage'] = $this->uri->segment(2);
        $_SESSION['srows'] = $config["total_rows"];

        $this->global['pageTitle'] = "shop";
        $this->global['products'] = $this->frontend_model->get_records('tbl_product', "status = '0'  $sort limit $page,10");

        $_SESSION['products'] = $this->frontend_model->get_records('tbl_product', " name like '%$searchtext%' and price>='$min' and price<='$max' and status ='0' $sort limit $page,10");

        $data['result'] = 1;
        echo json_encode($data);
    }

    function search_product() {

        $this->global['count'] = $_SESSION['scount'];
        $this->global["links"] = $_SESSION['slinks'];
        $this->global["res"] = $_SESSION['sres'];
        $this->global['page'] = $_SESSION['spage'];
        $this->global['rows'] = $_SESSION['srows'];
        $this->global['products'] = $_SESSION['products'];
        $this->loadpage("shop", $this->global);
    }

    function shop_tags($searchtext) {
        $searchtext = urldecode($searchtext);
        $this->global['title_name'] = "Tag: " . $searchtext;
        $this->global['slider_images'] = array();

        $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where a.tags like '%$searchtext%' and a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' order by id desc");

        $this->global['pageTitle'] = "Tag: " . $searchtext;
        $this->loadPage("shop_tags", $this->global);
    }

    public function control_function($slug, $items) {
        $items = 20;
        $tbl_slug = $this->frontend_model->get_records('tbl_slug', "status = '0' and slug = '$slug'");

        if (sizeof($tbl_slug) > 0) {
            $tbl_slug = $tbl_slug[0];
            if ($tbl_slug->category_id != '0') {
                $this->show_category_page($tbl_slug->category_id, $items);
            } elseif ($tbl_slug->sub_category_id != '0') {
                $this->show_sub_category_page($tbl_slug->sub_category_id, $items);
            } elseif ($tbl_slug->child_category_id != '0') {
                $this->show_child_category_page($tbl_slug->child_category_id, $items);
            } elseif ($tbl_slug->brand_id != '0') {
                $this->show_brand_page($tbl_slug->brand_id, $items);
            } elseif ($tbl_slug->product_id != '0') {
                $this->show_product_page($tbl_slug->product_id, $items);
            } elseif ($tbl_slug->page_id != '0') {
                $this->show_page($tbl_slug->page_id, $items);
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }

    function favourites() {
        if (isset($_SESSION['login_id'])) {
            $this->global['pageTitle'] = "Favourites";

            $this->loadPage("favourites", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_brand_page($id, $items) {
        $brands = $this->frontend_model->get_records('tbl_brands', "status = '0' and id = '$id'");
        if (sizeof($brands) == 1) {
            $brand = $brands[0];
            $this->global['brand_det'] = $brand;
            $this->global['title_name'] = $brand->name;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and brand_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['price-from'])) {
                $where = "and a.price > " . $_GET['price-from'] . " and a.price < " . $_GET['price-to'];
            }
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' $where $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' $where $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            }

            $explode_val = array();
            foreach ($this->global['products'] as $product) {
                foreach (explode(',', $product->category) as $cat_iid) {
                    array_push($explode_val, $cat_iid);
                }
            }
            $explode_val = array_unique($explode_val);
            $this->global['categories_under_brand'] = $this->frontend_model->get_custom_query("select * from tbl_category where id IN ('" . implode("','", array_map('intval', $explode_val)) . "') and status = '0' order by name asc");

            $this->global['current_url'] = base_url() . $brand->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $brand->meta_title;
            $this->global['category_under_brand_active'] = '0';

            $this->loadPage("brand_page", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_page($id, $items) {
        $pages = $this->frontend_model->get_records('tbl_pages', "status = '0' and id = '$id'");
        if (sizeof($pages) == 1) {
            $this->global['pageTitle'] = $pages[0]->meta_title;
            $page = $pages[0];
            $this->global['page'] = $page;
            $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '" . $page->id . "' order by section_order + 0 asc");
            $this->loadPage("page", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_category_page($id, $items) {
        $category = $this->frontend_model->get_records('tbl_category', "status = '0' and id = '$id'");
        if (sizeof($category) == 1) {
            $category = $category[0];
            $this->global['title_name'] = $category->name;

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['price-from'])) {
                $where = "and a.price > " . $_GET['price-from'] . " and a.price < " . $_GET['price-to'];
            }
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            }

            $this->global['current_url'] = base_url() . $category->slug;
            $this->global['pageTitle'] = $category->meta_title;
            $this->global['category_ad_link'] = $category->ad_link;
            $this->global['category_image'] = $category->image;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_sub_category_page($id, $items) {
        $sub_category = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id = '$id'");
        if (sizeof($sub_category) == 1) {
            $sub_category = $sub_category[0];
            $this->global['title_name'] = $sub_category->name;
            $cat_id = $sub_category->category_id;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and sub_category_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['price-from'])) {
                $where = "and a.price > " . $_GET['price-from'] . " and a.price < " . $_GET['price-to'];
            }
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            }

            //side_bar
            $this->global['side_bar_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' and id='$cat_id'");
            $this->global['side_bar_sub_categories'] = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id='$id'");
            $this->global['side_bar_child_categories'] = $this->frontend_model->get_records('tbl_child_category', "status = '0' and sub_category_id='$id'");
            $this->global['side_bar_cat_id'] = $cat_id;
            $this->global['side_bar_sub_cat_id'] = $id;
            $this->global['side_bar_child_cat_id'] = 0;

            $this->global['current_url'] = base_url() . $sub_category->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $sub_category->meta_title;
            $this->global['category_ad_link'] = $sub_category->ad_link;
            $this->global['category_image'] = $sub_category->image;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_child_category_page($id, $items) {
        $child_category = $this->frontend_model->get_records('tbl_child_category', "status = '0' and id = '$id'");
        if (sizeof($child_category) == 1) {
            $child_category = $child_category[0];
            $this->global['title_name'] = $child_category->name;
            $sub_category_id = $child_category->sub_category_id;
            $cat_id = $child_category->category_id;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and child_category_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['price-from'])) {
                $where = "and a.price > " . $_GET['price-from'] . " and a.price < " . $_GET['price-to'];
            }
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' $where $order_by limit 20");
            }

            //side_bar
            $this->global['side_bar_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' and id='$cat_id'");
            $this->global['side_bar_sub_categories'] = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id='$sub_category_id'");
            $this->global['side_bar_child_categories'] = $this->frontend_model->get_records('tbl_child_category', "status = '0' and sub_category_id='$sub_category_id'");
            $this->global['side_bar_cat_id'] = $cat_id;
            $this->global['side_bar_sub_cat_id'] = $sub_category_id;
            $this->global['side_bar_child_cat_id'] = $id;

            $this->global['current_url'] = base_url() . $child_category->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $child_category->meta_title;
            $this->global['category_ad_link'] = $child_category->ad_link;
            $this->global['category_image'] = $child_category->image;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_product_page($id, $items = '') {
        $product = $this->frontend_model->get_custom_query("select a.* from tbl_product a where a.id = '$id' and a.product_status = 'approved' and a.status = '0' order by a.date_time desc");
        ;
        if (sizeof($product) == 1) {
            $product = $product[0];
            $this->global['product'] = $product;
            $this->global['product_images'] = $this->frontend_model->get_records('tbl_product_images', "status = '0' and product_id = '$id'");
            $this->global['tis'] = $this;
            $this->global['pageTitle'] = $product->meta_title;
            $this->loadPage("product-detail", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    public function product_wishlist() {
        if ($this->input->post('data-product') != "") {
            $product_id = $this->input->post("data-product");
            if (sizeof($this->frontend_model->get_records("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product_id . "'")) > 0) {
                $this->frontend_model->delete_data("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product_id . "'");
            } else {
                $info['product_id'] = $product_id;
                $info['user_id'] = $_SESSION['login_id'];
                $this->frontend_model->insert("tbl_wishlist", $info);
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function product_compare() {
        if ($this->input->post('data-product') != "") {
            if (sizeof($_SESSION['compare_items']) < 3) {
                if (isset($_SESSION['compare_items'])) {
                    $compare_items = $_SESSION['compare_items'];
                    $new_item = array();
                    $cc = 0;
                    foreach ($compare_items as $item) {
                        if ($this->input->post('data-product') == $item->product_id) {
                            
                        } else {
                            $cc++;
                        }
                        array_push($new_item, $item);
                    }
                    if (sizeof($_SESSION['compare_items']) != $cc) {
                        $_SESSION['compare_items'] = $new_item;
                    } else {
                        $item = new stdClass();
                        $item->compare_item_datetime = date('Ymd h:i:s');
                        $item->product_id = $this->input->post('data-product');
                        $item->product_quantity = $this->input->post('product_quantity');
                        $item->finishing_variant = $this->input->post('finishing-variant');
                        $item->loft_variant = $this->input->post('loft-variant');
                        $item->mirror_variant = $this->input->post('mirror-variant');

                        $data['msg_type'] = "success";
                        $data['msg'] = "Your cart has been updated.";

                        $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                        if ($item->product_quantity > $in_stock) {
                            $item->product_quantity = $in_stock;
                            $data['msg_type'] = "error";
                            $data['msg'] = "You cannot add more than stock left.";
                        }

                        array_push($new_item, $item);
                        $_SESSION['compare_items'] = $new_item;
                    }
                } else {
                    $compare_items = array();

                    $item = new stdClass();
                    $item->compare_item_datetime = date('Ymd h:i:s');
                    $item->product_id = $this->input->post('data-product');

                    array_push($compare_items, $item);
                    $_SESSION['compare_items'] = $compare_items;
                }
                $data['result'] = 1;
            } else {
                $data['result'] = 2;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function product_compare_remove() {
        if ($this->input->post('data-product') != "") {
            if (isset($_SESSION['compare_items'])) {
                $cart = $_SESSION['compare_items'];
                $new_cart = array();
                foreach ($cart as $item) {
                    if ($this->input->post('data-product') != $item->product_id) {
                        array_push($new_cart, $item);
                    }
                }
                $_SESSION['compare_items'] = $new_cart;
            } else {
                $cart = array();

                $_SESSION['compare_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function add_to_cart() {
        //print_r($_SESSION['cart_items']);
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') == $item->product_id) {
                        $item->product_quantity = $item->product_quantity + $this->input->post('product_quantity');
                    } else {
                        $cc++;
                    }
                    array_push($new_cart, $item);
                }

                if (sizeof($_SESSION['cart_items']) != $cc) {
                    $_SESSION['cart_items'] = $new_cart;
                } else {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');

                    array_push($new_cart, $item);
                    $_SESSION['cart_items'] = $new_cart;
                }
            } else {
                $cart = array();

                $item = new stdClass();
                $item->cart_item_id = time() . uniqid() . date('Ymd');
                $item->product_id = $this->input->post('product_id');
                $item->product_quantity = $this->input->post('product_quantity');

                array_push($cart, $item);
                $_SESSION['cart_items'] = $cart;
            }

            $mg = 'customer' . $info['first_name'] . ' added Products  to cart';
            //$result =$this->send_sms('9840532341',$mg);
            //$result=$this->send_mail_to_marketing($new_cart);
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function add_to_cart_single() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') == $item->product_id) {
                        $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                        if (($item->product_quantity + 1) > $in_stock) {
                            $item->product_quantity = $in_stock;
                            if ($this->input->post('finishing-variant')) {
                                $item->finishing_variant = $this->input->post('finishing-variant');
                            }
                            if ($this->input->post('loft-variant')) {
                                $item->finishing_variant = $this->input->post('loft-variant');
                            }
                            if ($this->input->post('mirror-variant')) {
                                $item->finishing_variant = $this->input->post('mirror-variant');
                            }
                        } else {
                            $item->product_quantity = $item->product_quantity + 1;
                        }
                    } else {
                        $cc++;
                    }
                    array_push($new_cart, $item);
                }
                if (sizeof($_SESSION['cart_items']) != $cc) {
                    $_SESSION['cart_items'] = $new_cart;
                } else {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');
                    $item->finishing_variant = $this->input->post('finishing-variant');
                    $item->loft_variant = $this->input->post('loft-variant');
                    $item->mirror_variant = $this->input->post('mirror-variant');

                    $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                    if ($item->product_quantity > $in_stock) {
                        $item->product_quantity = $in_stock;
                    }

                    array_push($new_cart, $item);
                    $_SESSION['cart_items'] = $new_cart;
                }
            } else {
                $cart = array();

                $item = new stdClass();
                $item->cart_item_id = time() . uniqid() . date('Ymd');
                $item->product_id = $this->input->post('product_id');
                $item->product_quantity = $this->input->post('product_quantity');
                $item->finishing_variant = $this->input->post('finishing-variant');
                $item->loft_variant = $this->input->post('loft-variant');
                $item->mirror_variant = $this->input->post('mirror-variant');

                $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                if ($item->product_quantity > $in_stock) {
                    $item->product_quantity = $in_stock;
                }

                array_push($cart, $item);
                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function buy_now_option() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                $noph = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') == $item->product_id) {
                        $noph++;
                        if ($this->input->post('finishing-variant')) {
                            $item->finishing_variant = $this->input->post('finishing-variant');
                        }
                        if ($this->input->post('loft-variant')) {
                            $item->finishing_variant = $this->input->post('loft-variant');
                        }
                        if ($this->input->post('mirror-variant')) {
                            $item->finishing_variant = $this->input->post('mirror-variant');
                        }
                    } else {
                        $cc++;
                    }
                    array_push($new_cart, $item);
                }

                if ($noph == 0) {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');
                    $item->finishing_variant = $this->input->post('finishing-variant');
                    $item->loft_variant = $this->input->post('loft-variant');
                    $item->mirror_variant = $this->input->post('mirror-variant');

                    $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                    if ($item->product_quantity > $in_stock) {
                        $item->product_quantity = $in_stock;
                    }

                    array_push($new_cart, $item);
                    $_SESSION['cart_items'] = $new_cart;
                }

                if (sizeof($_SESSION['cart_items']) != $cc) {
                    $_SESSION['cart_items'] = $new_cart;
                } else {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');
                    $item->finishing_variant = $this->input->post('finishing-variant');
                    $item->loft_variant = $this->input->post('loft-variant');
                    $item->mirror_variant = $this->input->post('mirror-variant');

                    $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                    if ($item->product_quantity > $in_stock) {
                        $item->product_quantity = $in_stock;
                    }

                    array_push($new_cart, $item);
                    $_SESSION['cart_items'] = $new_cart;
                }
            } else {
                $cart = array();

                $item = new stdClass();
                $item->cart_item_id = time() . uniqid() . date('Ymd');
                $item->product_id = $this->input->post('product_id');
                $item->product_quantity = $this->input->post('product_quantity');

                $in_stock = $this->frontend_model->get_record("tbl_product", "status = '0' and id = '" . $item->product_id . "'", "in_stock");
                if ($item->product_quantity > $in_stock) {
                    $item->product_quantity = $in_stock;
                }

                array_push($cart, $item);
                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function update_cart() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('update_cart_product_quantity') != 0) {
                        if ($this->input->post('product_id') == $item->product_id) {
                            $item->product_quantity = $this->input->post('update_cart_product_quantity');
                        }
                        array_push($new_cart, $item);
                    }
                }
            } else {
                $cart = array();

                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function remove_cart_item() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') != $item->product_id) {
                        array_push($new_cart, $item);
                    }
                }
                $_SESSION['cart_items'] = $new_cart;
            } else {
                $cart = array();

                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function checkoutPost() {
        $data['redirect_link'] = "";
        if (isset($_SESSION['cart_items'])) {
            if (isset($_SESSION['is_login'])) {
                $cart = $_SESSION['cart_items'];
                $ttotal = 0;
                $order_ids = "";
                foreach ($cart as $item) {
                    $pr_id = $item->product_id;
                    $item_det = $this->frontend_model->get_records('tbl_product', "status = '0' and id = '$pr_id'")[0];

                    $user_id = $_SESSION['login_id'];
                    $order_id = "SK" . date('Ymd') . uniqid();

                    $order_ids .= $order_id . ",";

                    $sub_total = ($item_det->price * $item->product_quantity);
                    $shipping_cost = $this->frontend_model->get_record('tbl_product', "status = '0' and id = '$pr_id'", "shipping_cost");
                    $gst = (($sub_total / 100) * $this->frontend_model->get_record('tbl_product', "status = '0' and id=" . $pr_id, 'product_gst'));
                    $total = $sub_total + $shipping_cost + $gst;
                    $ttotal = $ttotal + $total;

                    $order['order_id'] = $order_id;
                    $order['user_id'] = $user_id;
                    $order['sub_total'] = $sub_total;
                    $order['shipping'] = $shipping_cost;
                    $order['gst'] = $gst;
                    $order['total'] = $total;
                    $order['is_paid'] = 0;

                    $order['finishing_variant'] = $item->finishing_variant;
                    $order['loft_variant'] = $item->loft_variant;
                    $order['mirror_variant'] = $item->mirror_variant;

                    $order['date'] = date('Y-m-d');

                    $insert_id = $this->frontend_model->insert('tbl_orders', $order);

                    $info['order_id'] = $order_id;
                    $info['user_id'] = $user_id;
                    $info['option_name'] = 'billing';
                    $info['first_name'] = $this->input->post('billing_first_name');
                    $info['last_name'] = $this->input->post('billing_last_name');
                    $info['email'] = $this->input->post('billing_email');
                    $info['phone_number'] = $this->input->post('billing_phone');
                    $info['address1'] = $this->input->post('billing_address_1');
                    $info['address2'] = $this->input->post('billing_address_2');
                    $info['city'] = $this->input->post('billing_city');
                    $info['state'] = $this->input->post('billing_state');
                    $info['pincode'] = $this->input->post('billing_postcode');

                    if ($this->input->post('ship_to_different_address') == 1) {
                        $info1['order_id'] = $order_id;
                        $info1['user_id'] = $user_id;
                        $info1['option_name'] = 'shipping';
                        $info1['first_name'] = $this->input->post('shipping_first_name');
                        $info1['last_name'] = $this->input->post('shipping_last_name');
                        $info1['email'] = $this->input->post('shipping_email');
                        $info1['phone_number'] = $this->input->post('shipping_phone');
                        $info1['address1'] = $this->input->post('shipping_address_1');
                        $info1['address2'] = $this->input->post('shipping_address_2');
                        $info1['city'] = $this->input->post('shipping_city');
                        $info1['state'] = $this->input->post('shipping_state');
                        $info1['pincode'] = $this->input->post('shipping_postcode');
                    } else {
                        $info1['order_id'] = $order_id;
                        $info1['user_id'] = $user_id;
                        $info1['option_name'] = 'shipping';
                        $info1['first_name'] = $this->input->post('billing_first_name');
                        $info1['last_name'] = $this->input->post('billing_last_name');
                        $info1['email'] = $this->input->post('billing_email');
                        $info1['phone_number'] = $this->input->post('billing_phone');
                        $info1['address1'] = $this->input->post('billing_address_1');
                        $info1['address2'] = $this->input->post('billing_address_2');
                        $info1['city'] = $this->input->post('billing_city');
                        $info1['state'] = $this->input->post('billing_state');
                        $info1['pincode'] = $this->input->post('billing_postcode');
                    }


                    $order_item['order_id'] = $order_id;
                    $order_item['user_id'] = $user_id;
                    $order_item['product_id'] = $item->product_id;
                    $order_item['price'] = $item_det->price;
                    $order_item['quantity'] = $item->product_quantity;
                    $this->frontend_model->insert('tbl_order_item', $order_item);


                    $info2['order_id'] = $order_id;
                    $info2['est_delivery_date'] = date('Y-m-d', strtotime($this->frontend_model->get_record('tbl_general_settings', "status = '0' and option_name = 'estimated_delivery_in_days'", 'value') . ' day'));
                    $info2['process'] = "pending";

                    $this->frontend_model->insert('tbl_order_address', $info);
                    $this->frontend_model->insert('tbl_order_address', $info1);
                    $this->frontend_model->insert('tbl_order_process', $info2);
                }

                $orderer_id = "PSK" . uniqid();

                $info10 = array(
                    "user_id" => $_SESSION['login_id'],
                    "order_id" => $orderer_id,
                    "payment_id" => '',
                    "amount" => round($ttotal) . "00",
                    "description" => '',
                    "email" => '',
                    "contact" => '',
                    "notes" => "Payment for product orders " . $order_ids,
                    "order_ids" => $order_ids,
                    "payment_status" => 'initiated'
                );

                $this->frontend_model->insert('tbl_transactions', $info10);
                $data['redirect_link'] = "payment/" . $orderer_id;
                $data['result'] = 1;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    function checkoutpayment($order_id) {
        $this->global['pageTitle'] = "Payment for " . $order_id . " - SeakiNgs";

        $this->global['order_id'] = $order_id;

        $this->global['order_details'] = $this->frontend_model->get_records('tbl_transactions', "order_id = '$order_id'")[0];

        if ($this->global['order_details']->is_paid == 0) {
            $this->loadPage("payment", $this->global);
        } else {
            redirect("404");
        }
    }

    function pageNotFound() {
        $this->global['pageTitle'] = "404 - Page Not Found - SeakiNgs";

        $this->loadPage("404", $this->global);
    }

    function slugify($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    function checkSlugExists($slug, $table, $id) {
        $slugs = $this->frontend_model->get_records($table, "slug = '$slug'");
        if (sizeof($slugs) > 1) {
            return $slug . '-' . uniqid();
        }
        if (sizeof($slugs) == 1) {
            if ($slugs[0]->id == $id) {
                return $slug;
            } else {
                return $slug . '-' . uniqid();
            }
        }
        return $slug;
    }

    function insert_slug($info = '', $table = '', $insert_id = '') {
        if (array_key_exists("slug", $info)) {
            $info1['slug'] = $info['slug'];

            if ($table == 'tbl_category') {
                $info1['category_id'] = $insert_id;
            }
            if ($table == 'tbl_sub_category') {
                $info1['sub_category_id'] = $insert_id;
            }
            if ($table == 'tbl_child_category') {
                $info1['child_category_id'] = $insert_id;
            }
            if ($table == 'tbl_pages') {
                $info1['page_id'] = $insert_id;
            }
            if ($table == 'tbl_product') {
                $info1['product_id'] = $insert_id;
            }
            if ($table == 'tbl_brands') {
                $info1['brand_id'] = $insert_id;
            }

            $this->frontend_model->insert('tbl_slug', $info1);
        }
    }

    function image_upload($atr_name, $file_new_name, $target_dir) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($_FILES[$atr_name]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function product_images_upload($atr_name, $file_new_name, $target_dir, $incc) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"][$incc], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($_FILES[$atr_name]["tmp_name"][$incc], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function is_seller_login() {
        if (isset($_SESSION['is_seller_login'])) {
            if ($this->frontend_model->get_record("tbl_stores", "created_by='$_SESSION[seller_login_id]'", "name") != "") {
                return true;
            } else {
                redirect("seller");
            }
        } else {
            redirect("seller");
        }
    }

    function seller_packages_update_payment_details() {
        $data['result'] = 0;
        if ($this->input->post('payment-id')) {
            $payment_id = $this->input->post('payment-id');
            $plan_id = $this->input->post('plan-id');
            if (sizeof($this->frontend_model->get_records("tbl_transactions", "payment_id='$payment_id'")) < 1) {
                // GET PAYMENT DETAILS
                $url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
                $key_id = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value");
                $key_secret = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_secret_key'", "value");
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result, true);

                if (isset($result['status']) && $result['status'] != 'failed') {
                    $order_id = "order" . uniqid();
                    $info = Array(
                        "user_id" => $_SESSION['login_id'],
                        "order_id" => $order_id,
                        "payment_id" => $result['id'],
                        "amount" => $result['amount'],
                        "description" => $result['description'],
                        "email" => $result['email'],
                        "contact" => $result['contact'],
                        "notes" => "Payment for store ID " . $_SESSION['seller_store_id'],
                        "payment_status" => $result['status'],
                        "is_paid" => 1
                    );
                    if ($this->frontend_model->insert('tbl_transactions', $info) == TRUE) {
                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been processed. - seakings.com");
                        if ($plan_id == $this->frontend_model->get_record("tbl_plans", "price='$result[amount]'", "id")) {
                            $plan = $plan_id;
                            $info1 = Array(
                                "plan_id" => $plan,
                                "plan_activate_date_time" => date('Y-m-d H:i:sa'),
                                "active_status" => 1
                            );
                            $this->frontend_model->update('tbl_stores', $info1, "store_id='$_SESSION[seller_store_id]'");

                            $this->email_model->send_sms($result['contact'], "Congrats! Your store (" . $_SESSION['seller_store_id'] . ") has been upgraded to " . $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "plan_name") . ". - seakings.com");
                        }

                        $data['result'] = 1;
                        $data['order_id'] = $order_id;
                    } else {
                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been failed. - seakings.com");
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function product_order_update_payment_details() {
        $data['result'] = 0;
        if ($this->input->post('payment-id')) {
            $payment_id = $this->input->post('payment-id');
            $order_id = $this->input->post('order-id');
            $ord_det = $this->frontend_model->get_records("tbl_transactions", "order_id='$order_id'");
            if (sizeof($ord_det) > 0) {
                $ord_det = $ord_det[0];
                // GET PAYMENT DETAILS
                $url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
                $key_id = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value");
                $key_secret = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_secret_key'", "value");
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result, true);

                //$this->capture_payment($payment_id, $result['amount']);

                if (isset($result['status']) && $result['status'] != 'failed') {
                    $info = Array(
                        "payment_id" => $result['id'],
                        "description" => $result['description'],
                        "email" => $result['email'],
                        "contact" => $result['contact'],
                        "notes" => "Payment for order ID " . $order_id,
                        "payment_status" => $result['status'],
                        "is_paid" => 1
                    );
                    if ($this->frontend_model->update('tbl_transactions', $info, "order_id='$order_id'") == TRUE) {
                        $exps = explode(",", $ord_det->order_ids);
                        for ($ir = 0; $ir < sizeof($exps); $ir++) {
                            $info56 = array(
                                "is_paid" => 1
                            );
                            $this->frontend_model->update('tbl_orders', $info56, "order_id='$exps[$ir]'");
                        }

                        $this->email_model->send_sms($result['contact'], "Your order (" . $order_id . ") has been received. Our SeakiNgs team will get in touch with you shortly. Track your order at seakings.com");

                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been processed. - seakings.com");

                        $data['result'] = 1;
                        $data['order_id'] = $order_id;
                        $_SESSION['cart_items'] = array();
                    }
                } else {
                    $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been failed. - seakings.com");
                }
            }
        }
        echo json_encode($data);
    }

    function payment_success($order_id) {
        $this->global['pageTitle'] = "Payment Status for " . $order_id . " - SeakiNgs";

        $this->global['order_details'] = $this->frontend_model->get_records('tbl_transactions', "order_id = '$order_id'")[0];

        $this->loadPage("payment-success", $this->global);
    }

    function payment_failure() {
        $this->global['pageTitle'] = "Payment Status - SeakiNgs";

        $this->loadPage("payment-failure", $this->global);
    }

    function get_a_quote_product_details_page() {
        $data['result'] = 0;
        if ($this->input->post('phone_number')) {
            if (isset($_SESSION['login_id'])) {
                $info = array(
                    'name' => $this->input->post('name'),
                    'phone_number' => $this->input->post('phone_number'),
                    'product_id' => $this->input->post('product-id'),
                    'user_id' => $_SESSION['login_id'],
                    'notes' => "Need a special quote for this product.",
                    'quantity' => $this->input->post('quantity')
                );
                $this->frontend_model->insert("tbl_product_enquiry", $info);

                $this->email_model->new_quote_request($info);

                $data['result'] = 1;
            } else {
                $info['first_name'] = $this->input->post('name');
                $info['phone_number'] = $this->input->post('phone_number');
                $info['password'] = md5(uniqid());
                $info['otp'] = time();
                if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'")) > 0) {
                    $info2['otp'] = rand(100000, 999999);
                    $this->frontend_model->update('tbl_general_users', $info2, "phone_number='" . $this->input->post('phone_number') . "'");

                    $info1 = array(
                        'name' => $this->input->post('name'),
                        'phone_number' => $this->input->post('phone_number'),
                        'product_id' => $this->input->post('product-id'),
                        'user_id' => $this->frontend_model->get_record('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'", "id"),
                        'notes' => "Need a special quote for this product.",
                        'quantity' => $this->input->post('quantity')
                    );
                    $this->frontend_model->insert("tbl_product_enquiry", $info1);
                    $data['phone_number'] = $this->input->post('phone_number');
                    $data['result'] = 2;
                } else {
                    if ($insert_id = $this->frontend_model->insert('tbl_general_users', $info)) {
                        $info1 = array(
                            'name' => $this->input->post('name'),
                            'phone_number' => $this->input->post('phone_number'),
                            'product_id' => $this->input->post('product-id'),
                            'user_id' => $insert_id,
                            'notes' => "Need a special quote for this product.",
                            'quantity' => $this->input->post('quantity')
                        );
                        $this->frontend_model->insert("tbl_product_enquiry", $info1);
                        $data['phone_number'] = $this->input->post('phone_number');
                        $data['result'] = 2;
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function from_contact_order_help() {
        $data['result'] = 0;
        if ($this->input->post('order_id')) {
            $info = array(
                'order_id' => $this->input->post('order_id'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );
            $this->frontend_model->insert("tbl_order_enquiry", $info);

            $mobile = $this->frontend_model->get_record('tbl_general_users', "id = '" . $_SESSION['login_id'] . "'", "phone_number");

            $this->email_model->send_sms($mobile, "Your request has been received. Order ID: " . $this->input->post('order_id') . ". Our representative will get in touch with you shortly.");

            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    function get_a_quote_product_details_page_otp_form() {
        $data['result'] = 0;
        if ($this->input->post('phone_number')) {
            if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "' and otp = '" . $this->input->post('otp') . "'")) > 0) {
                $info2['otp'] = "";
                $info2['is_verified'] = "1";
                $this->frontend_model->update('tbl_general_users', $info2, "phone_number='" . $this->input->post('phone_number') . "'");
                $data['result'] = 1;

                $rr = $this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'");

                $_SESSION['is_login'] = true;
                $_SESSION['login_id'] = $rr[0]->id;
                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    function apply_coupon() {
        $data['result'] = 0;
        if ($this->input->post('coupon')) {
            $cp = $this->frontend_model->get_records('tbl_coupons', "coupon_code = '" . $this->input->post('coupon') . "' and status = '0' and coupon_status = '0'");
            if (sizeof($cp) > 0) {
                if (isset($_SESSION['cart_items'])) {
                    if (sizeof($_SESSION['cart_items']) > 0) {
                        foreach ($_SESSION['cart_items'] as $item) {
                            $pr_id = $item->product_id;
                            $item_det = $this->frontend_model->get_record('tbl_product', "status = '0' and id = '$pr_id'", "child_category")[0];
                        }
                    }
                }



                $sub_total = $this->input->post('sub_total');
                $cp = $cp[0];

                if ($cp->flat_percentage == 0) {
                    $data['sub_total'] = $sub_total - $cp->value;
                } else {
                    $data['sub_total'] = $sub_total - (($sub_total / 100) * $cp->value);
                }

                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    function cron_job() {
        foreach ($this->frontend_model->get_records("tbl_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_sub_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and sub_category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_sub_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_sub_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['sub_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_sub_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['sub_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_child_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and child_category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_child_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_child_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['child_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_child_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['child_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_brands", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and brand_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_brands", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_brands", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['brand_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_brands", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['brand_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_product", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and product_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_product", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_product", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['product_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_product", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['product_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_pages", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and page_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_pages", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_pages", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['page_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_pages", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['page_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }
    }

    function capture_payment($payment_id, $amount) {
        // GET PAYMENT DETAILS
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . "/capture";
        $key_id = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value");
        $key_secret = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_secret_key'", "value");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "currency=INR&amount=$amount");
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result, true);

        $info = Array(
            "payment_status" => $result['status']
        );
        $this->frontend_model->update('tbl_transactions', $info, "payment_id=" . $payment_id);
    }

    function shop() {
        if (!isset($_SESSION['sort'])) {
            $sort = "order by date_time desc";
        } else {
            $sort = $_SESSION['sort'];
        }
        if (!isset($_SESSION['min']) && !isset($_SESSION['max'])) {
            $min = 100;
            $max = 500;
        } else {
            $min = $_SESSION['min'];
            $max = $_SESSION['max'];
        }

        $config = array();
        $config["base_url"] = base_url('shop');
        $config['per_page'] = 10;
        $config["total_rows"] = sizeof($this->frontend_model->get_records('tbl_product', "status = '0' and price>='$min' and price<='$max' order by date_time desc ")
        );
        $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] = 5;
        $config['full_tag_open'] = ' <ul class="lab-ul d-flex flex-wrap justify-content-center">
                                   ';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = "<li><a>";
        $config['first_tag_close'] = "</a></li>";
        $config['next_link'] = ' <span class="flaticon-right-arrow"></span>';
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='d-none d-sm-block'><a>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li class='d-none d-sm-block'>";
        $config['num_tag_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;


        $this->global['count'] = $config['total_rows'];

        $this->global["links"] = $this->pagination->create_links();
        $this->global["res"] = $config['per_page'];
        $this->global['page'] = $this->uri->segment(2);
        $this->global['rows'] = $config["total_rows"];

        $this->global['pageTitle'] = "shop";
        $this->global['products'] = $this->frontend_model->get_records('tbl_product', "status = '0' and price>='$min' and price<='$max' $sort limit $page,10");


        $this->loadPage("shop", $this->global);
    }

    function shops($id) {
        if (!isset($_SESSION['sort'])) {
            $sort = "order by date_time desc";
        } else {
            $sort = $_SESSION['sort'];
        }
        if (!isset($_SESSION['min']) && !isset($_SESSION['max'])) {
            $min = 100;
            $max = 500;
        } else {
            $min = $_SESSION['min'];
            $max = $_SESSION['max'];
        }
        $config = array();
        $config["base_url"] = base_url('shops/') . $id;
        $config['per_page'] = 10;
        $config["total_rows"] = sizeof($this->frontend_model->get_records('tbl_product', "status = '0' and category = '$id' and price>='$min' and price<='$max' order by date_time desc ")
        );
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] = 5;
        $config['full_tag_open'] = ' <ul class="lab-ul d-flex flex-wrap justify-content-center">
                                   ';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = "<li><a>";
        $config['first_tag_close'] = "</a></li>";
        $config['next_link'] = ' <span class="flaticon-right-arrow"></span>';
        $config['next_tag_open'] = "<li class='d-none d-sm-block'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class='d-none d-sm-block'>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='d-none d-sm-block'><a>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li class='d-none d-sm-block'>";
        $config['num_tag_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;


        $this->global['count'] = $config['total_rows'];

        $this->global["links"] = $this->pagination->create_links();
        $this->global["res"] = $config['per_page'];
        $this->global['page'] = $this->uri->segment(3);
        $this->global['rows'] = $config["total_rows"];


        $this->global['pageTitle'] = "shop";
        $this->global['products'] = $this->frontend_model->get_records('tbl_product', "status = '0' and price>='$min' and price<='$max' and category = '$id'  $sort limit $page,10");

        $this->loadPage("shop", $this->global);
    }

    // function shop_pro($id)
    // {
    // 	$this->global['pageTitle'] = "shop";
    // 	$this->global['products'] = $this->frontend_model->get_records('tbl_product', "status = '0' and id = '$id' order by date_time desc");
    // 		$this->loadPage("shop", $this->global);
    // }


    function login_page() {
        $this->global['pageTitle'] = "login";


        $this->loadPage("login", $this->global);
    }

    function orders() {
        $this->global['pageTitle'] = "order";

        $this->loadPage("order", $this->global);
    }

    public function sea_product($id) {

        $this->global['pageTitle'] = "sea product";

        $this->global['record'] = $this->frontend_model->get_records("tbl_product", "status = '0' and id=$id")[0];
        $this->global['cart'] = $_SESSION['cart_items'];
        $this->global['reviews'] = $this->frontend_model->get_records('tbl_reviews', "status = '0' and review_status='approved' and product_id='$id'");
        $rcount = $this->global['reviews'];
        $this->global['rcount'] = count($rcount);
        $this->loadPage("product-details", $this->global);
    }

    function sort() {
        $_SESSION['sort'] = $this->input->post('value');
        $data['result'] = 1;
        echo json_encode($data);
    }

    public function wishlist_insert() {
        if (!isset($_SESSION['login_id'])) {
            $data['result'] = 3;
        } else {

            $info['item_id'] = $this->input->post('id');
            $info['user_id'] = $_SESSION['login_id'];
            $id = $info['item_id'];
            $user_id = $info['user_id'];
            $record = $this->frontend_model->get_records('tbl_user_wishlist', "status = '0' and item_id='$id' and user_id='$user_id'");
            if ($record) {
                $data['result'] = 2;
            } else {
                $insert_id = $this->frontend_model->insert('tbl_user_wishlist', $info);
                if ($insert_id) {
                    $data['result'] = 1;
                }
            }
        }
        echo json_encode($data);
    }

//  public function myaccount_dashboard()
// 	{
// 	 	$info['user_id']=$_SESSION['login_id'];
// 	 	$user_id=$info['user_id'];
// 		 $this->global['user']=$this->frontend_model->get_records('tbl_general_user', "status = '0' and user_id='$user_id'");
// 		 $this->loadPage('my-account',$this->global);
// 	}
//  public function  my_account() 
//  {
//  	$ordersvar = $this->frontend_model->get_records('tbl_orders', "is_paid='1' and status='0' and user_id=".$_SESSION['loginid'])[0];
//  	$this->global['items'] = $this->frontend_model->get_records('tbl_order_item' ,"status='0' and order_id= '$ordersvar->order_id'and user_id=".$_SESSION['loginid'])[0];
//  	// $this->global['records']= $this->frontend_model->get_records('tbl_courses',"status=0 and id= $orderitemvar->product_id");
//  		$this->loadPage('my-account',$this->global);
//  }

    function price_filter() {
        $_SESSION['min'] = $this->input->post('min');
        $_SESSION['max'] = $this->input->post('max');
        $data['result'] = 1;
        echo json_encode($data);
    }

}

?>
