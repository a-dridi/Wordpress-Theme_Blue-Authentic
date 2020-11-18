<?php
/**
 * Database handler. Select, insert, update and delete data from db.
 */

defined( 'ABSPATH' ) || exit;

require_once 'dbconnection.php';


/*
 Database test objects statements
*/
/*
function get_property_by_flat_type( $flat_type ) {

	$sql  = 'SELECT * FROM property WHERE property_type = ?';
	$stmt = mysqli_stmt_init( $database_con );
	if ( ! mysqli_stmt_prepare( $stmt, $sql ) ) {
		echo 'Database query failed. Error: get_property_by_flat_type';
	} else {
		mysqli_stmt_bind_param( $stmt, 's', $flat_type );
		return mysqli_stmt_execute( $stmt );
	}
}
*/

/**
 * Get all properties of certain flat type. Procedual (procedual programming) solution.
 *
 * @return MySQLI Result Array which contains all queried rows.
 */
function get_property_by_flat_type( $flat_type ) {

	return $GLOBALS['wpdb']->get_results(
		$GLOBALS['wpdb']->prepare( 'SELECT * FROM {TABLE_PREFIX}property WHERE property_type = %s', $flat_type )
	);
}

function get_row_count_by_flat_type( $flat_type ) {

	return $GLOBALS['wpdb']->get_var( $GLOBALS['wpdb']->prepare( 'SELECT COUNT(*) FROM {TABLE_PREFIX}property WHERE property_type = %s', $flat_type ) );
}



