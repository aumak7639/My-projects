<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Category extends BaseController
{
    /**
     * This is default constructor of the class
     */
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
    
    public function list_category_page()
    {
        $this->global['pageTitle'] = 'Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_category', "status != '9' order by name asc");
        
        $this->loadViews("list_category_page", $this->global, NULL , NULL);
    }
    
    public function list_sub_category_page()
    {
        $this->global['pageTitle'] = 'Sub Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		
		$this->global['records'] = $this->common_model->get_records('tbl_sub_category', "status != '9' order by name asc");
        
        $this->loadViews("list_sub_category_page", $this->global, NULL , NULL);
    }
    
    public function list_child_category_page()
    {
        $this->global['pageTitle'] = 'Child Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		
		$this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");
		
		$this->global['records'] = $this->common_model->get_records('tbl_child_category', "status != '9' order by name asc");
        
        $this->loadViews("list_child_category_page", $this->global, NULL , NULL);
    }
    public function contact_list()
    {
        $this->global['pageTitle'] = 'contacts' . ' - ' . $this->config->item('app_name');
        
            $this->global['records'] = $this->common_model->get_records('tbl_contact_form', "status = '0' order by date_time desc");
        
        $this->loadViews("contact_list", $this->global, NULL , NULL);
    }

}

?>