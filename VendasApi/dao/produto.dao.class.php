<?php

class TProdutoDao extends TDao
{
    
    public function __construct()
    {}
    
    private function table()
    {
        return 'produtos';
    }
    
    private function fields()
    {
        return 'idproduto, descricao, unidade, idfabricante';
    }
    
    private function values(TProdutoEntity $entity)
    {
        return $entity->idproduto . ", " . TUtil::strAspas($entity->descricao) . ", " . TUtil::strAspas($entity->unidade) . ", " . $entity->idfabricate;
    }
    
    private function setValues(TProdutoEntity $entity)
    {
        return " descricao = " . TUtil::strAspas($entity->descricao) . ", " . " unidade = " . TUtil::strAspas($entity->unidade . ", " . $entity->idfabricante);
    }
    
    private function whereId($id)
    {
        return ' idproduto = ' . $id . '  ';
    }
    
    public function insert(TProdutoEntity $entity)
    {
        $entity->idproduto = 0;
        
        $this->commandInsert($this->table(), $this->fields(), $this->values($entity));
    }
    
    public function update(TProdutoEntity $entity)
    {
        $this->commandUpdate($this->table(), $this->setValues($entity), $this->whereId($entity->idproduto));
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
            $entity->idproduto = $row->idproduto;
            $entity->descricao = $row->descricao;
            $entity->unidade = $row->unidade;
            $entity->idfabricante = $row->idfabricante;
            
            return $entity;
        }
        
        return NULL;
    }
}

?>
