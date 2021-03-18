<?php
namespace Controller\Core;
class Admin

{

    protected $request = null;
    protected $layout = null;
    protected $message;
    public function __construct()
    {
       $this->setRequest();
    }
    public function getRequest()
    {
       return $this->request;
    }
    public function setRequest()
    {
       $this->request =\Mage::getModel('Model\core\request');
       return $this;
    }
    public function setLayout(\Block\Core\Template $layout = null, Admin $controllar)    
    {
        if (!$layout) 
        {
            $layout = \Mage::getBlock('block\core\layout', $controllar);
        }
        $this->layout = $layout;
        return $this;
    }
    public function getLayout()
    {
        if (!$this->layout) 
        {
            $this->setLayout(null,$this);    
        }
        return $this->layout;
    }
    public function randerLayout()
    {
        echo $this->getLayout()->toHtml();
    }

    public function setMessage(\Model\Admin\Message $message = null)
    {
        if (!$message) 
        {
            $message = \Mage::getModel('Model\admin\message');
        }
        $this->message = $message;
        return $this;
    }
    public function getMessage()
    {
        if (!$this->message) 
        {
            $this->setMessage();
        }
        return $this->message;
    }


    protected $final=[];
    public function redirectUrl($actionName=null,$controllerName=null,$params=[],$resetparams=false)
    {
        header("location:".$this->getUrl($actionName,$controllerName,$params,$resetparams));
        exit();
    }
    public function getUrl($actionName=null,$controllerName=null ,$params=[],$resetparams=false)
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

   
}




?>