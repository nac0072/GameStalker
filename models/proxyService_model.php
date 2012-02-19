<?php

class proxyService_Model extends Model
{

public function __construct()
	{
		parent::__construct();
		
	}

	public function psn()
	{
		
		Session::init();
		$sth = $this->db->prepare("SELECT Psnid FROM user WHERE 
				UserId= :id");
		$sth->execute(array(
			':id' => Session::get('id')
		));
		$data = $sth->fetch();
		$psnID = $data['Psnid'];
		$url = 'http://psnapi.com.ar/ps3/api/psn.asmx/getPSNID?sPSNID='.$psnID;
		$c = curl_init();
		curl_setopt_array($c, array(
		CURLOPT_URL =>$url,
		CURLOPT_HEADER=> false,
		CURLOPT_TIMEOUT=> 10,
		CURLOPT_RETURNTRANSFER=>true 
		));
		$r = curl_exec($c);
		curl_close($c);
		echo json_encode(new SimpleXMLElement($r));
	}
	
}