<?php

class DB
{
	private $pdo, $env;

	private static $instance = null;

	private function __construct()
	{
		$env = parse_ini_file('../.env.test');
		$dsn = "mysql:dbname=phptest;host=127.0.0.1;port={$env['DB_PORT']};charset=utf8";
		$user = 'root';
		$password = 'mypass';

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}