<?php
declare(strict_types=1);
namespace Iamgerwin\PhpTest\Config;

class Database
{
    private $pdo, $env;

	private static $instance = null;

    /**
	 * Constructor for the Database class.
	 *
	 * This constructor initializes the PDO connection to the MySQL database.
	 * It reads the database credentials from the .env.test file and establishes
	 * a connection using the provided credentials.
	 *
	 * @throws \PDOException if the connection to the database fails.
	 */
	private function __construct()
	{
		$env = parse_ini_file('../.env.test');
		$dsn = "mysql:dbname={$env['DB_NAME']};host={$env['DB_HOST']};port={$env['DB_PORT']};charset=utf8";
		$user = $env['DB_USER'];
		$password = $env['DB_PASS'];

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	/**
	 * Returns an instance of the Database class.
	 *
	 * This method returns a singleton instance of the Database class. If the instance
	 * does not exist, it creates a new instance and assigns it to the static property
	 * $instance. The method uses the __CLASS__ constant to determine the current class
	 * name and creates a new instance of that class using the new keyword.
	 *
	 * @return Database The singleton instance of the Database class.
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}


	public function select($sql): ?PDOStatement
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * Execute SQL command.
	 *
	 * @param string $sql
	 * @return PDOStatement | null
	 */
	public function exec($sql): ?PDOStatement
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * Returns the last inserted ID of the most recently executed SQL statement.
	 *
	 * @return int
	 */
	public function lastInsertId(): int
	{
		return $this->pdo->lastInsertId();
	}
}