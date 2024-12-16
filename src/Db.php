<?php
namespace  Bebos\DbBulider ;
use PDO;

abstract class Db
{

    protected $query;
    protected $connection;
    public $stmt;

    public function __construct($dsn, $username, $password)
    {
        $this->connection = new PDO($dsn, $username, $password);
    }

    abstract public function index(string $table, array|string $columns = "*");

    abstract public function store(string $table, array $data);

    abstract public function update();

    abstract public function destroy();

    final public function execute()
    {
        $this->stmt->execute();
        return $this;
    }

    final public function all()
    {
        $data = $this->stmt->fetchAll();
        print_r($data);
    }
}