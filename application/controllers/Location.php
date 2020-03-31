<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Public_Controller
{
  	protected $_data;

  	public function __construct()
 	{
	    parent::__construct();
	    $this->load->model('location_model');
	    $this->_data = new Location_model();
  	}
}
