<?php

	session_start();
	require '../../db/connect.php';

	$title = $_POST['title'];
	$content = $_POST['content'];
	$image = time() . $_FILES['image']['name'];
	$price = $_POST['price'];
	$user_id = $_SESSION['user']['id'];

	if (!move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/" . $image)) {
		header('location: ../../pages/create-records.php');
	} else {
		mysqli_query(
			$connect,
			"INSERT INTO `records` (`id`, `title`, `content`, `image`, `price`, `user_id`)
			VALUES 
			(NULL, '$title', '$content', '$image', '$price', '$user_id')"
		);

		header('location: ../../pages/create-records.php');
	}