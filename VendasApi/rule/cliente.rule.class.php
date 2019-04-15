<?php

class TClienteRule
{
    
    private function validate(TClienteEntity $entity)
    {
        
        if ($entity->nome == "")
        {
            throw new DataException("Nome do cliente inv�lido !!!");
        }
        
        if ($entity->cpf == "")
        {
            throw new DataException("CPF inv�lido !!!");
        }
        
    }
    
    public function insert(TClienteEntity $entity)
    {
        $json = new TJsonResult();
        try {
            $this->validate($entity);
            $dao = new TClienteDao();
            $dao->insert($entity);
            
            return $json->ok('Cliente foi inclu�do com sucesso.');
        } catch (Exception $e) {
            return $json->erro($e->getMessage());
        }
    }
    
    public function update(TClienteEntity $entity)
    {
        $json = new TJsonResult();
        try {
            
            if ($entity == NULL || $entity->idcliente == NULL) {
                return $json->erro('Cliente inv�lido.');
            }
            
            
            $this->validate($entity);
            
            $dao = new TClienteDao();
            if ($dao->get($entity->idcliente)) {
                $dao->update($entity);
            } else {
                return $json->erro('Cliente n�o cadastrado.');
            }
            
            
            return $json->ok('Cliente foi alterado com sucesso.');
        } catch (Exception $e) {
            return $json->erro($e->getMessage());
        }
    }
    
    public function delete($id)
    {
        $json = new TJsonResult();
        try {
            $dao = new TClienteDao();
            if ($dao->get($id)) {
                $dao->delete($id);
            } else {
                return $json->erro('Cliente n�o cadastrado.');
            }
            
            return $json->ok('Cliente foi exclu�do com sucesso.');
        } catch (Exception $e) {
            return $json->erro($e->getMessage());
        }
    }
    
    public function get($id)
    {
        $json = new TJsonResult();
        try {
            $dao = new TClienteDao();
            $entity = $dao->get($id);
            
            if ($entity) {
                return $json->data($entity);
            } else {
                return $json->erro('Cliente n�o cadastrado.');
            }
        } catch (Exception $e) {
            return $json->erro($e->getMessage());
        }
    }
}

?>