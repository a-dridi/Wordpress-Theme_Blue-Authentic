<?php

// Access database thorugh WordPress db object
global $wpdb;
// prefix of tables that are used by these WordPress theme
define( 'TABLE_PREFIX' = 'ba_' );

/**
 * Set up database connection manual - optional
*/

/*
$db_server   = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name     = 'blueauthentic';

$database_con = mysqli_connect( $db_server, $db_username, $db_password, $db_name );

if ( ! $database_con ) {
	echo 'Database connection failed! Please check your database and database settings. - Error: ' . mysqli_connect_error() . ' - Error code: ' . mysqli_connect_errno();
	exit();
}
*/
