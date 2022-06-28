<?php
//Start Session
session_start();
//Create constants to store non reapeating values
define('SiteURL', 'http://localhost:81/kiwi_foodmart_restaurant/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kiwi_foodmart');

// set SRV_ROOT for inserting images/photos
define('SRV_ROOT', 'c:/xampp/htdocs/Kiwi_FoodMart_Restaurant/');

// these are the directories where we will store all
// category and product images
define('CATEGORY_IMAGE_DIR', 'images/category/');
define('PRODUCT_IMAGE_DIR',  'images/product/');

//database connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting Database

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
