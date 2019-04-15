<?php

class TUsuarioDao extends  TDao
{
    
    public function __construct()
    {
        
    }
    
    private function table() {
        return 'usuarios';
    }
    private function fields() {
        return 'idusuario, nomeusuario, email, bloqueado, senha';
    }
    
    private function values(TUsuarioEntity $entity) {
        return
        $entity->idusuario . ", " .
        TUtil::strAspas($entity->nomeusuario) . ", " .
        TUtil::strAspas($entity->email) . ", " .
        TUtil::strAspas($entity->bloqueado) . ", " .
        TUtil::strAspas($entity->senha);
        
        
    }
    
    private function setValues(TUsuarioEntity $entity) {
        return
        " nomeusuario = " .  TUtil::strAspas($entity->nomeusuario) . ", " .
        " email = " .  TUtil::strAspas($entity->email) . ", " .
        " bloqueado = " .  TUtil::strAspas($entity->bloqueado) . ", " .
        " senha = " .  TUtil::strAspas($entity->senha);
    }
    
    private function whereId($id) {
        return ' idusuario = ' . $id . '  ';
    }
    
    public function insert(TUsuarioEntity $entity)
    {
        // gerar senha
        $entity->senha = rand ( 1000 , 9999 );
        $entity->idusuario = 0;
        
        $this->commandInsert($this->table(), $this->fields(), $this->values($entity));
        
    }
    
    public function update(TUsuarioEntity $entity)
    {
        $this->commandUpdate($this->table(), $this->setValues($entity), $this->whereId($entity->idusuario));
    }
    
    public function delete($id)
    {
        $this->commandDelete($this->table(), $this->whereId($id));
    }
    
    public function get($id)
    {
        
        $row = $this->commandGet($this->table(), $this->fields(), $this->whereId($id));
        
        if ($row) {
            $entity = new TUsuarioEntity();
            $entity->idusuario = $row->idusuario;
            $entity->nomeusuario = $row->nomeusuario;
            $entity->email = $row->email;
            $entity->bloqueado = $row->bloqueado;
            $entity->senha = $row->senha;
            
            return $entity;
        }
        
        return NULL;
    }
    
    public function existeLoginSenha($login, $senha)
    {
        $this->openConnection();
        $table = $this->table();
        $query = " SELECT idusuario FROM $table WHERE email = '$login' AND senha = '$senha' ";
        $result = $this->query($query);
        if ($result->rowCount() == 0)
        {
            return 0;
        }
        
        $row = $result->fetch(PDO::FETCH_OBJ);
        
        $this->closeConnection();
        
        return $row->idusuario;
    }
}

?>
