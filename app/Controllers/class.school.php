<?php

class School {

	public function main($statusCode = NULL) {
		$logged = session::logged();
		if ($statusCode) {
			$data['error'] = $this->strError($statusCode);
		}

		if ($logged) {
			$schoolView = new SchoolView();
			$schoolModel = new schoolModel();
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'students' => $schoolModel->data_getAllStudents(),
				'logged' => session::logged(),
				'totalCourses' => $schoolModel->data_countCourses(),
				'totalStudents' => $schoolModel->data_countStudents(),
			];

			$schoolView->setComponent("school_main_ctr.php", $data);
			$schoolView->dump();
		} else {
			$notLoggedView = new notloggedview();
			$notLoggedView->addJs('login.js');
			$notLoggedView->setComponent("login_form.php", $data = NULL);
			$notLoggedView->dump();
		}

	}

	public function displayCourseForm() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		if (isset($route[2]) && $route[2] != '') {
			$schoolModel = new schoolModel();
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'course' => $schoolModel->data_getCourse($route[2]),
				'students' => $schoolModel->data_getAllStudents(),
				'totalStudentsByCourse' => $schoolModel->data_countStudentsByCourse($route[2]),

			];
			if (!$data['course']) {
				header("location: /school");
			}
		} else {
			$schoolModel = new schoolModel();
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'course' => $schoolModel->data_getCourse(),
				'students' => $schoolModel->data_getAllStudents(),
				// 'totalStudentsBycourse' => $schoolModel->data_countStudentsByCourse($route[2]),

			];
			$data['course']['id'] = '';
			$data['course']['courseName'] = '';
			$data['course']['courseDescription'] = '';
			$data['course']['courseImage'] = '';

		}
		$schoolView = new SchoolView();
		$schoolView->setComponent("course_add_form.php", $data);
		$schoolView->addJs('courses.js');
		$schoolView->dump();

	}

	//////////////////////////////////////////////////////////////////////////////////////////////

	

	//////////////////////////////////////////////////////////////////////////////////////////////

	public function displayStudentForm() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		if (isset($route[2]) && $route[2] != '') {
			$schoolModel = new schoolModel();
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'student' => $schoolModel->data_getStudent($route[2]),
				'students' => $schoolModel->data_getAllStudents(),
				'studentCourses' => $schoolModel->data_getAllCoursesByStudent($route[2])
			];
			if (!$data['student']) {
				header("location: /school");
			}
		} else {
			$schoolModel = new schoolModel();
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'student' => $schoolModel->data_getStudent(),
				'students' => $schoolModel->data_getAllStudents(),
				//  'studentCourses' => $schoolModel->data_getAllCoursesByStudent($route[2]),


			];
			$data['student']['id'] = '';
			$data['student']['studentName'] = '';
			$data['student']['studentPhone'] = '';
			$data['student']['studentEmail'] = '';
			$data['student']['studentImage'] = '';

		}
		$schoolView = new SchoolView();
		$schoolView->setComponent("student_add_form.php", $data);
		$schoolView->addJs('courses.js');
		$schoolView->dump();

	}

	/////////////////////////////////////////////////////////////////////////////////////////

	

	public function doAddStudent(){ 
		if(isset($_FILES, $_POST)){   
		try {
			  $id = &$_POST['id']; 
			  $studentName = &$_POST['studentName'];
			  $studentPhone = &$_POST['studentPhone'];
			  $studentEmail = &$_POST['studentEmail'];
			  $f =& $_FILES['fileToUpload'];
			  $studentHidden = &$_POST['hiddenImage']; 

			  $ext=pathinfo($f['name'],PATHINFO_EXTENSION);      
		if(!in_array($ext,['jpg','png','jpeg','gif'])) {      
		   throw new RuntimeException("Invalid file type {$ext}");    
		   }     
		$filename = 'student_'.time().'.'.$ext;
		rename($f['tmp_name'],UPLOAD_DIR.$filename); 
			  
		
		if ($id=='' && !empty($studentName) && !empty($studentPhone) && !empty($studentEmail) && !empty($f)){
		
		
		// add to db
			   $schoolModel = new schoolModel();
			  $schoolModel->data_studentAdd($studentName,$studentPhone ,$studentEmail  ,$filename) ; 
			 }
		else
		    { 
			
		// update db
		  if(empty($f)){
		 $schoolModel = new schoolModel();
		  $schoolModel->data_editStudent($id , $studentName,$studentPhone , $studentHidden ,$studentEmail); 
		
		 }
		  else {
		 $schoolModel = new schoolModel();
		  $schoolModel->data_editStudent($id ,$studentName,$studentPhone ,$studentEmail  ,$filename); 
		 }
		
		} 
		
		header("location: /school"); 
		}
		catch(RuntimeException $e) {
			$e->getMessage();
		 	}
		
		}
		
		}


