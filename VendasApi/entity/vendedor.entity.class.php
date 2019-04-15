<?php
class TVendedorEntity
{
    
    public  $idvendedor;
    public  $nome;
    public  $comissao;
    
    public function __construct()
    {
        
    }
    
    public function setParam(TAction $action)
    {
        $this->idvendedor = $action->getParam('idvendedor');
        $this->nome = $action->getParam('nome');
        $this->comissao = $action->getParam('comissao');
    }
    
}
?>