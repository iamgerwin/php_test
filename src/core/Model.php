<?php
declare(strict_types=1);
namespace Iamgerwin\PhpTest\Core;
use Iamgerwin\PhpTest\Config\Database;
abstract class Model
{
    public static $instance;
    public $db;

    public function __construct()
	{

		$this->db = Database::getInstance();
	}
}