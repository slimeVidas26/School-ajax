<?php

class schoolModel {

	private $conn = NULL;

	function __construct() {
		$instance = ConnectDb::getInstance();
		$this->conn = $instance->getConnection();
	}

//////////////////////////////////////////////////////////////////////////////////////
	function data_courseAdd($name, $description, $image) {
		$sql = "INSERT INTO courses (courseName,courseDescription , courseImage)
            VALUES (:courseName,:courseDescription  , :courseImage)";
		try {
			$stmnt = $this->conn->prepare($sql);
			$params = [
				'courseName' => $name,
				'courseDescription' => $description,
				'courseImage' => $image,
			];
			$stmnt->execute($params);
		} Catch (PDOException $e) {
			$e = new ErrorView([
				'message' => $e->getMessage(),
				'code' => $e->getCode(),
			]);
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////

	// 
	
	function data_studentAdd($name,$phone , $email , $image) {
		$sql = "INSERT INTO students (studentName, studentPhone , studentEmail , studentImage)
				VALUES (:studentName, :studentPhone  , :studentEmail  , :studentImage)";
		try {
		  $stmnt = $this->conn->prepare($sql);
		  $params = [
			'studentName' => $name,
			'studentPhone' => $phone,
			'studentEmail' => $email,
			'studentImage' =>  $image
		  ];
		  $stmnt->execute($params);
	  
	
	  $student_id = $this->conn->lastInsertId();
	  if(isset($_POST['coursesGroup'])) {
		//print_r($_POST['coursesGroup']);
		$course_id = $_POST['coursesGroup'];
	  for($i=0;$i < count($_POST['coursesGroup']);$i++){
	  
	  
	  
		$sql=
		"INSERT INTO course_student (course_id,student_id)
				 SELECT * FROM (SELECT ".$course_id[$i].",".$student_id.") AS tmp
				 WHERE NOT EXISTS ( 
				 SELECT course_id,student_id
				 FROM course_student
				 WHERE course_id = ".$course_id[$i]." AND student_id = ".$student_id."
				)";
	  
	  
	   $stmt = $this->conn->query($sql);
	  }
	  }
		
		}
		Catch (PDOException $e) {
		  $e = new ErrorView([
			'message' => $e->getMessage(),
			'code' => $e->getCode()
		  ]);
		}
	  }
	//////////////////////////////////////////////////////////////////////////////////////
	function data_editCourse($id, $name, $description, $image = NULL) {

		try {
			$sql = " UPDATE courses SET
                courseName = :courseName,
                courseDescription = :courseDescription,
                courseImage = :courseImage
                WHERE id = :id";
			$pdoStat = $this->conn->prepare($sql);

			$pdoStat->bindValue(':courseName', $name, PDO::PARAM_STR);
			$pdoStat->bindValue(':courseDescription', $description, PDO::PARAM_STR);
			$pdoStat->bindValue(':courseImage', $image, PDO::PARAM_STR);

			$pdoStat->bindValue(':id', $id, PDO::PARAM_INT);
			$pdoStat->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no course in file';
		}
	}

//////////////////////////////////////////////////////////////////////////////////////
	function data_editStudent($id, $name, $phone, $email, $image = NULL) {

		try {
			$sql = "UPDATE students SET
              studentName = :studentName,
              studentPhone = :studentPhone,
              studentEmail = :studentEmail,
              studentImage = :studentImage

              WHERE id = :id";
			$pdoStat = $this->conn->prepare($sql);

			$pdoStat->bindValue(':studentName', $name, PDO::PARAM_STR);
			$pdoStat->bindValue(':studentPhone', $phone, PDO::PARAM_STR);
			$pdoStat->bindValue(':studentEmail', $email, PDO::PARAM_STR);
			$pdoStat->bindValue(':studentImage', $image, PDO::PARAM_STR);
			$pdoStat->bindValue(':id', $id, PDO::PARAM_INT);
			$pdoStat->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no student in file';
		}
	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllCourses() {

		try {
			$sql = "SELECT id , courseName ,coursePhone , courseDescription ,courseImage
       FROM courses
       ORDER BY id DESC";
			$stmt = $this->conn->query($sql);
			//$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			//print_r($stmt->fetchAll());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no courses in database';
		}

	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllStudents() {

		try {
			$sql = "SELECT id , studentName ,studentPhone , studentEmail ,studentImage
       FROM students
       ORDER BY id DESC";
			$stmt = $this->conn->query($sql);
			//$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			//print_r($stmt->fetchAll());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}

	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllStudentsByCourse($id) {

		try {

			$sql = "SELECT students.studentName AS studentName  ,
			students.studentImage AS studentImage,
			students.id,
			courses.courseName AS courseName
			FROM students
			INNER JOIN course_student
			ON students.id = course_student.student_id
			INNER JOIN courses
			ON course_student.course_id = courses.id
			WHERE courses.id= $id";

			$stmt = $this->conn->query($sql);
			$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			//print_r($stmt->fetchAll());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no students in course';
		}

	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllCoursesByStudent($id) {

		try {

	$sql = "SELECT courses.courseName AS courseName ,
	courses.id,
	students.studentName AS studentName
	FROM courses 
	INNER JOIN course_student
	ON courses.id = course_student.course_id 
	INNER JOIN students
	ON course_student.student_id = students.id
	WHERE students.id= $id";

			$stmt = $this->conn->query($sql);
			$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			//print_r($stmt->fetchAll());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}

	}

	///////////////////////////////////////////////////////////////////////////////////////////////////

	function data_countCourses() {

		try {
			$sql = "SELECT COUNT(id)
       FROM courses";
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			$countCourses = $stmt->fetchColumn();
			return $countCourses;

			echo '<pre>';
			//print_r($stmt->fetch());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}

	}
	/////////////////////////////////////////////////////////////////////////////////////////////

	function data_countStudents() {

		try {
			$sql = "SELECT COUNT(id)
       FROM students";
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			$countStudents = $stmt->fetchColumn();
			return $countStudents;

			echo '<pre>';
			//print_r($stmt->fetch());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////

	function data_countStudentsByCourse($id) {

		try {
	
	$sql="SELECT 
	COUNT(students.id) AS countStudents,
	courses.courseName 
	FROM students
	  RIGHT JOIN course_student
	ON students.id = course_student.student_id
	 RIGHT JOIN courses
	ON course_student.course_id = courses.id
	WHERE courses.id = $id
	GROUP BY  courses.courseName"; 
		
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			$countStudents = $stmt->fetchColumn();
			//print_r($countStudents);
			return $countStudents;

			echo '<pre>';
			//print_r($stmt->fetch());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no students in this course';
		}

	}


	////////////////////////////////////////////////////////////////////////////////////////////////
	public function data_deleteCourse($id) {
		try {
			$sql = "DELETE FROM courses WHERE id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	////////////////////////////////////////////////////////////////////////////////////////////////
	public function data_deleteStudent($id) {
		try {
			$sql = "DELETE FROM students WHERE id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	function data_getCourse($id = NULL) {
		try {
			$sql = "SELECT id, courseName , coursePhone , courseDescription , courseImage
             FROM courses
             WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$course = $stmt->fetch();
			return $course;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	function data_getStudent($id = NULL) {
		try {
			$sql = "SELECT id, studentName , studentPhone , studentEmail , studentImage
      FROM students WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$student = $stmt->fetch();
			return $student;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	////////////////////////////////////////////////////////////////////////

	function getCourseId($name) {
		try {
			$sql = "SELECT id FROM courses WHERE courseName = :courseName ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':courseName', $name, PDO::PARAM_STR);
			$stmt->execute();
			$courseId = $stmt->fetch();

			return $courseId;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
}
?>
