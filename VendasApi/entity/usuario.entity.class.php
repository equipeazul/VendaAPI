<?php

class TUsuarioEntity
{
    
    public  $idusuario;
    public  $nomeusuario;
    public  $email;
    public  $bloqueado;
    public  $senha;
    
    public function __construct()
    {
        
    }
    
    public function setParam(TAction $action)
    {
        $this->idusuario = $action->getParam('idusuario');
        $this->nomeusuario = $action->getParam('nomeusuario');
        $this->email = $action->getParam('email');
        $this->bloqueado = $action->getParam('bloqueado');
        $this->senha = $action->getParam('senha');
    }
    
}

?>