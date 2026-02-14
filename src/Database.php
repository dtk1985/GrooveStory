<?php

class Database
{
    private static ?PDO $connection = null;
    
    private static string $host;
    private static string $dbname;
    private static string $username;
    private static string $password;

    public static function configure(array $config): void
    {
        self::$host = $config['host'] ?? 'db';
        self::$dbname = $config['dbname'] ?? 'groovestory';
        self::$username = $config['username'] ?? 'groovestory';
        self::$password = $config['password'] ?? '';
    }

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=utf8mb4",
                self::$host,
                self::$dbname
            );

            self::$connection = new PDO(
                $dsn,
                self::$username,
                self::$password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }

        return self::$connection;
    }

    public static function run(string $sql, array $params = []): PDOStatement
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function lastInsertId(): string
    {
        return self::getConnection()->lastInsertId();
    }
}
