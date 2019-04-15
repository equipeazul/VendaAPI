<?php

final class TJson {
    public $result;
    public $content;
}

final class TJsonResult {
    
    public function erro($data)
    {
        $json = new TJson();
        $json->result = 'ERRO';
        $json->content = TUtil::trataAcentuacao($data);
        
        return json_encode($json);
    }
    
    public function ok($data)
    {
        $json = new TJson();
        $json->result = 'OK';
        $json->content = TUtil::trataAcentuacao($data);
        
        return json_encode($json);
    }
    
    public function data($data)
    {
        $json = new TJson();
        $json->result = 'DATA';
        $json->content = json_encode($data);
        
        return json_encode($json);
    }
}

?>