<?php
    //Malli joka sisältää tiedon haun tietokannasta. Mallit ovat kätevä tapa tallettaa paljon käytettävä koodi yhteen paikkaan ja kutsua sitä sieltä.
    class Phpkurssi_model extends CI_Model {
        //database table as attribute
        private $table;
	
	    function __construct() {
		    //calling the CI_Model constructor
		    parent::__construct();
            //table gets initial value
		    $this->table = 'data';  
	    }
    
	    function getData() {
		    //Query the table for every record and row
		    $query = $this->db->get($this->table);
			
		    if ($query->num_rows() < 0) {
			    show_error('Database is empty!');
			} else {
			    return $query->result();
			}
	    }
    }
?>