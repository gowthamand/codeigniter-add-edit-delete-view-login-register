<?php
class News_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count()
    {
        return $this->db->count_all('news');
    }
    
    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get_where('news', array('user_id' => $this->session->userdata('user_id')));
            return $query->result_array(); // $query->result(); // returns object
        }
 
        $query = $this->db->get_where('news', array('slug' => $slug, 'user_id' => $this->session->userdata('user_id')));
        return $query->row_array(); // $query->row(); // returns object
        
        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
    }
        
    public function get_news_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_news($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'title' => $this->input->post('title'), // $this->db->escape($this->input->post('title'))
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'user_id' => $this->input->post('user_id'),
        );
        
        if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
            return $this->db->insert('news', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('news', $data);
        }
    }
    
    public function delete_news($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('news'); // $this->db->delete('news', array('id' => $id));  
        
        // error() method will return an array containing its code and message
        // $this->db->error();
    }
}
