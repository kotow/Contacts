<?php
namespace Lib;

class Database
{
    private static $db = null;
	
	private function __construct()
    {
		// Read the config/db.php db settings
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'contacts';
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
