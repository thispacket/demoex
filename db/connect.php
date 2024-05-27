<?php
	$connect = mysqli_connect("localhost", "root", "", "demo");

	if (!$connect) die('База данных не подключена');