<?php

	session_start();

	require "../../db/connect.php";

	$login = $_POST['login'];
	$password = $_POST['password'];

	$check_user = mysqli_query($connect, "SELECT * FROM users WHERE `login`='$login' AND `password`='$password'");

	if (mysqli_num_rows($check_user) > 0) {
		$user = mysqli_fetch_assoc($check_user);

		$_SESSION['user'] = [
			'id' => $user['id'],
			'login' => $user['login'],
			'email' => $user['email'],
			'fullname' => $user['fullname'],
			'avatar' => $user['avatar']
		];
		$_SESSION['error'] = '';

		header('Location: /index.php');
	} else {
		$_SESSION['error'] = 'Неправильный логин или пароль!';
		header('Location: /pages/auth.php');
	}

