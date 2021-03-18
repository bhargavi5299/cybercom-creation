<?php
namespace Model\Core;

class Url
{
    protected $request = null;
   
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\core\request');
        return $this;       

    }
    public function getRequest()
    {
        return $this->request;
    }
    public function getUrl($actionName=null,$controllerName=null,$params=[],$resetparams=false)
    {
        $final=$_GET;
        if($resetparams)
        {
            $final=[];
        }
        
        if($controllerName==null )
        {
            $controllerName=$_GET['c'];
        }
        if($actionName==null)
        {
            $actionName=$_GET['a'];
        }

        $final['c']=$controllerName;
        $final['a']=$actionName;
        $final = array_merge($final,$params);
        $queryString=http_build_query($final);
        unset($final);
        
        //return "http://localhost/php_practice/mvc/cybercom/index.php?c={$controllerName}&a={$actionName}";
        return "http://localhost/php_practice/mvc/cybercom/index.php?{$queryString}";
        exit();
    }
    public function baseUrl($subUrl=null)
    {
        $url = "http://localhost/php_practice/mvc/cybercom/";
        if($subUrl)
        {
            $url .= $subUrl;
        }
        return $url;
       
    }


}

?>