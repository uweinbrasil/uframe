<?php
require_once '../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use database\DB_Test;
use database\MySqlConnection;

// Create the logger
$logger = new Logger('database_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__ . '/database.log', Logger::DEBUG));

// You can now use your logger
$logger->addInfo('2 My logger is now ready');

try {
    $g = new DB_Test();
    $g->out();

    // * provides mysql connection 
    // *
    // * $host        = "localhost";
    // * $dbname      = "plamol_db2";
    // * $dsn         = "mysql:host=" . $host . ";dbname=" . $dbname;
    // * $usernameDb0 = "root"; 
    // * $passwdDb    = "";

    $c = (new MySqlConnection())->getInstance("localhost","plamol_db2","root","");

    $x = 1;
} catch (Eception $ex) {
    $logger->addInfo($ex->getMessage());
}
