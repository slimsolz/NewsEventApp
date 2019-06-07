<?php

class Session{

	private $loggedIn = false;
	public $adminId;
	public $user;

	function __construct(){
		session_start();
		$this->checkLogin();
	}

	public function isLoggedIn() {
		return $this->loggedIn;
	}

	public function login($admin){
		if ($admin) {
			$this->adminId = $_SESSION['adminId'] = $admin->id;
			$this->user = $_SESSION['user'] = $admin->firstName . " " .$admin->lastName;
			$this->loggedIn = true;
		}
	}

	public function logout(){
		unset($_SESSION['adminId']);
		unset($_SESSION['user']);
		unset($this->adminId);
		unset($this->user);
		$this->loggedIn = false;
	}

	private function checkLogin(){
		if (isset($_SESSION['adminId']) && isset($_SESSION['user'])) {
			$this->adminId = $_SESSION['adminId'];
			$this->user = $_SESSION['user'];
			$this->loggedIn = true;
		} else {
			unset($this->adminId);
			unset($this->user);
			$this->loggedIn = false;
		}
	}

}

$session = new Session();
?>
