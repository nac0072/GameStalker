<?php

class Login_Model extends Model
{
	public function __construct()
	{		parent::__construct();
	}
public function usernameCheck(){
			if($_POST['username']){
				$user = $_POST['username'];
			}
			else{
				echo "NOT SET";
				return false;
			}
			$sth = $this->db->prepare("SELECT UserId FROM user WHERE UserName=:user");
		$sth->execute(array(
			':user' => $user
		));
		$count = $sth->rowCount();
		if($count == 0){
			echo "false";
			return false;
		}
		else{
			echo "true";
			return true;
		}
	
}
	public function run()
	{
		$sth = $this->db->prepare("SELECT UserId FROM user WHERE 
				UserName = :username AND Password = :password");
		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
		));
		
		$data = $sth->fetch();
		
		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('id', $data['UserId']);
			Session::set('loggedIn', true);
			echo $data['UserId'];
		} 
	}
	
}