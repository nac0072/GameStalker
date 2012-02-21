<?php

class proxyService extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function psn()
	{
		$this->model->psn();
	}
	function xbox()
	{
		$this->model->xbox();
	}
	

}