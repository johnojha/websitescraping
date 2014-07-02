<?php
class Website_model extends CI_Model {
   /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_website_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('website');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Fetch products data from the database
    * possibility to mix search, filter and order
    
    * @param string $search_string 
    * @param strong $order
    
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_website($search_string=null, $limit_start, $limit_end)
    {
	    
		$this->db->select('website.id');
		$this->db->select('website.content');
		$this->db->select('website.website');
		
		$this->db->from('website');
		

		

		

		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }


	public function get_websiteinfo()
    {
	    
		$this->db->select('website.id');
		$this->db->select('website.content');
		$this->db->select('website.website');
		
		$this->db->from('website');
		

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }


	public function getcontentlist($id)
    {
	    
		$this->db->select('websitecontent.webid');
		$this->db->select('websitecontent.id');
		$this->db->select('websitecontent.content');
		
		$this->db->where('webid', $id);
		$this->db->from('websitecontent');
		

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

	public function viewcontent($id)
    {
	    
		
		$this->db->select('websitecontent.content');
		
		$this->db->where('id', $id);
		$this->db->from('websitecontent');
		

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }


    /**
    * Count the number of rows
    * 
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_website($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('website');
		
		if($search_string){
			$this->db->like('website', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_website($data)
    {
		$insert = $this->db->insert('website', $data);
	    return $insert;
	}

	function store_values($data)
    {
		$insert = $this->db->insert('websitecontent', $data);
	    return $insert;
	}

    /**
    * Update website
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_website($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('website', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	function delete_website($id){
		$this->db->where('id', $id);
		$this->db->delete('website'); 
	}
}