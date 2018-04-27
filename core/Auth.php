<?php

class Auth {

	
	public static function logged() {
		if (isset($_SESSION['loged'])) {
			return true;
		}
		return false;
	}
}