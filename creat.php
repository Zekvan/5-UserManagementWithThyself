<?php 
//connection database
require_once "init.php";

switch ($_POST["role"]) {
	case 'friend':
	if($_POST['name'] && $_POST['surname'] && $_POST['surname'] && $_POST['email'] && $_POST['phonenum'] && $_POST['note'] && isset($_POST['role'])){

			//equal posted datas to variables 
		$name     = $_POST['name'];
		$surname  = $_POST['surname'];
		$phoneNum = $_POST['phonenum'];
		$email    = $_POST['email'];
		$note     = $_POST['note'];
		$role     = $_POST['role'];
			//$photo    = ??????????????;
				// in addQuery variable, preparing this variables for database 
		$addQuery = $connection->prepare("INSERT INTO table1 (name, surname, phonenum, email, note, role) VALUES ( ?, ?, ?, ?, ?, ?)");
				//and add database
		$isAdded = $addQuery->execute(array($name, $surname, $phoneNum, $email, $note, $role));
		if($isAdded){
			if (isset($_FILES['photo'])) {
				if (isUploadAnImage($_FILES['photo'])) {
					$uploadPath="photos";
					$extension=pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					$newName=uniqid().'.'.$extension;
					$destinationOfPhoto = $uploadPath.'/'.$newName;
					move_uploaded_file($_FILES['photo']['tmp_name'], $destinationOfPhoto);

					$email    = $_POST['email'];

					$query = $connection->prepare("UPDATE table1 SET photo = ?  WHERE email = ? ");
					$isQuery = $query->execute(array($newName,$email));

					$image = new \Eventviva\ImageResize($destinationOfPhoto);
					$image
					->resizeToBestFit(125, 150)
					->save($uploadPath.'/thumbnails/'.$newName)

					->resizeToBestFit(375, 450)
					->save($uploadPath.'/popups/'.$newName)

					->resizeToBestFit(625, 750)
					->save($uploadPath.'/previews/'.$newName);


					require 'vendor/phpmailer/PHPMailerAutoload.php';

					customer = $connection->query("SELECT * FROM table1 WHERE email = $email")->fetch();

					$mail = new PHPMailer;


							$mail->isSMTP();                                     		// Set mailer to use SMTP
							$mail->Host       = 'cpanel04.reseller.radorehosting.com';  // Specify main and backup SMTP servers
							$mail->SMTPAuth   = true;                               	// Enable SMTP authentication
							$mail->Username   = 'zekvanarslan';                			// SMTP username
							$mail->Password   = 'xem6VlDBb2x@';                         // SMTP password
							$mail->SMTPSecure = 'ssl';                            		// Enable TLS encryption, `ssl` also accepted
							$mail->Port       = 465;                                    // TCP port to connect to
							
							$mail->setFrom('zekvanarslan@zekvanarslan.lyk2016php.com', 'Zekvan Arslan');
							$mail->addAddress($email);     								// Add a recipient   
							$mail->isHTML(true);                                  		// Set email format to HTML
							
							$mail->Subject    = '';
							$mail->Body       = '<h1>Activation</h1>
							<strong><h2>Welcome to My First Project</h2></strong>
							http://localhost/proje4/activation.php?code='.$customer["code"];
						}
					}
					$_SESSION['message'] = "Customer just added..";
					header("Location: index.php");
				}else{

					$_SESSION['message']="Did NOT add.";
					header("Location:index.php");
				}
			}
			else{

				$_SESSION['message']="Please,Do NOT leave blank form .";
				header("Location:index.php");
			}




			break;

			case 'relative':

			if($_POST['name'] && $_POST['surname'] && $_POST['surname'] && $_POST['email'] && $_POST['phonenum'] && $_POST['note'] && isset($_POST['role'])){

			//equal posted datas to variables 
				$name     = $_POST['name'];
				$surname  = $_POST['surname'];
				$phoneNum = $_POST['phonenum'];
				$email    = $_POST['email'];
				$note     = $_POST['note'];
				$role     = $_POST['role'];
			//$photo    = ??????????????;
				// in addQuery variable, preparing this variables for database 
				$addQuery = $connection->prepare("INSERT INTO table1 (name, surname, phonenum, email, note, role) VALUES ( ?, ?, ?, ?, ?, ?)");
				//and add database
				$isAdded = $addQuery->execute(array($name, $surname, $phoneNum, $email, $note, $role));
				if($isAdded){
					if (isset($_FILES['photo'])) {
						var_dump($_FILES['photo']);
						if (isUploadAnImage($_FILES['photo'])) {
							$uploadPath="photos";
							$extension=pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
							$newName=uniqid().'.'.$extension;
							$destinationOfPhoto = $uploadPath.'/'.$newName;
							move_uploaded_file($_FILES['photo']['tmp_name'], $destinationOfPhoto);

							$email    = $_POST['email'];

							$query = $connection->prepare("UPDATE table1 SET photo = ?  WHERE email = ? ");
							$isQuery = $query->execute(array($newName,$email));

							$image = new \Eventviva\ImageResize($destinationOfPhoto);
							$image
							->resizeToBestFit(125, 150)
							->save($uploadPath.'/thumbnails/'.$newName)

							->resizeToBestFit(375, 450)
							->save($uploadPath.'/popups/'.$newName)

							->resizeToBestFit(625, 750)
							->save($uploadPath.'/previews/'.$newName);

						}

					}
					$_SESSION['message'] = "Customer just added..";
					header("Location: index.php");
				}else{

					$_SESSION['message']="Did NOT add.";
					header("Location:index.php");
				}
			}
			else{

				$_SESSION['message']="Please,Do NOT leave blank form .";
				header("Location:index.php");
			}




			break;
			case 'workmate':

			if($_POST['name'] && $_POST['surname'] && $_POST['surname'] && $_POST['email'] && $_POST['phonenum'] && $_POST['note'] && isset($_POST['role'])  && isset($_FILES['photo'])){

				if (isUploadAnImage($_FILES['photo'])) {
					$uploadPath="photos";
					$extension=pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
					$newName=uniqid().'.'.$extension;
					$destinationOfPhoto = $uploadPath.'/'.$newName;
					move_uploaded_file($_FILES['photo']['tmp_name'], $destinationOfPhoto);
				}

			//equal posted datas to variables 
				$name     = $_POST['name'];
				$surname  = $_POST['surname'];
				$phoneNum = $_POST['phonenum'];
				$email    = $_POST['email'];
				$note     = $_POST['note'];
				$role     = $_POST['role'];
			//$photo    = ??????????????;
				// in addQuery variable, preparing this variables for database 
				$addQuery = $connection->prepare("INSERT INTO table1 (name, surname, phonenum, email, note, role, photo) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
				//and add database
				$isAdded = $addQuery->execute(array($name, $surname, $phoneNum, $email, $note, $role, $newName));
				if($isAdded){
					$image = new \Eventviva\ImageResize($destinationOfPhoto);
					$image
					->resizeToBestFit(125, 150)
					->save($uploadPath.'/thumbnails/'.$newName)

					->resizeToBestFit(375, 450)
					->save($uploadPath.'/popups/'.$newName)

					->resizeToBestFit(625, 750)
					->save($uploadPath.'/previews/'.$newName);

					$_SESSION['message'] = "Customer just added..";
					header("Location: index.php");
				}else{

					$_SESSION['message']="Did NOT add.";
					header("Location:index.php");
				}
			}
			else{

				$_SESSION['message']="Please,Do NOT leave blank form and Do NOT forget to add photo.";
				header("Location:index.php");
			}
			break;
		}