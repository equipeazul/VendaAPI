<?php

class TUsuarioRule
{
	
	private function validate(TUsuarioEntity $entity)
	{
		
	    if ($entity->nomeusuario == "")
	    {
	        throw new DataException("Nome do usu�rio inv�lido !!!");
	    }
	    
	    if ($entity->email == "")
	    {
	        throw new DataException("Email inv�lido !!!");
	    }
	    
	    if ($entity->bloqueado == "")
	    {
	        throw new DataException("Bloqueado inv�lido !!!");
	    }
	    
	}
	
	public function insert(TUsuarioEntity $entity)
	{
	    $json = new TJsonResult();
	    try {
	        $this->validate($entity);
	        $dao = new TUsuarioDao();
	        $dao->insert($entity);

	        return $json->ok('Usu�rio foi inclu�do com sucesso.');
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
	
	public function update(TUsuarioEntity $entity)
	{
	    $json = new TJsonResult();
	    try {
	        
	        if ($entity == NULL || $entity->idusuario == NULL) {
	            return $json->erro('Usu�rio inv�lido.');
	        }
	        
	        $this->validate($entity);

	        $dao = new TUsuarioDao();
	        if ($dao->get($entity->idusuario)) {
	            $dao->update($entity);
	        } else {
	            return $json->erro('Usu�rio n�o cadastrado.');
	        }
	        
	        
	        return $json->ok('Usu�rio foi alterado com sucesso.');
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
	
	public function delete($id)
	{
	    $json = new TJsonResult();
	    try {
	        $dao = new TUsuarioDao();
	        if ($dao->get($id)) {
	            $dao->delete($id);
	        } else {
	            return $json->erro('Usu�rio n�o cadastrado.');
	        }
	        
	        return $json->ok('Usu�rio foi exclu�do com sucesso.');
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
	
	public function get($id)
	{
	    $json = new TJsonResult();
	    try {
	        $dao = new TUsuarioDao();
	        $entity = $dao->get($id);
	        
	        if ($entity) {
	            return $json->data($entity);
	        } else {
	            return $json->erro('Usu�rio n�o cadastrado.');
	        }
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
}

?>