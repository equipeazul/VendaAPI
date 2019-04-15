<?php

final class TUtil
{
    public static function trataAcentuacao($texto)
    {
        $textoanterio = '';
        while ($texto != $textoanterio)
        {
            $textoanterio = $texto;
            
            $texto = str_replace('�', '&Aacute', $texto);
            $texto = str_replace('�', '&aacute', $texto);
            $texto = str_replace('�', '&Acirc', $texto);
            $texto = str_replace('�', '&acirc', $texto);
            $texto = str_replace('�', '&Agrave', $texto);
            $texto = str_replace('�', '&agrave', $texto);
            //$texto = str_replace('�', '&Aring', $texto);
            //$texto = str_replace('�', '&aring', $texto);
            $texto = str_replace('�', '&Atilde', $texto);
            $texto = str_replace('�', '&atilde', $texto);
            $texto = str_replace('�', '&Auml', $texto);
            $texto = str_replace('�', '&auml', $texto);
            //$texto = str_replace('�', '&AElig', $texto);
            //$texto = str_replace('�', '&aelig', $texto);
            $texto = str_replace('�', '&Eacute', $texto);
            $texto = str_replace('�', '&eacute', $texto);
            $texto = str_replace('�', '&Ecirc', $texto);
            $texto = str_replace('�', '&ecirc', $texto);
            $texto = str_replace('�', '&Egrave', $texto);
            $texto = str_replace('�', '&egrave', $texto);
            $texto = str_replace('�', '&Euml', $texto);
            $texto = str_replace('�', '&Euml', $texto);
            //$texto = str_replace('�', '&ETH', $texto);
            //$texto = str_replace('�', '&eth', $texto);
            $texto = str_replace('�', '&Iacute', $texto);
            $texto = str_replace('�', '&iacute', $texto);
            $texto = str_replace('�', '&Icirc', $texto);
            $texto = str_replace('�', '&icirc', $texto);
            $texto = str_replace('�', '&Igrave', $texto);
            $texto = str_replace('�', '&igrave', $texto);
            $texto = str_replace('�', '&Iuml', $texto);
            $texto = str_replace('�', '&iuml', $texto);
            $texto = str_replace('�', '&Oacute', $texto);
            $texto = str_replace('�', '&oacute', $texto);
            $texto = str_replace('�', '&Ocirc', $texto);
            $texto = str_replace('�', '&ocirc', $texto);
            $texto = str_replace('�', '&Ograve', $texto);
            $texto = str_replace('�', '&ograve', $texto);
            //$texto = str_replace('�', '&Oslash', $texto);
            //$texto = str_replace('�', '&oslash', $texto);
            $texto = str_replace('�', '&Otilde', $texto);
            $texto = str_replace('�', '&otilde', $texto);
            $texto = str_replace('�', '&Ouml', $texto);
            $texto = str_replace('�', '&ouml', $texto);
            $texto = str_replace('�', '&Uacute', $texto);
            $texto = str_replace('�', '&uacute', $texto);
            //$texto = str_replace('�', '&Ucirc', $texto);
            //$texto = str_replace('�', '&ucirc', $texto);
            $texto = str_replace('�', '&Ugrave', $texto);
            $texto = str_replace('�', '&ugrave', $texto);
            //$texto = str_replace('�', '&Uuml', $texto);
            //$texto = str_replace('�', '&uuml', $texto);
            $texto = str_replace('�', '&Ccedil', $texto);
            $texto = str_replace('�', '&ccedil', $texto);
            //$texto = str_replace('�', '&Ntilde', $texto);
            //$texto = str_replace('�', '&ntilde', $texto);
            
        }
        
        return $texto;
    }
    
    public static function checkedString($string, $value, $notvalue)
    {
        if ($string == 'on')
        {
            return $value;
        }
        else
        {
            return $notvalue;
        }
    }
    
    public static function selectedString($string, $selected, $value, $notvalue)
    {
        if ($string == $selected)
        {
            return $value;
        }
        else
        {
            return $notvalue;
        }
    }
    
    public static function strDate($stringdata)
    {
        return date('d/m/Y',strtotime($stringdata));
    }
    
    public static function strDateTime($stringdata)
    {
        return date('d/m/Y H:i',strtotime($stringdata));
    }
    
    public static function zerarPOST()
    {
        $num=count($_POST)-1;
        
        while ($num >= 0)
        {
            array_pop($_POST);
            $num = $num - 1;
        }
        
    }
    
    public static function strAspas($str)
    {
        return "'" . $str . "'";
    }
    
}

?>