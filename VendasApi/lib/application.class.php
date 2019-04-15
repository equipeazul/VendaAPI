<?php

final class TApplication
{
    
    public function __construct()
    {
    }
    
    public static function create($action)
    {
        
        ini_set('default_charset','UTF-8');
        
        echo '<script language="JavaScript" src="./js/mascaras.js"></script>';
        
        include_once "./facade/jsonresult.class.php";
        include_once "./facade/facade.class.php";
        
        include_once "./lib/action.class.php";
        include_once "./lib/dao.class.php";
        include_once "./lib/exceptions.class.php";
        include_once "./lib/utils.class.php";
        
        include_once "./entity/usuario.entity.class.php";
        include_once "./entity/cliente.entity.class.php";
        include_once "./entity/vendedor.entity.class.php";
        include_once "./entity/fabricante.entity.class.php";
        include_once "./entity/produto.entity.class.php";
        
        include_once "./dao/usuario.dao.class.php";
        include_once "./dao/cliente.dao.class.php";
        include_once "./dao/vendedor.dao.class.php";
        include_once "./dao/fabricante.dao.class.php";
        include_once "./dao/produto.dao.class.php";
        
        include_once "./rule/login.rule.class.php";
        include_once "./rule/usuario.rule.class.php";
        include_once "./rule/cliente.rule.class.php";
        
        $json = new TJsonResult();
        if ($action) {
            $class = $action->getClass();
            $method = $action->getMethod();
            if (class_exists($class)) {
                $form = new $class($action);
                if (method_exists($form , $method)) {
                    $form->$method($action);
                } else {
                    echo $json->erro("Método inválido.");
                }
            } else {
                echo $json->erro("Classe inválida.");
            }
        }
        else {
            echo $json->erro("Prâmetros inválidos.");
        }
    }
}

?>