/////////////////////////////////////////////////////////////////////////////////////////

	public function doAddCourse() {
		if (isset($_FILES, $_POST)) {
			try {
				$id = &$_POST['id'];
				$courseName = &$_POST['courseName'];
				$courseDescription = &$_POST['courseDescription'];
				$f = &$_FILES['fileToUpload'];
				$courseHidden = &$_POST['hiddenImage'];

				$ext = pathinfo($f['name'], PATHINFO_EXTENSION);
				if (!in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
					throw new RuntimeException("Invalid file type {$ext}");
				}
				$filename = 'course_' . time() . '.' . $ext;
				rename($f['tmp_name'], UPLOAD_DIR . $filename);

				if ($id == '' && !empty($courseName) && !empty($courseDescription) && !empty($f)) {

					// add to db
					$schoolModel = new schoolModel();
					$schoolModel->data_courseAdd($courseName, $courseDescription, $filename);
				} //END OF IF ID=='  '
				else {
					// update db
					if (empty($f)) {
						$schoolModel = new schoolModel();
						$schoolModel->data_editCourse($id, $courseName,$courseHidden, $courseDescription);

					} else {
						$schoolModel = new schoolModel();
						$schoolModel->data_editCourse($id, $courseName, $courseDescription, $filename);
					}

				}

				header("location: /school");
			} catch (RuntimeException $e) {
				$e->getMessage();
			}

		}

	}

	//////////////////////////////////////////////////////////////////////////////////

	public function deleteCourse() {

		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);

		if (empty($route[2])) {
			header("location: /school");
		} else {
			$schoolModel = new schoolModel();
			$schoolModel->data_deleteCourse($route[2]);
			header("location: /school");
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////////

	public function deleteStudent() {

		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);

		if (empty($route[2])) {
			header("location: /school");
		} else {
			$schoolModel = new schoolModel();
			$schoolModel->data_deleteStudent($route[2]);
			header("location: /school");
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////

	public function showCourse() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		$schoolModel = new schoolModel();
		if (isset($route[2]) && $route[2] != '') {
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'course' => $schoolModel->data_getCourse($route[2]),
				'students' => $schoolModel->data_getAllStudents(),
				'studentsByCourse' => $schoolModel->data_getAllStudentsByCourse($route[2]),

			];
			$schoolView = new SchoolView();
			$schoolView->addJs('courses.js');
			$schoolView->setComponent("course_show.php", $data);
			$schoolView->dump();
		} else {
			$schoolModel = new schoolModel();

			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'course' => $schoolModel->data_getCourse($route[2]),
			];
			$schoolView = new SchoolView();
			$schoolView->addJs('courses.js');
			$schoolView->setComponent("course_show.php", $data);
			$schoolView->dump();
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////

	public function showStudent() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		$schoolModel = new schoolModel();
		if (isset($route[2]) && $route[2] != '') {
			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),

				'course' => $schoolModel->data_getCourse($route[2]),
				'student' => $schoolModel->data_getStudent($route[2]),
				'students' => $schoolModel->data_getAllStudents(),
				'studentsByCourse' => $schoolModel->data_getAllStudentsByCourse($route[2]),

			];

			$schoolView = new SchoolView();
			$schoolView->addJs('courses.js');
			$schoolView->setComponent("student_show.php", $data);
			$schoolView->dump();
		} else {

			$schoolModel = new schoolModel();

			$data = [
				'courses' => $schoolModel->data_getAllCourses(),
				'logged' => session::logged(),
				'course' => $schoolModel->data_getCourse($route[2]),
				'student' => $schoolModel->data_getStudent($route[2]),
				'students' => $schoolModel->data_getAllStudents(),
				'studentsByCourse' => $schoolModel->data_getAllStudentsByCourse($route[2]),

			];
			$schoolView = new SchoolView();
			$schoolView->addJs('courses.js');
			$schoolView->setComponent("student_show.php", $data);
			$schoolView->dump();
		}
	}

	////////////////////////////////////////////////////////////////

	private function strError($errCode) {
		switch ($errCode) {
		case '1':
			return "Missing Details";
			break;
		case '2':
			return "Unknown User";
			break;
		case '3':
			return "Invalid Login";
			break;
		case '4':
			return "User Exists";
			break;
		case '5':
			return "User Created! You may now Log In.";
			break;
		default:
			return "Error Occured";
		}
	}

}
