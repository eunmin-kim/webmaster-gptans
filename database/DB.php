<?php


namespace Database;
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
use Dotenv\Dotenv;

class DB {

    private $mysqlHost;
    private $user;
    private $password;
    private $port;
    private $dbName;
    public $connection;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->safeLoad();
        $this->mysqlHost = $_ENV['MYSQL_HOST'];
        $this->user = $_ENV['MYSQL_USERNAME'];
        $this->password = $_ENV['MYSQL_PASSWORD'];
        $this->port = $_ENV['MYSQL_PORT'];
        $this->dbName = $_ENV['MYSQL_DB_NAME'];
        $connection = mysqli_connect($this->mysqlHost,$this->user,$this->password,$this->dbName);

        if ($connection == false)
        {
            throw new Exception("Database Connection Failed");
        }
        else
        {
            $this->connection = $connection;
            mysqli_query($this->connection, "set session character_set_connection=utf8;");
            mysqli_query($this->connection, "set session character_set_results=utf8;");
            mysqli_query($this->connection, "set session character_set_client=utf8;");
        }
    }

    public function query(string $sql)
    {
        mysqli_query($this->connection, "set session character_set_connection=utf8;");
        mysqli_query($this->connection, "set session character_set_results=utf8;");
        mysqli_query($this->connection, "set session character_set_client=utf8;");
        mysqli_query($this->connection,$sql);
        return;
    }

//    public function queryResult(string $sql)
//    {
//        $result = mysqli_query($this->connection,$sql);
//        return
//    }
}
?>