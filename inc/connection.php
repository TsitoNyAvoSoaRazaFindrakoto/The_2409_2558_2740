<?php
function connectbd()
{
    static $connect = null;
    $user = 'root';
    $pass = '';
    $dsn = 'mysql:host=172.10.0.113;port=3306;dbname=db_p16_ETU002740';
    // $dsn = 'mysql:host=localhost;port=3306;dbname=the';

    if ($connect === null) {
        try {
            $connect = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    return $connect;
}
