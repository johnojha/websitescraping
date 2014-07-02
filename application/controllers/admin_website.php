<?php
class Admin_website extends CI_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('website_model');
      
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {

        //all the posts sent by the view
          
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
       

        //pagination settings
        $config['per_page'] = 5;
        $config['base_url'] = base_url().'admin/website';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

       
        if( $search_string !== false){ 
           
           if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            
            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            //fetch manufacturers data into arrays
           

            $data['count_website']= $this->website_model->count_website($search_string, $order);
            $config['total_rows'] = $data['count_website'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['webiste'] = $this->website_model->get_website($search_string, $config['per_page'],$limit_end);        
                }else{
                    $data['website'] = $this->website_model->get_website($search_string, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['website'] = $this->website_model->get_website('', $config['per_page'],$limit_end);        
                }else{
                    $data['website'] = $this->website_model->get_website('', $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
           
            $filter_session_data['search_string_selected'] = null;
           
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            
            $data['order'] = 'id';

            //fetch sql data into arrays
           
            $data['count_website']= $this->website_model->count_website();
            $data['website'] = $this->website_model->get_website('', $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_website'];

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/website/list';
        $this->load->view('includes/template', $data);  

    }//index


	public function listcontent()
	{
		$id = $this->uri->segment(4);
        $data['website'] = $this->website_model->getcontentlist($id);

		$data['main_content'] = 'admin/website/listcontent';
		$this->load->view('includes/template', $data);

	}


    public function viewcontent()
	{
		$id = $this->uri->segment(4);
        $data['website'] = $this->website_model->viewcontent($id);
		

		$data['main_content'] = 'admin/website/viewcontent';
		$this->load->view('includes/template', $data);

	}

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('websiteurl', 'websiteurl', 'required');
          
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'website' => $this->input->post('websiteurl'),
                    
                );
                //if the insert has returned true then we show the flash message
                if($this->website_model->store_website($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }
			redirect('admin/website');

        }
        //fetch manufactures data to populate the select field
        
        $data['main_content'] = 'admin/website/add';
        $this->load->view('includes/template', $data);  


    }       

    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
        
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('websiteurl', 'websiteurl', 'required');
            
           
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
                    'website' => $this->input->post('websiteurl'),
					'content'=>$this->input->post('content'),
                    
                );
                //if the insert has returned true then we show the flash message
                if($this->website_model->update_website($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/website');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        
        $data['website'] = $this->website_model->get_website_by_id($id);
        //fetch manufactures data to populate the select field
       
        $data['main_content'] = 'admin/website/edit';
        $this->load->view('includes/template', $data);            

    }//update

    /**
    * Delete website by his id
    * @return void
    */
    public function delete()
    {
        //website id 
        $id = $this->uri->segment(4);
        $this->website_model->delete_website($id);
        redirect('admin/website');
    }//edit

}