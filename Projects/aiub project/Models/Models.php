<?php

class Models{
    public $server;
    public $user;
    public $pass;
    public $db;
    protected $conn;
    protected $result;
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
            $this->errorMessage($this->conn->connect_error);
            return false;
        }
        else
            return true;
    }
    private function closeConnection()
    {
        $this->conn->close();
    }
    function errorMessage($message = "Could Not Establish Connection With The Database")
    {
        //echo "<h5>$message</h5>";
    }
    function executeQuery($query)
    {
        if($this->openConnection())
        {
            if($this->result = $this->conn->query($query))
            {
                if($this->result->num_rows > 0)
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
                $this->errorMessage($this->conn->error);
                return false;
            }

        }
        else
        {
            $this->errorMessage($this->conn->error);
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
                return true;
            }
            else
            {
                $this->closeConnection();
                $this->errorMessage($this->conn->error);
                return false;
            }

        }
        else
        {
            $this->errorMessage($this->conn->error);
            return false;
        }
    }

}



?>
