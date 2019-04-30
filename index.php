<?php
require "common.php";


//print_r($_SERVER['REQUEST_METHOD']);

//echo $_SERVER['DOCUMENT_ROOT'];

// echo '<pre>';
//echo '<p>Route</p>';
//print_r($route);
//  echo '<p>POST</p>';
//  print_r($_POST);
//  echo '<p>FILES</p>';
//  print_r($_FILES);
// echo '<p>GET</p>';
// print_r($_GET);
// echo '</pre>';

$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);

$school = new School();
$admin = new Admin();

if (count($route) > 0) {

	if ($route[0] == 'course' && $route[1] == 'displayCourseForm' && !empty($route[2])) {
		$school->displayCourseForm();
	} else if ($route[0] == 'course' && $route[1] == 'displayCourseForm' && empty($route[2])) {
		$school->displayCourseForm();
	} else if ($route[0] == 'course' && $route[1] == 'show' && !empty($route[2])) {
		$school->showCourse();
	} else if ($route[0] == 'course' && $route[1] == 'delete' && !empty($route[2])) {
		$school->deleteCourse();
	} else if ($route[0] == 'course' && $route[1] == 'add') {
		$school->doAddCourse();
	}

	///////////////////////////////////////////////////////////////////////////////////////////////
	//students

	if ($route[0] == 'student' && $route[1] == 'displayStudentForm' && !empty($route[2])) {
		$school->displayStudentForm();
	}
	if ($route[0] == 'student' && $route[1] == 'displayStudentForm' && empty($route[2])) {
		$school->displayStudentForm();
	} else if ($route[0] == 'student' && $route[1] == 'show' && isset($route[2])) {
		$school->showStudent();
	} else if ($route[0] == 'student' && $route[1] == 'delete' && !empty($route[2])) {
		$school->deleteStudent();
	} else if ($route[0] == 'student' && $route[1] == 'add') {
		$school->doAddStudent();
	}

	///////////////////////////////////////////////////////////////////////////////////////
	//administrators
	else if ($route[0] == 'administration' && empty($route[1])) {

		$admin->adminMain();
	} else if ($route[0] == 'administration' && $route[1] == 'displayAdminForm' && empty($route[2])) {

		$admin->displayAdminForm();
	} else if ($route[0] == 'administration' && $route[1] == 'displayAdminForm' && !empty($route[2])) {
		$admin->displayAdminForm();
	} else if ($route[0] == 'administration' && $route[1] == 'delete' && !empty($route[2])) {
		$admin->deleteAdmin();
	} else if ($route[0] == 'administration' && $route[1] == 'add' && empty($route[2])) {
		$admin->doAddAdmin();
	} else if ($route[0] == 'administration' && $route[1] == 'show' && isset($route[2])) {
		$admin->showAdmin();
	} else if ($route[0] == 'login') {
		$admin->doLogin();
	} else if ($route[0] == 'logout') {

		$admin->logout();
	}
	// else{

	// $school->main();
	// }
} else {

	if (empty($route[0])) {
		$school->main();
	}
	
}
