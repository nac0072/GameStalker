<?php

class proxyService_Model extends Model
{

public function __construct()
	{
		parent::__construct();
		
	}
	public function psnQuery($psnID){
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
		return $r;
	}
	public function xboxQuery($tag){
		//NOTE: tag need to have %20 in spaces
		$url = 'http://www.xboxleaders.com/api/profile/'.$tag.'.json';
		$c = curl_init();
		curl_setopt_array($c, array(
		CURLOPT_URL =>$url,
		CURLOPT_HEADER=> false,
		CURLOPT_TIMEOUT=> 10,
		CURLOPT_RETURNTRANSFER=>true 
		));
		$r = curl_exec($c);
		curl_close($c);
		return $r;
	}
	public function psn()
	{
		Session::init();
		if(isset($_POST['tag'])){
			$sth = $this->db->prepare("SELECT Psnid FROM user WHERE 
				Psnid= :tag");
		$sth->execute(array(
			':tag' => $_POST['tag']
		));
		$count = $sth->rowCount();
		if($count != 0){
			echo  json_encode('exists');
			$_POST['tag'] = "";
			return false;
		}
				echo json_encode(new SimpleXMLElement($this->psnQuery($_POST['tag'])));
				$_POST['tag'] = "";
				return false;	
		}
		$sth = $this->db->prepare("SELECT Psnid FROM user WHERE 
				UserId= :id");
		$sth->execute(array(
			':id' => Session::get('id')
		));
		$data = $sth->fetch();
		$psnID = $data['Psnid'];
		echo json_encode(new SimpleXMLElement($this->psnQuery($psnID)));
	}
	public function xbox()
	{
		Session::init();
		if(isset($_POST['tag'])){
			$tag = str_replace(" ", "%20", $_POST['tag']);
			$sth = $this->db->prepare("SELECT XboxId FROM user WHERE 
				XboxId= :tag");
		$sth->execute(array(
			':tag' => $tag
		));
		$count = $sth->rowCount();
		if($count != 0){
			echo json_encode('exists');
			return false;
		}
				echo $this->xboxQuery($tag);
				return false;	
		}
		$sth = $this->db->prepare("SELECT XboxId FROM user WHERE 
				UserId= :id");
		$sth->execute(array(
			':id' => Session::get('id')
		));
		$data = $sth->fetch();
		$XID = $data['XboxId'];
		$XID = str_replace(" ", "%20", $XID);
		echo $this->xboxQuery($XID);
	}
}