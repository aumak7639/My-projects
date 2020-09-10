<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Common_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/common_model');
        $this->isLoggedIn();   
		
		$this->global['tis'] = $this;
    }
    
    public function index()
    {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';
        
		$this->global['countofcategory'] = $this->common_model->get_records('tbl_category', "status = '0'");
		$this->global['countofsubcategory'] = $this->common_model->get_records('tbl_sub_category', "status = '0'");
		$this->global['countofchildcategory'] = $this->common_model->get_records('tbl_child_category', "status = '0'");
		$this->global['countofproduct'] = $this->common_model->get_records('tbl_product', "status = '0'");
		
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    public function coupons()
    {
        $this->global['pageTitle'] = 'Coupons - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_coupons', "status = '0' order by id desc");
		
        $this->loadViews("coupons", $this->global, NULL , NULL);
    }
    
    public function new_blog()
    {
        $this->global['pageTitle'] = 'New Blog - ' . $this->config->item('app_name');
		
        $this->loadViews("new-blog", $this->global, NULL , NULL);
    }
    
    public function list_blogs()
    {
        $this->global['pageTitle'] = 'List Blog - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_blogs', "status = '0' order by id desc");
		
        $this->loadViews("list-blogs", $this->global, NULL , NULL);
    }
    
    public function edit_blog($id)
    {
		$this->global['record'] = $this->common_model->get_records('tbl_blogs', "status = '0' and id = '$id' order by id desc")[0];
		
		$this->global['pageTitle'] = $this->global['record']->title . " - " . $this->config->item('app_name');
		
        $this->loadViews("edit-blog", $this->global, NULL , NULL);
    }
    
    public function newsletter()
    {
		$this->global['records'] = $this->common_model->get_records('tbl_newsletter', "status = '0' order by id desc");
		
		$this->global['pageTitle'] = "Newsletter - " . $this->config->item('app_name');
		
        $this->loadViews("newsletter", $this->global, NULL , NULL);
    }
    
    public function pincodes()
    {
		$this->global['records'] = $this->common_model->get_records('tbl_pincodes', "status = '0' order by id desc");
		
		$this->global['pageTitle'] = "Pincodes - " . $this->config->item('app_name');
		
        $this->loadViews("pincodes", $this->global, NULL , NULL);
    }
    
    public function add_new_color_variant()
    {
		$folder_name = "products";
		$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[color_image]["name"],PATHINFO_EXTENSION));
		if($this->image_upload(color_image, $file_new_name, 'uploads/' . $folder_name . '/') == true)
		{
			$info['color_image'] = $file_new_name;
			$info['value'] = $this->input->post("value");
			$info['product_id'] = $this->input->post("product_id");
		
			$this->common_model->insert("tbl_product_color_variants", $info);
			
			$info1['color_image'] = $this->common_model->get_record('tbl_product', "id='" . $this->input->post("product_id") . "'", "product_color_image");
			$info1['value'] = $this->input->post("product_id");
			$info1['product_id'] = $this->input->post("value");
		
			$this->common_model->insert("tbl_product_color_variants", $info1);
			$data['result'] = 1;
		}
		else
		{
			$data['result'] = 0;
		}
		
		echo json_encode($data);
    }
    
    public function contact_form()
    {
        $this->global['pageTitle'] = 'Contact Form - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_contact_form', "status = '0' order by id desc");
		
        $this->loadViews("contact_form", $this->global, NULL , NULL);
    }
    
    public function properties_master()
    {
        $this->global['pageTitle'] = 'Properties Master - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_product_properties_master', "status = '0' order by id desc");
		
        $this->loadViews("properties-master", $this->global, NULL , NULL);
    }
    
    function orders_transactions()
    {
        $this->global['pageTitle'] =  'Orders Transactions' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_transactions', "status = '0' and order_ids != '' order by id desc");
		
        $this->loadViews("order-transactions", $this->global, NULL , NULL);
    }
    
    public function order_help_center()
    {
        $this->global['pageTitle'] = 'Contact Help Center - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_order_enquiry', "status = '0' order by id desc");
		
        $this->loadViews("order_help_center", $this->global, NULL , NULL);
    }
    
    public function product_enquiry()
    {
        $this->global['pageTitle'] = 'Product Enquiries - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_product_enquiry', "status = '0' order by id desc");
		
        $this->loadViews("product_enquiry", $this->global, NULL , NULL);
    }
    
    function header_menu()
    {
        $this->global['pageTitle'] =  'Header Menu' . " - " . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		
		$this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");
		
		$this->global['child_categories'] = $this->common_model->get_records('tbl_child_category', "status = '0' order by name asc");
		
		$this->global['menus'] = $this->common_model->get_records('tbl_header_menu', "status = '0' order by menu_order + 0 asc");
        
        $this->loadViews("header-menu", $this->global, NULL , NULL);
    }
    
    function new_page()
    {
        $this->global['pageTitle'] =  'New Page' . " - " . $this->config->item('app_name');
        
        $this->loadViews("new_page", $this->global, NULL , NULL);
    }
    
    function orders()
    {
        $this->global['pageTitle'] =  'Orders' . " - " . $this->config->item('app_name');
        
		if(isset($_GET['user-id']))
		{
			$this->global['records'] = $this->common_model->get_custom_query("select a.*, b.name, b.slug from tbl_order_item a, tbl_product b where a.status = '0' and b.id = a.product_id and a.user_id='" . $_GET['user-id'] . "' group by a.order_id order by a.id desc");
		}
		else
		{
			$this->global['records'] = $this->common_model->get_custom_query("select a.*, b.name, b.slug from tbl_order_item a, tbl_product b where a.status = '0' and b.id = a.product_id group by a.order_id order by a.id desc");
		}
		
        $this->loadViews("orders", $this->global, NULL , NULL);
    }
    
    function orders_report()
    {
        $this->global['pageTitle'] =  'Orders' . " - " . $this->config->item('app_name');
        
		if(isset($_GET['user-id']))
		{
			$this->global['records'] = $this->common_model->get_custom_query("select a.*, b.name, b.slug from tbl_order_item a, tbl_product b where a.status = '0' and b.id = a.product_id and a.user_id='" . $_GET['user-id'] . "' group by a.order_id order by a.id desc");
		}
		else
		{
			$this->global['records'] = $this->common_model->get_custom_query("select a.*, b.name, b.slug from tbl_order_item a, tbl_product b where a.status = '0' and b.id = a.product_id group by a.order_id order by a.id desc");
		}
		
        $this->loadViews("orders-report", $this->global, NULL , NULL);
    }
    
    function order_details($order_id)
    {
        $this->global['pageTitle'] =  'Order Details' . " - " . $this->config->item('app_name');
        
		$this->global['order'] = $this->common_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
		if($this->global['order']->id)
		{
			$this->global['order_items'] = $this->common_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
			$this->global['order_addresses'] = $this->common_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");
			$this->global['order_process'] = $this->common_model->get_records('tbl_order_process', "status = '0' and order_id = '$order_id'")[0];
			$this->global['order_process_images'] = $this->common_model->get_records('tbl_order_process_images', "status = '0' and order_id = '$order_id'");
			
			$this->loadViews("order-details", $this->global, NULL , NULL);
		}
		else
		{
			redirect(base_url());
		}
    }
    
    function customers()
    {
        $this->global['pageTitle'] =  'Customers' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_general_users', "status = '0' order by id desc");
		
        $this->loadViews("customers", $this->global, NULL , NULL);
    }
    
    function customers_report()
    {
        $this->global['pageTitle'] =  'Customers' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_general_users', "status = '0' order by id desc");
		
        $this->loadViews("customers-report", $this->global, NULL , NULL);
    }
    
    function pages()
    {
        $this->global['pageTitle'] =  'Pages' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' order by name asc");
		
        $this->loadViews("pages", $this->global, NULL , NULL);
    }
    
    function reviews()
    {
        $this->global['pageTitle'] =  'Reviews' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_reviews', "status = '0' order by id desc");
		
        $this->loadViews("reviews", $this->global, NULL , NULL);
    }
    
    function edit_page($id)
    {
        $this->global['pageTitle'] =  'Edit Page' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' and id = '$id'");
		
        $this->loadViews("edit-page", $this->global, NULL , NULL);
    }
    
    function page_editor($id)
    {
        $this->global['pageTitle'] =  'Page Editor' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' and id = '$id'");
		if(sizeof($this->global['records']) > 0)
		{
			$this->global['sections'] = $this->common_model->get_records('tbl_sections', "status = '0'");
			
			$this->global['page_sections'] = $this->common_model->get_records('tbl_page_sections', "status = '0' and page_id = '$id' order by section_order + 0 asc");
			
			$this->global['tis'] = $this;
				
			$this->loadViews("page-editor", $this->global, NULL , NULL);
		}
		else
		{
			redirect("admin");
		}
    }
    
    function get_table_data()
    {
		$table_name = $this->input->post('table_name');
		$data['page_section_id'] = $this->input->post('page_section_id');
		
		if($table_name == "tbl_image_with_link")
		{
			$this->load->view('admin/sections/includes/list-images.php', $data); 
		}
		elseif($table_name == "tbl_testimonial")
		{
			$this->load->view('admin/sections/includes/list-testimonials.php', $data); 
		}
		elseif($table_name == "tbl_image_with_link1")
		{
			$this->load->view('admin/sections/includes/list-image.php', $data); 
		}
		elseif($table_name == "tbl_image_with_link2")
		{
			$this->load->view('admin/sections/includes/list-image_with_text_link.php.php', $data); 
		}
		else
		{
			echo '<span class="text-danger">Something went wrong!</span>';
		}
    }
	function get_records()
    {
		$table_name = $this->input->post('table_name');
		$where = $this->input->post('where');
        $data['records'] = $this->common_model->get_records($table_name, $where);
		
		$data['result'] = 1;
		
		echo json_encode($data);
	}
    
    function deletecats()
    {
		$table_name = $this->input->post('table_name');
		$row_id = $this->input->post('row_id');
		
		$data['result'] = 0;
		
		if($table_name == "tbl_category")
		{
			if(sizeof($this->common_model->get_records('tbl_sub_category', "status = 0 and category_id = '$row_id'")) > 0)
			{
				$data['msg'] = "This category cannot be deleted!<br>Please remove all the sub categories under this category!";
				$data['result'] = 2;
			}
			else
			{
				$info['status'] = '1';
				
				$where = "id=" . $row_id;
				
				if($this->common_model->update($table_name, $info, $where))
				{
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
		}
		
		if($table_name == "tbl_sub_category")
		{
			if(sizeof($this->common_model->get_records('tbl_child_category', "status = 0 and sub_category_id = '$row_id'")) > 0)
			{
				$data['msg'] = "This sub category cannot be deleted!<br>Please remove all the child categories under this sub category!";
				$data['result'] = 2;
			}
			else
			{
				$info['status'] = '1';
				
				$where = "id=" . $row_id;
				
				if($this->common_model->update($table_name, $info, $where))
				{
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
		}
		
		if($table_name == "tbl_product_properties_master")
		{
			$info['status'] = '1';
				
			$where = "id=" . $row_id;
				
			if($this->common_model->update($table_name, $info, $where))
			{
				$data['result'] = 1;
			}
			else
			{
				$data['result'] = 0;
			}
		}
		
		echo json_encode($data);
    }
    
    function delete_data()
    {
		$table_name = $this->input->post('table_name');
		$where = $this->input->post('where');
		$delete_image = $this->input->post('delete_image');
		
        $this->common_model->delete_data($table_name, $where);
		
		if(file_exists($delete_image))
		{
			unlink($delete_image);
		}
		
		$data['result'] = 1;
		
		echo json_encode($data);
    }
    
    function delete_data_2()
    {
		$table_name = $this->input->post('table_name');
		$where = $this->input->post('where');
		$delete_image = $this->input->post('delete_image');
		$delete_data_2 = $this->input->post('delete_data_2');
		
        $this->common_model->delete_data($table_name, $where);
		
		if(file_exists($delete_image))
		{
			unlink($delete_image);
		}
		
		if(file_exists($delete_data_2))
		{
			unlink($delete_data_2);
		}
		
		$data['result'] = 1;
		
		echo json_encode($data);
    }
    
    function top_header()
    {
        $this->global['pageTitle'] =  'Top Header' . " - " . $this->config->item('app_name');
        
		$this->global['logo'] = $this->common_model->get_records('tbl_general_settings', "status = '0' and option_name = 'top-header-logo'")[0];
        
        $this->loadViews("top_header", $this->global, NULL , NULL);
    }
    
    function bottom_footer()
    {
        $this->global['pageTitle'] =  'Bottom Footer' . " - " . $this->config->item('app_name');
        
		$this->global['column1'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column1'")[0];
		$this->global['column2'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column2'")[0];
		$this->global['column3'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column3'")[0];
        
        $this->loadViews("bottom_footer", $this->global, NULL , NULL);
    }
    
    public function products_report()
    {
        $this->global['pageTitle'] = 'Products' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_product', "status != '9' order by name asc");
        
        $this->loadViews("products-report", $this->global, NULL , NULL);
    }
	
    function list_sections_page()
    {
        $this->global['pageTitle'] =  'Sections' . " - " . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_sections', "status != '9' order by name asc");
        
        $this->loadViews("list_sections_page", $this->global, NULL , NULL);
    }
    
    function checkSlugExists($slug, $table, $id)
    {
		$slugs = $this->common_model->get_records($table, "slug = '$slug'");
        if(sizeof($slugs) > 1)
		{
			return $slug . '-' . uniqid();
		}
        if(sizeof($slugs) == 1)
		{
			if($slugs[0]->id == $id)
			{
				return $slug;
			}
			else
			{
				return $slug . '-' . uniqid();
			}
		}
		return $slug;
    }
    
    function update_page_sections()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$size = sizeof($_POST['section_code']);
			$info['page_id'] = $_POST['page_id'];
			$info1['status'] = '1';
			$this->common_model->update('tbl_page_sections', $info1, 'page_id=' . $_POST['page_id']);
			for($i = 0; $i < $size; $i++)
			{
				if($_POST['row_id'][$i] == 0)
				{
					$info['section_code'] = $_POST['section_code'][$i];
					$info['section_order'] = $i + 1;
					$this->common_model->insert('tbl_page_sections', $info);
				}
				else
				{
					$info['section_code'] = $_POST['section_code'][$i];
					$info['section_order'] = $i + 1;
					$info['status'] = '0';
					$this->common_model->update('tbl_page_sections', $info, 'id=' . $_POST['row_id'][$i]);
				}
			}
			$data['result'] = 1;
		}
		echo json_encode($data);
    }
	
    function update_header_menu()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$parent = "0";
			$sub = "0";
			$size = sizeof($_POST['menu_type']);
			$this->common_model->delete_all('tbl_header_menu');
			for($i = 0; $i < $size; $i++)
			{
				if($_POST['menu_type'][$i] == "parent")
				{
					$parent = "0";
					$sub = "0";
				}
				
				$info['menu_type'] = $_POST['menu_type'][$i];
				$info['cat_id'] = $_POST['cat_id'][$i];
				$info['cat_type'] = $_POST['cat_type'][$i];
				$info['image'] = $_POST['image'][$i];
				$info['parent_id'] = $parent;
				$info['sub_id'] = $sub;
				
				if($_POST['menu_type'][$i] == "sub")
				{
					$info['sub_id'] = '0';
				}
				
				$info['menu_order'] = $i + 1;
				
				$insert_id = $this->common_model->insert('tbl_header_menu', $info);
				
				if($_POST['menu_type'][$i] == "parent")
				{
					$parent = $insert_id;
					$sub = "0";					
				}
				elseif($_POST['menu_type'][$i] == "sub")
				{
					$sub = $insert_id;
				}
			}
			$data['result'] = 1;
		}
		echo json_encode($data);
    }
	
    function menu_header_images()
    {
		$this->global['pageTitle'] =  'Header Menu Images' . " - " . $this->config->item('app_name');
        
		$this->global['menus'] = $this->common_model->get_records('tbl_header_menu', "status = '0' order by menu_order asc");
        
        $this->loadViews("header-menu-images", $this->global, NULL , NULL);
    }
	
    function menu_header_images_post()
    {
		$folder_name = "header-menu";
		if(sizeof($_FILES) > 0)
		{
			foreach($_FILES as $key => $value)
			{
				$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
				if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
				{
					$info['image'] = $file_new_name;
					$info['image_link'] = $this->input->post('image_link_' . $key);
					$this->common_model->update('tbl_header_menu', $info, 'id=' . $key);
				}
			}
			$data['result'] = 1;
		}
		else
		{
			$data['result'] = 0;
		}
		echo json_encode($data);
    }
	
    function product_additional_images($product_id)
    {
		$data['product_id'] = $product_id;
		$this->load->view("admin/edit-product/product-additional-images", $data);
    }
	
    function product_dimensions_images($product_id)
    {
		$data['product_id'] = $product_id;
		$this->load->view("admin/edit-product/product-dimensions-images", $data);
    }
	
    public function insert_coupon_data()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$coupon_code = $this->input->post('coupon_code');
			if(sizeof($this->common_model->get_records("tbl_coupons", "status = '0' and coupon_code = '$coupon_code'")) < 1)
			{
				foreach($_POST as $key => $value)
				{
					if($key != 'table_name' && $key != 'row_id')
					{
						$info[$key] = $value;
					}
				}
				
				$table = $this->input->post('table_name');
				
				if($insert_id = $this->common_model->insert($table, $info))
				{
					$data['result'] = 1;
					$data['insert_id'] = $insert_id;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			else
			{
				$data['result'] = 2;
			}
        }
		echo json_encode($data);
	}
	function status_update()
    {
		$table_name = $this->input->post('table');
		$row_id = $this->input->post('row_id');
		$status = $this->input->post('status');
		$field=$this->input->post('field');

		$data['result'] = 0;
		if($status==0)
		{
			$status=1;
		}
		else{
			$status=0;
		}
		
			if($this->common_model->update_status($table_name,$row_id,$status,$field)){
				$data['result'] = 1;

			}
		
		
		echo json_encode($data);
    }
    
    function insert()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			foreach($_POST as $key => $value)
			{
				if($key != 'table_name' && $key != 'row_id')
				{
					if($key == 'slug')
					{
						if(strlen($value) > 0)
						{
							$info[$key] = $this->slugify($value);
						}
						else
						{
							$info[$key] = $this->slugify($this->input->post('name'));
						}
					}
					else
					{
						$info[$key] = $value;
					}
				}
			}
			
			$table = $this->input->post('table_name');
			
			if($table == "tbl_sections")
			{
				$info['section_code'] = "section-" . time() . "-" . uniqid();
			}
			
			$folder_name = 'common';
			
			if($table == 'tbl_brands')
			{
				$folder_name = 'brands';
			}
			elseif($table == 'tbl_product_images')
			{
				$folder_name = 'products';
			}
			elseif($table == 'tbl_product_dimensions_images')
			{
				$folder_name = 'products';
			}
			elseif($table == 'tbl_product')
			{
				$folder_name = 'products';
			}
			elseif($table == 'tbl_sections')
			{
				$folder_name = 'sections';
			}
			elseif($table == 'tbl_category' || $table == 'tbl_sub_category' || $table == 'tbl_child_category' || $table == 'tbl_category_images')
			{
				$folder_name = 'category';
			}
			elseif($table == 'tbl_pages')
			{
				$folder_name = 'pages';
			}
			else
			{
				$folder_name = "common";
			}
			
			
			if(sizeof($_FILES) > 0)
			{
				if($table == 'tbl_product_images')
				{
					$incc = 0; 
					while($incc < sizeof($_FILES['file_name']['name']))
					{
						if($_FILES['file_name']['error'][$incc] != 4)
						{
							$file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['file_name']["name"][$incc],PATHINFO_EXTENSION));
							if($this->product_images_upload('file_name', $file_new_name, 'uploads/products/', $incc) == true)
							{
								$info['file_name'] = $file_new_name;
								//echo $file_new_name;
								$this->common_model->insert('tbl_product_images', $info);
							}
						}
						
						$incc++;
					}
					
					$data['result'] = 1;
				}
				elseif($table == 'tbl_product_dimensions_images')
				{
					$incc = 0; 
					while($incc < sizeof($_FILES['file_name']['name']))
					{
						if($_FILES['file_name']['error'][$incc] != 4)
						{
							$file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['file_name']["name"][$incc],PATHINFO_EXTENSION));
							if($this->product_images_upload('file_name', $file_new_name, 'uploads/products/', $incc) == true)
							{
								$info['file_name'] = $file_new_name;
								//echo $file_new_name;
								$this->common_model->insert('tbl_product_dimensions_images', $info);
							}
						}
						
						$incc++;
					}
					
					$data['result'] = 1;
				}
				else
				{
					foreach($_FILES as $key => $value)
					{
						$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
						if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
						{
							$info[$key] = $file_new_name;
						}
					}
					if($insert_id = $this->common_model->insert($table, $info))
					{
						if(array_key_exists('slug', $info))
						{
							$info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
							$info2['slug'] = $info['slug'];
							$this->common_model->update($table, $info2, "id=" . $insert_id);
							$this->insert_slug($info, $table, $insert_id);
						}
						$data['result'] = 1;
						$data['insert_id'] = $insert_id;
					}
					else
					{
						$data['result'] = 0;
					}
				}
			}
			else
			{
				if($insert_id = $this->common_model->insert($table, $info))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update($table, $info2, "id=" . $insert_id);
						$this->insert_slug($info, $table, $insert_id);
					}
					$data['result'] = 1;
					$data['insert_id'] = $insert_id;
				}
				else
				{
					$data['result'] = 0;
				}
			}
        }
		echo json_encode($data);
    }
	
    function insert_product()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$info = array();
			foreach($_POST as $key => $value)
			{
				if($key != 'table_name' && $key != 'row_id' && $key != 'product_1')
				{
					if($key == 'slug')
					{
						$info[$key] = $this->slugify($this->input->post('name'));
					}
					else
					{
						$info[$key] = $value;
					}
				}
			}
			
			$info['slug'] = $this->slugify($this->input->post('name'));
			
			$info['meta_title'] = ucfirst($this->input->post('name'));
			$info['meta_description'] = $this->input->post('short_description');
			$info['sku_id'] = uniqid();
			$info['product_status'] = "approved";
			
			$child_category = $this->input->post('child_category');
			
			$parent_cat = $this->common_model->get_record("tbl_child_category", "id=" . $child_category, "category_id");
			$sub_cat = $this->common_model->get_record("tbl_child_category", "id=" . $child_category, "sub_category_id");
			$child_cat = $child_category;
			
			$info['category'] = $parent_cat;
			$info['sub_category'] = $sub_cat;
			$info['child_category'] = $child_cat;
			$info['product_status'] = "approved";
			$info['created_by'] = "1";
			
			$table = "tbl_product";
			
			if(sizeof($_FILES) > 0)
			{
    			$folder_name = 'products';
    			
				foreach($_FILES as $key => $value)
				{
					$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
					if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
					{
						$info[$key] = $file_new_name;
					}
				}
				if($insert_id = $this->common_model->insert($table, $info))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], "tbl_product", $insert_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update("tbl_product", $info2, "id=" . $insert_id);
						$this->insert_slug($info, "tbl_product", $insert_id);
					}
					$data['product_id'] = $insert_id;
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			else
			{
				if($insert_id = $this->common_model->insert($table, $info))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], "tbl_product", $insert_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update("tbl_product", $info2, "id=" . $insert_id);
						$this->insert_slug($info, "tbl_product", $insert_id);
					}
					$data['product_id'] = $insert_id;
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			
        }
		echo json_encode($data);
    }
	
    function update_product()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$info = array();
			foreach($_POST as $key => $value)
			{
				if($key != 'table_name' && $key != 'row_id' && $key != 'product_1')
				{
					if($key == 'slug')
					{
						$info[$key] = $this->slugify($this->input->post('name'));
					}
					else
					{
						$info[$key] = $value;
					}
				}
			}
			
			$child_category = $this->input->post('child_category');
			
			$parent_cat = $this->common_model->get_record("tbl_child_category", "id=" . $child_category, "category_id");
			$sub_cat = $this->common_model->get_record("tbl_child_category", "id=" . $child_category, "sub_category_id");
			$child_cat = $child_category;
			
			$info['category'] = $parent_cat;
			$info['sub_category'] = $sub_cat;
			$info['child_category'] = $child_cat;
			
			$table = $this->input->post('table_name');
			$row_id = $this->input->post('row_id');
			
			if(sizeof($_FILES) > 0)
			{
    			$folder_name = 'products';
    			
				foreach($_FILES as $key => $value)
				{
					$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
					if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
					{
						$info[$key] = $file_new_name;
					}
				}
				if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], "tbl_product", $row_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update("tbl_product", $info2, "id=" . $row_id);
						$this->common_model->update("tbl_slug", $info2, "product_id=" . $row_id);
					}
					
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			else
			{
				if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update($table, $info2, "id=" . $row_id);
						$this->update_slug($info, $table, $row_id);
					}
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			
        }
		
		echo json_encode($data);
    }
	
    function update()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$info = array();
			foreach($_POST as $key => $value)
			{
				if($key != 'table_name' && $key != 'row_id' && $key != 'product_1')
				{
					if($key == 'slug')
					{
						if(strlen($value) > 0)
						{
							$info[$key] = $this->slugify($value);
						}
						else
						{
							$info[$key] = $this->slugify($this->input->post('name'));
						}
					}
					else
					{
						$info[$key] = htmlentities($value);
					}
				}
			}
			
			$table = $this->input->post('table_name');
			$row_id = $this->input->post('row_id');
			
			if(sizeof($_FILES) > 0)
			{
				if($table == 'tbl_brands')
				{
					$folder_name = 'brands';
				}
				elseif($table == 'tbl_sections')
				{
					$folder_name = 'sections';
				}
				elseif($table == 'tbl_category' || $table == 'tbl_sub_category' || $table == 'tbl_child_category')
				{
					$folder_name = 'category';
				}
				else
				{
					$folder_name = "common";
				}
				
				foreach($_FILES as $key => $value)
				{
					$file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
					if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
					{
						$info[$key] = $file_new_name;
					}
				}
				if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update($table, $info2, "id=" . $row_id);
						$this->update_slug($info, $table, $row_id);
					}
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			else
			{
				if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
				{
					if(array_key_exists('slug', $info))
					{
						$info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
						$info2['slug'] = $info['slug'];
						$this->common_model->update($table, $info2, "id=" . $row_id);
						$this->update_slug($info, $table, $row_id);
					}
					$data['result'] = 1;
				}
				else
				{
					$data['result'] = 0;
				}
			}
			
        }
		echo json_encode($data);
    }
	
    function update_product_properties_data()
    {
        if($this->isAdmin() == TRUE)
        {
            $data['result'] = 0;
        }
        else
        {
			$this->common_model->delete_data('tbl_product_properties', "product_id=" . $this->input->post("product_id"));
			for($i = 0; $i < sizeof($_POST['title_id']); $i++)
			{
				$info['product_id'] = $this->input->post("product_id");
				$info['title_id'] = $_POST["title_id"][$i];
				$info['title'] = $this->common_model->get_record("tbl_product_properties_master", "id=" . $_POST["title_id"][$i], "title");
				$info['value'] = $_POST["value"][$i];
				$this->common_model->insert("tbl_product_properties", $info);
			}
			
			$data['result'] = 1;
        }
		echo json_encode($data);
    }
	
	function slugify($text)
	{
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
	
	function insert_slug($info = '', $table = '', $insert_id = '')
	{
		if(array_key_exists("slug", $info))
		{
			$info1['slug'] = $info['slug'];
			
			if($table == 'tbl_category'){
				$info1['category_id'] = $insert_id;
			}
			if($table == 'tbl_sub_category'){
				$info1['sub_category_id'] = $insert_id;
			}
			if($table == 'tbl_child_category'){
				$info1['child_category_id'] = $insert_id;
			}
			if($table == 'tbl_pages'){
				$info1['page_id'] = $insert_id;
			}
			if($table == 'tbl_product'){
				$info1['product_id'] = $insert_id;
			}
			if($table == 'tbl_brands'){
				$info1['brand_id'] = $insert_id;
			}
			
			$this->common_model->insert('tbl_slug', $info1);
		}
	}
	
	function update_slug($info = '', $table = '', $row_id = '')
	{
		if(array_key_exists("slug", $info))
		{
			$info1['slug'] = $info['slug'];
			
			$where = '';
			
			if($table == 'tbl_category'){
				$where = 'category_id=' . $row_id;
			}
			if($table == 'tbl_sub_category'){
				$where = 'sub_category_id=' . $row_id;
			}
			if($table == 'tbl_child_category'){
				$where = 'child_category_id=' . $row_id;
			}
			if($table == 'tbl_pages'){
				$where = 'page_id=' . $row_id;
			}
			if($table == 'tbl_product'){
				$where = 'product_id=' . $row_id;
			}
			if($table == 'tbl_brands'){
				$where = 'brand_id=' . $row_id;
			}
			
			if($this->common_model->update('tbl_slug', $info1, $where) == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	function update_product_slug($info = '', $table = '', $where = '')
	{
		if(array_key_exists("slug", $info))
		{
			$info1['slug'] = $info['slug'];
			
			if($this->common_model->update('tbl_slug', $info1, $where) == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	function image_upload($atr_name, $file_new_name, $target_dir)
	{
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"],PATHINFO_EXTENSION));
		$target_file = $target_dir . $file_new_name;
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		/* if ($_FILES[$atr_name]["size"] > 500000) {
			$uploadOk = 0;
		} */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "svg") {
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
	
	function product_image_upload($atr_name, $file_new_name, $target_dir)
	{
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"],PATHINFO_EXTENSION));
		$target_file = $target_dir . $file_new_name;
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		/* if ($_FILES[$atr_name]["size"] > 500000) {
			$uploadOk = 0;
		} */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
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
	
	function product_images_upload($atr_name, $file_new_name, $target_dir, $incc)
	{
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"][$incc],PATHINFO_EXTENSION));
		$target_file = $target_dir . $file_new_name;
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
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
	
	function multiple_images_upload($atr_name, $file_new_name, $target_dir, $incc)
	{
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"][$incc],PATHINFO_EXTENSION));
		$target_file = $target_dir . $file_new_name;
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
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
	function related_products()
    { 
      $this->global['records'] = $this->common_model->get_records("tbl_product","status='0'");
		
        $this->loadViews("related-products", $this->global, NULL , NULL);
	}
    
	function rproducts_update()
    { 
    	$row_id=$this->input->post('product');
    	$rp=$this->input->post('related_products[]');
    	$info['related_products']=implode(",",$rp);

      //	$info1=implode(",",$this->input->post('related_products'));
       	$this->common_model->update("tbl_product", $info, "id='$row_id'");
		$data['result']=1;
		echo json_encode($data);
       }
}

?>