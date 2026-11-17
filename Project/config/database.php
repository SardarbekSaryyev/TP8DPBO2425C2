<?php
class Database
{
    private static ?mysqli $conn = null;

    public static function connect(): mysqli
    {
        if (self::$conn === null) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            self::$conn = new mysqli('localhost', 'root', 'root', 'tp_mvc25', 8889);
            self::$conn->set_charset('utf8mb4');
        }
        return self::$conn;
    }
}
