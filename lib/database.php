<?php
namespace Lib;

class Database
{
    private static $db = null;
	
	private function __construct()
    {
		// Read the config/db.php db settings
		$host = 'sql310.byethost5.com';
		$username = 'b5_16347153';
		$password = 'p3j070';
		$database = 'b5_16347153_contacts';
		$db = new \mysqli( $host, $username, $password, $database );
		self::$db = $db;
	}
	
	public static function get_instance()
    {
		static $instance = null;
		if( null === $instance ) {
			$instance = new static();
		}
		return $instance;
	}
	
	public static function get_db()
    {
		return self::$db;
	}
}
