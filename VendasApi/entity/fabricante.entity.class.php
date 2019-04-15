<?php
class TFabricanteEntity
{
    
    public  $idfabricante;
    public  $razaosocial;
    public  $telefone;
    
    public function __construct()
    {
        
    }
    
    public function setParam(TAction $action)
    {
        $this->idfabricante = $action->getParam('idfabricante');
        $this->razaosocial = $action->getParam('razaosocial');
        $this->telefone = $action->getParam('telefone');
    }
    
}
?>