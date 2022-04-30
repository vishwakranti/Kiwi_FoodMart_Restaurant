<?php
//Start Session
session_start();
//Create constants to store non reapeating values
define('SiteURL', 'http://localhost:8080/kiwi_foodmart/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kiwi_foodmart');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting Database

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
