<?php

DEFINE('DB_USER', 'u548011243_epej');
DEFINE('DB_PASSWORD', 'Tampico2014');
DEFINE('DB_HOST', 'mysql.hostinger.mx');
DEFINE('DB_NAME', 'u548011243_epej');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
