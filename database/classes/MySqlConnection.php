<?php
/**
 * DB.php
 *
 * @package     database
 * @author      Uwe Kristmann <uwekristmann@gmx.de>
 * @version     0.1
 * @copyright   Copyright (c) Tecnoexpress Informatica Ltda. <tecnoexpress.com.br> 05/08/2018
 */

namespace database;

use \PDO;

/**
 * database access
 *
 * provides mysql connection
 *
 * example
 * $conn = (new MySqlConnection())->getInstance("localhost","plamol_db2","root","");
 *
 * @package     database
 */
class MySqlConnection
{
    /**
     * holds PDO database conection
     *
     * @var    $instance PDO-Object
     * @access private
     */
    private $instance;

    /**
     * constructor
     * @return  object
     */
    public function __construct()
    {       
        return $this;
    }

    /**
     * return database connection
     *
     * @access  public
     * @param   $host   string
     * @param   $dbname string
     * @param   $dbuser string
     * @param   $dbpass string
     * @return  object
     */
    public function getInstance($host, $dbname, $dbuser, $dbpass)
    {
        try { 
            $dsn = "mysql:host=".$host.";dbname=".$dbname;         
            $this->instance = new PDO($dsn, $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            var_dump($e);
        }   
        return $this->instance;   
    }
}