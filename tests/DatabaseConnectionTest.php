<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testMysqlConnectionIsWorking(): void
    {
        $host = getenv('MYSQL_HOST') ?: 'mysql';
        $database = getenv('MYSQL_DATABASE') ?: 'app';
        $user = getenv('MYSQL_USER') ?: 'root';
        $password = getenv('MYSQL_ROOT_PASSWORD') ?: 'root';

        $pdo = new \PDO(
            "mysql:host={$host};dbname={$database}",
            $user,
            $password
        );

        $result = $pdo->query('SELECT 1')->fetchColumn();

        $this->assertEquals(1, $result);
    }
}
