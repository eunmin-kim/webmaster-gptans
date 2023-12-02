<?php


namespace Database;
require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

use Dotenv\Dotenv;
use mysqli;
use Exception;

class DB
{
    public $connection;
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $port;

    public function __construct()
    {
        $this->loadEnvironment();
        $this->initializeConnection();
    }

    private function loadEnvironment()
    {
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->safeLoad();
        $this->host = $_ENV['MYSQL_HOST'];
        $this->username = $_ENV['MYSQL_USERNAME'];
        $this->password = $_ENV['MYSQL_PASSWORD'];
        $this->dbName = $_ENV['MYSQL_DB_NAME'];
        $this->port = $_ENV['MYSQL_PORT'] ?? 3306; // 기본 포트 설정
    }

    private function initializeConnection()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbName, $this->port);

        if ($this->connection->connect_error) {
            throw new Exception("Database Connection Failed: " . $this->connection->connect_error);
        }

        $this->setCharset("utf8");
    }

    private function setCharset($charset)
    {
        $this->connection->set_charset($charset);
    }

    public function query($sql)
    {
        $this->setCharset("utf8");
        return $this->connection->query($sql);
    }

    // 기타 필요한 메소드 추가
}


?>