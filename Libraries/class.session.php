<?php

class Session {

	static function logged() {
		return (isset($_SESSION['logged'])) ? $_SESSION['logged'] : NULL;
	}
	static function checked() {
		return (isset($_SESSION['checked'])) ? $_SESSION['checked'] : NULL;
	}

	static function setLogged($u) {
		$_SESSION['logged'] = $u;
	}

	static function setChecked($w) {
		$_SESSION['checked'] = $w;
	}

	static function logout() {
		session_destroy();
		$_SESSION = NULL;
	}

}