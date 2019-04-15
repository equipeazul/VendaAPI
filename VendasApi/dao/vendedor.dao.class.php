<?php

class TVendedorDao extends TDao
{
    
    public function __construct()
    {}
    
    private function table()
    {
        return 'vendedores';
    }
    
    private function fields()
    {
        return 'idvendedor, nome, comissao';
    }
    
    private function values(TVendedorEntity $entity)
    {
        return $entity->idvendedor . ", " . TUtil::strAspas($entity->nome) . ", " . $entity->comissao;
    }
    
    private function setValues(TVendedorEntity $entity)
    {
        return " nome = " . TUtil::strAspas($entity->nome) . ", " . " comissao = " . $entity->comissao;
    }
    
    private function whereId($id)
    {
        return ' idvendedor = ' . $id . '  ';
    }
    
    public function insert(TVendedorEntity $entity)
    {
        $entity->idvendedor = 0;
        
        $this->commandInsert($this->table(), $this->fields(), $this->values($entity));
    }
    
    public function update(TVendedorEntity $entity)
    {
        $this->commandUpdate($this->table(), $this->setValues($entity), $this->whereId($entity->idcliente));
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
            $entity->idvendedor = $row->idvendedor;
            $entity->nome = $row->nome;
            $entity->comissao = $row->comissao;
            
            return $entity;
        }
        
        return NULL;
    }
}

?>
