<?php

class DBUsers extends DB {
	public static function getCredentials($username) {
		$sql = "select * from users where username = '$username'";
		$res = self::executeSQL($sql);
		$credentials = $res->fetch_object();
		return $credentials;
	}
}