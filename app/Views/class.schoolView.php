<?php

class schoolView extends View {
	private $component = NULL;
	private $data = NULL;

	function __construct($title = NULL) {
		parent::__construct($title);
	}

	function setComponent($component, $data = NULL) {
		$this->component = $component;
		if ($data) {
			$this->data = $data;
		}
	}

	function dump() {
		require "components/html_top.php";
		require "components/header_menu.php";
		require "components/message.php";
		require "components/school_sidebar.php";
		require 'components/' . $this->component;
		require "components/html_bottom.php";
	}
}
