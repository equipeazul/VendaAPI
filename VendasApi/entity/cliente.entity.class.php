<?php
class TClienteEntity
{
    
    public  $idcliente;
    public  $nome;
    public  $cpf;
    
    public function __construct()
    {
        
    }
    
    public function setParam(TAction $action)
    {
        $this->idcliente = $action->getParam('idcliente');
        $this->nome = $action->getParam('nome');
        $this->cpf = $action->getParam('cpf');
    }
    
}
?>