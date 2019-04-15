<?php

class TFabricanteDao extends TDao
{
    
    public function __construct()
    {}
    
    private function table()
    {
        return 'fabricantes';
    }
    
    private function fields()
    {
        return 'idfabricante, razaosocial, telefone';
    }
    
    private function values(TFabricanteEntity $entity)
    {
        return $entity->idfabricante . ", " . TUtil::strAspas($entity->razaosocial) . ", " . TUtil::strAspas($entity->telefone);
    }
    
    private function setValues(TClienteEntity $entity)
    {
        return " razaosocial = " . TUtil::strAspas($entity->razaosocial) . ", " . " telefone = " . TUtil::strAspas($entity->telefone);
    }
    
    private function whereId($id)
    {
        return ' idfabricante = ' . $id . '  ';
    }
    
    public function insert(TFabricanteEntity $entity)
    {
        $entity->idfabricante = 0;
        
        $this->commandInsert($this->table(), $this->fields(), $this->values($entity));
    }
    
    public function update(TFabricanteEntity $entity)
    {
        $this->commandUpdate($this->table(), $this->setValues($entity), $this->whereId($entity->idfabricante));
    }
    
    public function delete($id)
    {
        $this->commandDelete($this->table(), $this->whereId($id));
    }
    
    public function get($id)
    {
        $row = $this->commandGet($this->table(), $this->fields(), $this->whereId($id));
        
        if ($row) {
            $entity = new TClienteEntity();
            $entity->idfabricante = $row->idfabricante;
            $entity->razaosocial = $row->razaosocial;
            $entity->telefone = $row->telefone;
            
            return $entity;
        }
        
        return NULL;
    }
}

?>
