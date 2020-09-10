<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/common_model');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    public function list_product_page()
    {
        $this->global['pageTitle'] = 'Products' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_product', "status != '9' order by name asc");
        
        $this->loadViews("list_products_page", $this->global, NULL , NULL);
    }
	
    public function edit_product_page($id)
    {
         $this->global['pageTitle'] = 'Edit Product' . ' - ' . $this->config->item('app_name');
        
		 $this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		 $this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");
		 $this->global['child_categories'] = $this->common_model->get_records('tbl_child_category', "status = '0' order by name asc");
		
		 $this->global['brands'] = $this->common_model->get_records('tbl_brands', "status = '0' order by name asc");
		
		 $this->global['records'] = $this->common_model->get_records('tbl_product', "id = '$id'");
		
		
		
		$this->global['product_images'] = $this->common_model->get_records('tbl_product_images', "product_id = '$id' and status = 0");
		$this->global['product_dimensions'] = $this->common_model->get_records('tbl_product_dimensions_images', "product_id = '$id' and status = 0");
        
		 if(sizeof($this->global['records']) > 0)
		 {
			 $this->loadViews("edit_product_page", $this->global, NULL , NULL);
		 }
		 else
		 {
			 redirect('admin/products');
		 }
		
    }
	
    public function add_product_page()
    {
        $this->global['pageTitle'] = 'Add Products' . ' - ' . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		$this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");
		$this->global['child_categories'] = $this->common_model->get_records('tbl_child_category', "status = '0' order by name asc");
		
		$this->global['brands'] = $this->common_model->get_records('tbl_brands', "status = '0' order by name asc");
        
        $this->loadViews("add_product_page", $this->global, NULL , NULL);
    }
	
    public function brands()
    {
        $this->global['pageTitle'] = 'Brands' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_brands', "status != '9' order by name asc");
		
        $this->loadViews("list_brands_page", $this->global, NULL , NULL);
    }
	public function get_sub_categories()
    {
		if(isset($_POST['main-category']))
		{
			$main_category = base64_decode($_POST['main-category']);
			$subs = $this->frontend_model->get_records("tbl_sub_category", "category_id = '$main_category' and status = '0' order by name asc");
			$i = 0;
			foreach($subs as $sub)
			{
				$data['subs'][$i] = $sub;
				$data['subs'][$i]->value = base64_encode($sub->id);
				$data['subs'][$i]->name = ucfirst($sub->name);
				$i++;
			}
			$data['result'] = 1;
		}
		else
		{
			$data['result'] = 0;
		}
		echo json_encode($data);
    }

    public function get_child_categories()
    {
		if(isset($_POST['sub-category']))
		{
			$sub_category = base64_decode($_POST['sub-category']);
			$childs = $this->frontend_model->get_records("tbl_child_category", "sub_category_id = '$sub_category' and status = '0' order by name asc");
			$i = 0;
			foreach($childs as $child)
			{
				$data['child'][$i] = $child;
				$data['child'][$i]->value = base64_encode($child->id);
				$data['child'][$i]->name = ucfirst($child->name);
				$i++;
			}
			$data['result'] = 1;
		}
		else
		{
			$data['result'] = 0;
		}
		echo json_encode($data);
    }
}
?>