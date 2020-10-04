<?php
	 class Model{

	 	protected $connect;

	 	public function __construct(){
	 		global $config;
	 		$this->connect = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	 	}
	 }
?>