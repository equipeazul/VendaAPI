<?php

class TUsuarioRule
{
	
	private function validate(TUsuarioEntity $entity)
	{
		
	    if ($entity->nomeusuario == "")
	    {
	        throw new DataException("Nome do usuário inválido !!!");
	    }
	    
	    if ($entity->email == "")
	    {
	        throw new DataException("Email inválido !!!");
	    }
	    
	    if ($entity->bloqueado == "")
	    {
	        throw new DataException("Bloqueado inválido !!!");
	    }
	    
	}
	
	public function insert(TUsuarioEntity $entity)
	{
	    $json = new TJsonResult();
	    try {
	        $this->validate($entity);
	        $dao = new TUsuarioDao();
	        $dao->insert($entity);

	        return $json->ok('Usuário foi incluído com sucesso.');
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
	
	public function update(TUsuarioEntity $entity)
	{
	    $json = new TJsonResult();
	    try {
	        
	        if ($entity == NULL || $entity->idusuario == NULL) {
	            return $json->erro('Usuário inválido.');
	        }
	        
	        $this->validate($entity);

	        $dao = new TUsuarioDao();
	        if ($dao->get($entity->idusuario)) {
	            $dao->update($entity);
	        } else {
	            return $json->erro('Usuário não cadastrado.');
	        }
	        
	        
	        return $json->ok('Usuário foi alterado com sucesso.');
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
	            return $json->erro('Usuário não cadastrado.');
	        }
	        
	        return $json->ok('Usuário foi excluído com sucesso.');
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
	            return $json->erro('Usuário não cadastrado.');
	        }
	    } catch (Exception $e) {
	        return $json->erro($e->getMessage());
	    }
	}
}

?>