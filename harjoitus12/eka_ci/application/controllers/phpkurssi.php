<?php
    //Kontrolleri lataa modelit ja lisää ne sivustolle.
	class Phpkurssi extends CI_Controller{
	    function __construct() {
            parent::__construct();
            //Ladataan malli
			$this->load->model('phpkurssi_model');
			$this->load->helper('url');
			//Ladataan kalenteri
			$this->load->library('calendar');
	    }   
	
	    function index()
	    {
            //Create $data -array for the view
		    $data['result'] = $this->phpkurssi_model->getData();
			$data['page_title'] = "CI Php kurssi App!";
			$data['there'] = site_url('phpkurssi/another_page');
			//Generoidaan kalenteri
			$data['calendar'] = $this->calendar->generate();
        
		    //loading the view
		    $this->load->view('phpkurssi_view',$data);
		}
		
		//Funktio joka hallinnoi uuden sivun asetuksia
		function another_page()
		{
			//Create $data -array for the view
			$data['page_title'] = "CI Php kurssi App another page!";
			$data['back'] = site_url('phpkurssi/index');
			$data['text'] = "This is another page. It comes not from database, 
			only from controller!";
		
			//loading the another view
			$this->load->view('phpkurssi_another_view',$data);
		}
    }
?>