<?php

class Admin {

	public function adminMain($statusCode = NULL) {
		$logged = session::logged();
		if ($statusCode) {
			$data['error'] = $this->strError($statusCode);
		}

		if ($logged && $logged['role'] == 'manager') {
			$adminView = new AdminView();
			$adminModel = new AdminModel();
			$data = [
				'admins' => $adminModel->data_getAllAdminsNotOwner(),
				'logged' => session::logged(),
				'totalAdmins' => $adminModel->data_countAdmins(),
				'adminList'=> $adminModel->data_getAllAdmins()
			];

			$adminView->setComponent("admin_main_ctr.php", $data);

			$adminView->dump();
		} else if
		($logged && $logged['role'] == 'owner') {
			$adminView = new AdminView();
			$adminModel = new AdminModel();
			$data = [
				'admins' => $adminModel->data_countAdminsNotOwner(),
				'logged' => session::logged(),
				'totalAdmins' => $adminModel->data_countAdmins(),
				'adminList'=> $adminModel->data_getAllAdmins()
			];

			$adminView->setComponent("admin_main_ctr.php", $data);

			$adminView->dump();
		} else {
			$notLoggedView = new notloggedview();
			$notLoggedView->addJs('login.js');
			$notLoggedView->setComponent("login_form.php", $data = NULL);
			$notLoggedView->dump();
		}

	}
////////////////////////////////////////////////////////////////////////////////////////////////

	public function displayAdminForm() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		if (isset($route[2]) && $route[2] != '') {

			$adminModel = new AdminModel();
			$data = [
				'admins' => $adminModel->data_getAllAdmins(),
				'logged' => session::logged(),
				'admin' => $adminModel->data_getAdmin($route[2]),
				'adminList'=> $adminModel->data_getAllAdmins()

			];
			if (!$data['admin']) {
				header("location: /school");
			}
		} else {
			$adminModel = new AdminModel();
			$data = [
				'admins' => $adminModel->data_getAllAdmins(),
				'logged' => session::logged(),
				'admin' => $adminModel->data_getAdmin(),
				'adminList'=> $adminModel->data_getAllAdmins()

			];
			$data['admin']['id'] = '';
			$data['admin']['adminName'] = '';
			$data['admin']['adminRole'] = '';
			$data['admin']['adminPhone'] = '';
			$data['admin']['adminImage'] = '';
			$data['admin']['adminEmail'] = '';
			$data['admin']['adminHash'] = '';

		}
		$adminView = new AdminView();
		$adminView->setComponent("admin_add_form.php", $data);
		$adminView->addJs('admin.js');
		$adminView->dump();

	}

	//////////////////////////////////////////////////////////////////////////////////////////////

	public function doAddAdmin() {
		if (isset($_FILES, $_POST)) {
			try {
				$id = &$_POST['id'];
				$adminName = &$_POST['adminName'];
				$adminRole = &$_POST['adminRole'];
				$adminPhone = &$_POST['adminPhone'];
				$f = &$_FILES['fileToUpload'];
				$adminHidden = &$_POST['hiddenImage'];
				$adminEmail = &$_POST['adminEmail'];
				$adminHash = &$_POST['adminHash'];
				//////////////////////////////////////////////////

				$ext = pathinfo($f['name'], PATHINFO_EXTENSION);
				if (!in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
					throw new RuntimeException("Invalid file type {$ext}");
				}
				$filename = 'admin_' . time() . '.' . $ext;
				rename($f['tmp_name'], UPLOAD_DIR . $filename);

				if ($id == '' && !empty($adminName)
					&& !empty($adminRole)
					&& !empty($adminPhone)
					&& !empty($f)
					&& !empty($adminEmail)
					&& !empty($adminHash)
				) {

					$adminModel = new AdminModel();
					$adminModel->getAdminByName($adminEmail);

					$ph = new PasswordHash();
					$adminHash = $ph->getHash($adminHash);

					// add to db
					$adminModel->data_adminAdd($adminName, $adminRole, $adminPhone, $filename, $adminEmail, $adminHash);
				} else {
					// update db
					if (empty($f)) {
						$adminModel = new AdminModel();
						$adminModel->data_editAdmin($id, $adminName, $adminRole, $adminPhone, $adminHidden, $adminEmail, $adminHash);
					}
					else{
						$adminModel = new AdminModel();
						$adminModel->data_editAdmin($id, $adminName, $adminRole, $adminPhone, $filename, $adminEmail, $adminHash);
	
					}

				}

				header("location: /school/administration");
			} catch (RuntimeException $e) {
				$e->getMessage();
			}

		}

	}

	//////////////////////////////////////////////////////////////////////////////////////////

	function doLogin() {
		$notice = '';
		if (!session::logged()) {
			if (count($_POST) == 0 || empty($_POST['adminEmail']) || empty($_POST['adminPassword'])) {
				$notice = '/1';
			} else {
				$adminModel = new AdminModel();
				$u = $adminModel->getAdminByName($_POST['adminEmail']);
				if (empty($u)) {
					$notice = '/2';
				} else if (!password_verify($_POST['adminPassword'], $u['adminHash'])) {
					$notice = '/3';
				} else {
					session::setLogged([
						'id' =>    $u['id'],
						'name' =>  $u['adminName'],
						'role' =>  $u['adminRole'],
						'phone' => $u['adminPhone'],
						'image' => $u['adminImage'],
						'email' => $u['adminEmail']
						
					]);
				}
			}
		}
		header("location: /school{$notice}");
	}

	/////////////////////////////////////////////////////////////////////////////////////////////

	function logout() {
		session::logout();
		header("location: /school");
	}

	/////////////////////////////////////////////////////////////////////////////////////////////

	public function showAdmin() {
		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);
		$adminModel = new AdminModel();
		if (isset($route[2]) && $route[2] != '') {
			$data = [
				'admins' => $adminModel->data_getAllAdmins(),
				'logged' => session::logged(),
				'admin' => $adminModel->data_getAdmin($route[2]),
				'adminList'=> $adminModel->data_getAllAdmins()
			];
			$adminView = new AdminView();
			$adminView->addJs('admin.js');
			$adminView->setComponent("admin_show.php", $data);
			$adminView->dump();
		} else {
			$adminModel = new adminModel();
			$data = [
				'admins' => $adminModel->data_getAllAdmins(),
				'logged' => session::logged(),
				'admin' => $adminModel->data_getAdmin($route[2]),
				'adminList'=> $adminModel->data_getAllAdmins()
			];
			$adminView = new AdminView();
			$adminView->addJs('admin.js');
			$adminView->setComponent("admin_show.php", $data);
			$adminView->dump();
		}

	}
//////////////////////////////////////////////////////////////////////////////////////////////

	public function deleteAdmin() {

		$route = empty($_GET['route']) ? [] : explode('/', $_GET['route']);

		if (empty($route[2])) {
			header("location: /school/administration");
		} else {
			$adminModel = new adminModel();
			$adminModel->data_deleteAdmin($route[2]);
			header("location: /school/administration");
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////

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