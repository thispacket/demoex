<?php

	session_start();

	require '../../db/connect.php';

	$fullname = $_POST['fullname'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	$avatar = $_FILES['avatar']['name'];

	if ($password != $password_confirm) {
		$_SESSION['error'] = "Пароли не совпадают!";

		header('location: ../../pages/registration.php');
	} else {
		$path = time() . $_FILES['avatar']['name'];

		if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../uploads/avatars/' . $path)) {
			$_SESSION['error'] = 'Не удалось загрузить изображение!';
			header('location: ../../pages/registration.php');
		} else {
			mysqli_query(
				$connect,
				"INSERT INTO `users`
    			(`id`, `fullname`, `login`, `email`, `avatar`, `password`)
					VALUES (NULL, '$fullname', '$login', '$email', '$path', '$password')"
			);
			$_SESSION['error'] = '';

			header('location: ../../pages/auth.php');
		}
	}