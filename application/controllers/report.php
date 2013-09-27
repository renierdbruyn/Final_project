<?php
class Report extends CI_Controller {
	
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("reportmodel");
        $this->load->helper('mpdf');
       $this->load->vars('base_url', 'http://localhost/new/index.php/');
    }
    
    public function index()
    {
        
        $this->load->model('reportmodel');
        
        if ($this->input->post('act')=='create_post')
        {
            $this->reportmodel->add();
        }
        
        $data['report']=$this->reportmodel->get_all();
       
        
        $html = $this->load->view('reportview', $data, TRUE);

			$this->load->helper('mpdf');

			pdf_create($html, ('index'), TRUE);
		
	       
        $data['content'] = 'reportview';
		$this->layout->buffer('content', 'reportview')->render();
        
    }
}
	

