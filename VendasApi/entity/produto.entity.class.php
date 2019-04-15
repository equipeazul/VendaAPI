<?php
class TProdutoEntity
{
    
    public  $idproduto;
    public  $descricao;
    public  $unidade;
    public  $precovenda;
    public  $idfabricate;
    
    public function __construct()
    {
        
    }
    
    public function setParam(TAction $action)
    {
        $this->idproduto = $action->getParam('idproduto');
        $this->descricao = $action->getParam('descricao');
        $this->unidade = $action->getParam('unidade');
        $this->precovenda = $action->getParam('precovenda');
        $this->idfabricate = $action->getParam('idfabricate');
    }
    
}
?>