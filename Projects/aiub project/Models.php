<?php

class Models{
    public $server;
    public $user;
    public $pass;
    public $db;
    private $conn;
    private $result;
    function Models($server = "localhost:3306" , $user = "root" , $pass ="" , $db = "is_that_crime")
    {
        $this->server = $server;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }
    private function openConnection()
    {
        $this->conn = new mysqli($this->server , $this->user , $this->pass , $this->db);
        if($this->conn->connect_error)
        {
            $this->errorMessage();
            return false;
        }
        else
            return true;
    }
    private function closeConnection()
    {
        $this->conn->close();
    }
    function errorMessage()
    {
        echo "<h5>Could Not Establish Connection With The Database</h5>";
    }
    function executeQuery($query)
    {
        if($this->openConnection())
        {
            $this->result = $this->conn->query($query);
            if($r = $this->result->fetch_assoc())
            {
                $this->closeConnection();
                return $this->result;
            }
            else
            {
                $this->closeConnection();
                return false;
            }
        }
        else
        {
            $this->errorMessage();
            return false;
        }

    }
    function executeDMLQuery($query)
    {
        if($this->openConnection())
        {
            if($this->conn->query($query))
            {
                $this->closeConnection();
            }
            else
            {
                $this->closeConnection();
                $this->errorMessage();
            }

        }
        else
        {
            $this->errorMessage();
        }
    }

}



?>
