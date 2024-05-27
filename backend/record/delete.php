<?php

session_start();
require_once '../../db/connect.php';

$record_id = $_POST['record_id'];

mysqli_query($connect, "DELETE FROM `records` WHERE `id` = '$record_id'");

header('location: /index.php');
