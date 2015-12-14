<?php
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'dbtuts');
define (DB_USER, "iphoneappuser");
define (DB_PASSWORD, "Fr040791$");
define (DB_DATABASE, "shopn_database");
define (DB_HOST, "localhost");



class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASSWORD;
	private $_database = DB_DATABASE;

	public static function getInstance() {
		if(!self::$_instance) { 
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
		 

		// $this->_connection = new PDO("mysql:host=localhost;dbname=shopn_database", 'iphoneappuser', 'Fr040791$');
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	public function testinsert()
	{
		echo "runnning query";

	$mysqli = $this->_connection; 



	//$res = mysql_query("insert into Email_Form(name, email, useroption, message) values('frantz','f@example.com','Feedback','the mesage')");
	$res = ("insert into Email_Form(name, email, useroption, message) values('frantz','f@example.com','Feedback','the mesage')");
	$result = $mysqli->query($res);
	echo $result;
	return $result;
	}
	 
	private function __clone() {

	 }
	// Get mysqli connection
	public function getCurrentConnection() {
		return $this->_connection;
	}
}
?>