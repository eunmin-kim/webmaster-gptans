<?php
require "../vendor/autoload.php";
class Database {

    private $mysqlHost;
    private $user;
    private $password;
    private $port;
    private $dbName;
    private $connection;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable("../");
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
            echo "DB 커넥트 성공";
            $this->connection = $connection;
        }
    }

    public function query(string $sql)
    {
        if (mysqli_query($this->connection,$sql) == false)
        {
            throw new Exception("Database Query Failed" . mysqli_error($this->connection));
        }
    }
}
?>