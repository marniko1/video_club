<?php

class Login extends BaseController {
	public function index () {
		$this->data['title'] = 'Login';
		$this->show_view('login');
	}
	public function loginUser ($username, $password) {
		$checked_credentials = $this->checkCredentials($username, $password);
		if ($checked_credentials == true) {
			$_SESSION['logged'] = true;
			header("Location: ".INCL_PATH);
		} else {
			echo 'losi kredencijali';
		}
	}
	public function logoutUser () {
		unset($_SESSION['logged']);
		header("Location: ".INCL_PATH);
	}
	public function checkCredentials ($username, $password) {
		$credentials = DBUsers::getCredentials($username);
		if (isset($credentials)) {
			if ($credentials->username == $username && $credentials->password == $password) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}