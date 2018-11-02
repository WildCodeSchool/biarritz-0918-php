<?php
declare (strict_types = 1);
namespace App;

class DB
{
    private $instance;
    public function __construct()
    {
        if (!isset($this->instance)) {
            $this->instance = new \PDO(
                'sqlite:var/test.db');
            $this->createTables();
        }
    }

    public function getInstance()
    {
        return isset($this->instance) ? $this->instance : (new DB())->getInstance();
    }

    /**
     * create tables
     */
    private function createTables()
    {
        $commands = [
            'CREATE TABLE IF NOT EXISTS items (
                        id INTEGER PRIMARY KEY,
                        name TEXT NOT NULL,
                        value INTEGER NOT NULL,
                        volume INTEGER NOT NULL
                      )',
            'CREATE TABLE IF NOT EXISTS bags (
                        id INTEGER PRIMARY KEY,
                        name TEXT NOT NULL,
                        volume INTEGER NOT NULL
            )',
            'CREATE TABLE IF NOT EXISTS problems (
                        id INTEGER PRIMARY KEY,
                        name TEXT NOT NULL,
                        bagId INTEGER NOT NULL
                            FOREIGN KEY (bagId) REFERENCES bags(id)
                            ON DELETE SET NULL
            )', ];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->instance->exec($command);
        }
    }

    public function getTableList()
    {

        $stmt = $this->instance->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }

    public function select(string $query, string $fullQualifiedNamespace)
    {
        $stmt = $this->instance->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $fullQualifiedNamespace);
    }

    public function insert($query)
    {
        $stmt = $this->instance->prepare($query);
        $stmt->execute();
        return $this->instance->lastInsertId();
    }

}
