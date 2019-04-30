<?php

class AdminModel {

	function __construct() {
		$instance = ConnectDb::getInstance();
		$this->conn = $instance->getConnection();
	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllAdmins() {

		try {
			$sql = "SELECT id , adminName ,adminRole , adminPhone , adminImage ,adminEmail , adminHash
       FROM administrators
       ORDER BY id DESC";
			$stmt = $this->conn->query($sql);
			//$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			print_r($stmt->fetchAll());
			echo '</pre>';
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no administrator in database';
		}

	}

	////////////////////////////////////////////////////////////////////////////////
	function data_getAllAdminsNotOwner() {

		try {
			$sql = "SELECT id , adminName ,adminRole , adminPhone , adminImage ,adminEmail , adminHash
       FROM administrators
       WHERE adminRole NOT IN ('owner')
       ORDER BY id DESC";
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			return $stmt->fetchAll();

			echo '<pre>';
			print_r($stmt->fetchAll());
			echo '</pre>';
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no administrator in database';
		}

	}

	///////////////////////////////////////////////////////////////////////////////////////////////////

	function data_countAdmins() {

		try {
			$sql = "SELECT COUNT(id) AS countAdmins
       FROM administrators";
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			$countAdmins = $stmt->fetchColumn();
			// print_r($countAdmins);
			return $countAdmins;

			

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}

	}

	///////////////////////////////////////////////////////////////////////////////////////////////////

	function data_countAdminsNotOwner() {

		try {
			$sql = "SELECT COUNT(id)
       FROM administrators
        WHERE adminRole NOT IN ('owner')";
			$stmt = $this->conn->query($sql);
			$stmt->execute();
			$countAdmins = $stmt->fetchColumn();
			return $countAdmins;

			echo '<pre>';
			print_r($stmt->fetch());
			echo '</pre>';

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no posts in database';
		}

	}

	//////////////////////////////////////////////////////////////////////////////////////////////////
	function data_getAdmin($id = NULL) {
		try {
			$sql = "SELECT id, adminName , adminRole , adminPhone , adminImage , adminEmail , adminHash
      FROM administrators WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$admin = $stmt->fetch();
			return $admin;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

	}

	//////////////////////////////////////////////////////////////////////////////

	function getAdminByName($adminEmail) {
		$sql = "SELECT id,adminEmail ,  adminName , adminRole , adminPhone , adminImage  , adminHash
          FROM administrators WHERE adminEmail = :adminEmail";
		try {
			$stmnt = $this->conn->prepare($sql);
			$params = [
				'adminEmail' => $adminEmail,
			];
			$stmnt->execute($params);
			return $stmnt->fetch();
		} Catch (PDOException $e) {
			$e = new ErrorView([
				'message' => $e->getMessage(),
				'code' => $e->getCode(),
			]);
		}
	}
/////////////////////////////////////////////////////////////////////////////////////
	function addAdministrator($adminEmail, $adminHash) {
		$sql = <<<SQL
INSERT INTO administrators (adminEmail,adminHash)
VALUES (:adminEmail, :adminHash)
SQL;
		try {
			$stmnt = $this->conn->prepare($sql);
			$params = [
				'adminEmail' => $adminEmail,
				'adminHash' => $adminHash,
			];
			$stmnt->execute($params);
			return $this->conn->lastInsertId();
		} Catch (PDOException $e) {
			$e = new ErrorView([
				'message' => $e->getMessage(),
				'code' => $e->getCode(),
			]);
		}

	}

//////////////////////////////////////////////////////////////////////////////////////

	function data_adminAdd($name, $role, $phone, $image, $email, $hash) {
		$sql = "INSERT INTO administrators (adminName,adminRole , adminPhone ,adminImage ,  adminEmail ,adminHash)
   VALUES (:adminName,:adminRole , :adminPhone ,:adminImage ,  :adminEmail ,:adminHash)";
		try {
			$stmt = $this->conn->prepare($sql);
			$params = [
				'adminName' => $name,
				'adminRole' => $role,
				'adminPhone' => $phone,
				'adminImage' => $image,
				'adminEmail' => $email,
				'adminHash' => $hash,
			];
			$stmt->execute($params);
		} Catch (PDOException $e) {
			$e = new ErrorView([
				'message' => $e->getMessage(),
				'code' => $e->getCode(),
			]);
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////
	function data_editAdmin($id, $name, $role, $phone, $image, $email, $hash) {

		try {
			$sql = "UPDATE administrators SET
              adminName = :adminName,
              adminRole = :adminRole,
              adminPhone = :adminPhone,
              adminImage = :adminImage,
              adminEmail = :adminEmail,
              adminHash = :adminHash
              WHERE id = :id";
			$stmt = $this->conn->prepare($sql);

			$stmt->bindValue(':adminName', $name, PDO::PARAM_STR);
			$stmt->bindValue(':adminRole', $role, PDO::PARAM_STR);
			$stmt->bindValue(':adminPhone', $phone, PDO::PARAM_STR);
			$stmt->bindValue(':adminImage', $image, PDO::PARAM_STR);
			$stmt->bindValue(':adminEmail', $email, PDO::PARAM_STR);
			$stmt->bindValue(':adminHash', $hash, PDO::PARAM_STR);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			echo 'no course in file';
		}

	}

	////////////////////////////////////////////////////////////////////////////////////////////////
	function data_deleteAdmin($id) {
		try {
			$sql = "DELETE FROM administrators WHERE id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
}
