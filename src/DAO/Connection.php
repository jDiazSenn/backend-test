<?php

namespace App\DAO;


class Connection
{
    protected $conn;
    private static $instance;

    /**
     * Connection constructor.
     */
    private function __construct()
    {
        // Here is where we would create the connection object.
    }

    /**
     * Get Instance will be used to retrieve an open connection
     * instead of creating a connection every time we call this class.
     * If a connection exists then we can use it instead of creating multiple connections.
     *
     * @return Connection
     */
    public static function getInstance()
    {
        if(static::$instance === NULL)
            static::$instance = new static();

        return static::$instance;
    }

    public function getConn()
    {
        return $this->conn;
    }
}