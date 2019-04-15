<?php
class TLoginRule
{
    public function __construct()
    {
        
    }
    
    private function validate($login, $senha)
    {
        if ($login == "")
        {
            throw new LoginException("Login inválido !!!");
        }
        
        if ($senha == "")
        {
            throw new LoginException("Senha inválida !!!");
        }
    }
    
    public function autenticarUsuario($login, $senha)
    {
        try {
            $this->validate($login, $senha);
            
            $dao = new TUsuarioDao();
            $id_usuario = $dao->existeLoginSenha($login, $senha);
            
            if ($id_usuario == 0)
            {
                throw new LoginException('Usuário e senha não cadastrados.');
            }
            else
            {
                $usuarioentity = new TUsuarioEntity();
                $usuarioentity = $dao->get($id_usuario);
                $_SESSION["idUsuario"] = $usuarioentity->idusuario;
                $_SESSION["nomeusuario"] = $usuarioentity->nomeusuario;
                $_SESSION["email"] = $usuarioentity->email;
                
            }
            
            $json = new TJsonResult();
            return $json->data($id_usuario);
            
        } catch (Exception $e) {
            $json = new TJsonResult();
            return $json->erro($e->getMessage());
        }
    }
    
}

?>