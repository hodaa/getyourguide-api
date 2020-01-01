<?php

namespace GetYourGuide\Drivers;

include 'DriverInterface.php';
class DB implements DriverInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config['DB'];
    }

    public function connect()
    {
        $servername = $this->config['host'];
        $db = $this->config['db'];
        $username = $this->config['username'];
        $password = $this->config['password'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }

    public function getResource()
    {
        // get Your data from table here
    }
}
