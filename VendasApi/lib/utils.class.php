<?php

final class TUtil
{
    public static function trataAcentuacao($texto)
    {
        $textoanterio = '';
        while ($texto != $textoanterio)
        {
            $textoanterio = $texto;
            
            $texto = str_replace('Á', '&Aacute', $texto);
            $texto = str_replace('á', '&aacute', $texto);
            $texto = str_replace('Â', '&Acirc', $texto);
            $texto = str_replace('â', '&acirc', $texto);
            $texto = str_replace('À', '&Agrave', $texto);
            $texto = str_replace('à', '&agrave', $texto);
            //$texto = str_replace('Å', '&Aring', $texto);
            //$texto = str_replace('å', '&aring', $texto);
            $texto = str_replace('Ã', '&Atilde', $texto);
            $texto = str_replace('ã', '&atilde', $texto);
            $texto = str_replace('Ä', '&Auml', $texto);
            $texto = str_replace('ä', '&auml', $texto);
            //$texto = str_replace('Æ', '&AElig', $texto);
            //$texto = str_replace('æ', '&aelig', $texto);
            $texto = str_replace('É', '&Eacute', $texto);
            $texto = str_replace('é', '&eacute', $texto);
            $texto = str_replace('Ê', '&Ecirc', $texto);
            $texto = str_replace('ê', '&ecirc', $texto);
            $texto = str_replace('È', '&Egrave', $texto);
            $texto = str_replace('è', '&egrave', $texto);
            $texto = str_replace('Ë', '&Euml', $texto);
            $texto = str_replace('ë', '&Euml', $texto);
            //$texto = str_replace('Ð', '&ETH', $texto);
            //$texto = str_replace('ð', '&eth', $texto);
            $texto = str_replace('Í', '&Iacute', $texto);
            $texto = str_replace('í', '&iacute', $texto);
            $texto = str_replace('Î', '&Icirc', $texto);
            $texto = str_replace('î', '&icirc', $texto);
            $texto = str_replace('Ì', '&Igrave', $texto);
            $texto = str_replace('ì', '&igrave', $texto);
            $texto = str_replace('Ï', '&Iuml', $texto);
            $texto = str_replace('ï', '&iuml', $texto);
            $texto = str_replace('Ó', '&Oacute', $texto);
            $texto = str_replace('ó', '&oacute', $texto);
            $texto = str_replace('Ô', '&Ocirc', $texto);
            $texto = str_replace('ô', '&ocirc', $texto);
            $texto = str_replace('Ò', '&Ograve', $texto);
            $texto = str_replace('ò', '&ograve', $texto);
            //$texto = str_replace('Ø', '&Oslash', $texto);
            //$texto = str_replace('ø', '&oslash', $texto);
            $texto = str_replace('Õ', '&Otilde', $texto);
            $texto = str_replace('õ', '&otilde', $texto);
            $texto = str_replace('Ö', '&Ouml', $texto);
            $texto = str_replace('ö', '&ouml', $texto);
            $texto = str_replace('Ú', '&Uacute', $texto);
            $texto = str_replace('ú', '&uacute', $texto);
            //$texto = str_replace('Û', '&Ucirc', $texto);
            //$texto = str_replace('û', '&ucirc', $texto);
            $texto = str_replace('Ù', '&Ugrave', $texto);
            $texto = str_replace('ù', '&ugrave', $texto);
            //$texto = str_replace('Ü', '&Uuml', $texto);
            //$texto = str_replace('ü', '&uuml', $texto);
            $texto = str_replace('Ç', '&Ccedil', $texto);
            $texto = str_replace('ç', '&ccedil', $texto);
            //$texto = str_replace('Ñ', '&Ntilde', $texto);
            //$texto = str_replace('ñ', '&ntilde', $texto);
            
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