<?php
class TAction
{
    
    private $file;
    private $class;
    private $method;
    private $operation;
    private $params;
    private $url;
    
    public function __construct()
    {
        $this->file = 'index.php';
    }
    
    public function setFile($value)
    {
        $this->file = $value;
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setClass($value)
    {
        $this->class = $value;
    }
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function setMethod($value)
    {
        $this->method = $value;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function getOperation()
    {
        return $this->operation;
    }
    
    public function setOperation($value)
    {
        $this->operation = $value;
    }
    
    public function addParam($name, $value)
    {
        $this->params[$name] = $value;
    }
    
    public function getParam($name)
    {
        if ($this->params) {
            if (array_key_exists($name, $this->params))
            {
                return $this->params[$name];
            }
        }
    }
    
    public function setParam($name, $value)
    {
        if (array_key_exists($name, $this->params))
        {
            $this->params[$name] = $value;
        }
    }
    
    public function getUrl()
    {
        
        if ($this->class != '')
        {
            $this->url['class'] = $this->class;
        }
        
        if ($this->method != '')
        {
            $this->url['method'] = $this->method;
        }
        
        if ($this->operation != '')
        {
            $this->url['operation'] = $this->operation;
        }
        
        if ($this->params)
        {
            if ($this->url)
            {
                $this->url = array_merge($this->url, $this->params);
            }
            else
            {
                $this->url = $this->params;
            }
        }
        
        return $this->file . '?' . http_build_query($this->url);
        
    }
    
    public function loadArray($array)
    {
        
        foreach ($array as $name => $value)
        {
            
            $is_param = TRUE;
            
            if ($name == 'class')
            {
                $this->class = $value;
                $is_param = FALSE;
            }
            
            if ($name == 'method')
            {
                $this->method = $value;
                $is_param = FALSE;
            }
            
            if ($name == 'operation')
            {
                $this->operation = $value;
                $is_param = FALSE;
            }
            
            if ($is_param)
            {
                $this->params[$name] = $value;
            }
        }
        
    }
    
}
?>