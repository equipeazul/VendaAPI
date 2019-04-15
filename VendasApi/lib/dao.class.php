<?php
class TDao {
    
    private $conn;
    
    public function __construct()
    {
        
    }
    
    public function openConnection()
    {
        $db_type = 'mysql';
        $db_host = 'localhost';
        $db_name = 'projeto';
        $db_user = 'root';
        $db_password = "";
        
        $this->conn = new PDO($db_type . ":host=" . $db_host  . ";dbname=" . $db_name, $db_user, $db_password);
    }
    
    public function closeConnection()
    {
        $this->conn = NULL;
    }
    
    public function beginTransaction()
    {
        if ($this->conn)
        {
            $this->conn->beginTransaction();
        }
    }
    
    public function commit()
    {
        if ($this->conn)
        {
            $this->conn->commit();
        }
    }
    
    public function rollback()
    {
        if ($this->conn)
        {
            $this->conn->rollBack();
        }
    }
    
    public function query($command)
    {
        if ($this->conn)
        {
            return $this->conn->query($command);
        }
    }
    
    public function exec($command)
    {
        if ($this->conn)
        {
            return $this->conn->exec($command);
        }
    }
    
    public function commandInsert($table, $fields, $values) {
        try {
            $this->openConnection();
            $this->beginTransaction();
            $query = " INSERT INTO $table ( $fields ) VALUES ( $values ) ";
            $this->exec($query);
            $this->commit();
            $this->closeConnection();
        } catch (Exception $e) {
            $this->rollback();
            $this->closeConnection();
            throw new DataException("Erro ao incluir.");
        }
    }
    
    public function commandUpdate($table, $setValues, $whereId) {
        try {
            $this->openConnection();
            $this->beginTransaction();
            $query = " UPDATE $table SET $setValues WHERE $whereId ";
            $this->exec($query);
            
            $this->commit();
            $this->closeConnection();
        } catch (Exception $e) {
            $this->rollback();
            $this->closeConnection();
            throw new DataException("Erro ao alterar.");
        }
    }
    
    public function commandDelete($table, $whereId) {
        try {
            $this->openConnection();
            $this->beginTransaction();
            $query = " DELETE FROM $table WHERE $whereId ";
            $this->exec($query);
            
            $this->commit();
            $this->closeConnection();
        } catch (Exception $e) {
            $this->rollback();
            $this->closeConnection();
            throw new DataException("Erro ao excluir.");
        }
    }
    
    public function commandGet($table, $fields, $whereId) {
        try {
            $this->openConnection();
            $query =  " SELECT $fields FROM $table WHERE $whereId ";
            $result = $this->query($query);
            
            if ($result->rowCount() == 0)
            {
                return NULL;
            }
            
            $this->closeConnection();
            
            return $result->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            $this->closeConnection();
            throw new DataException("Erro ao consultar.");
        }
    }
    
    
}