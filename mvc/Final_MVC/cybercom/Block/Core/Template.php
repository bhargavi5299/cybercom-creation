<?php
namespace Block\Core;

class Template
{   
    protected $template = null;
    protected $children=[];
    
    protected $message;
    protected $request;
    protected $url;

    protected $defaultTab;
    protected $tabs = [];

    public function __construct()
    {
        $this->setRequest();    
    }

    public function setTemplate($template)
    {
        $this->template = "View/".$template;
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }

    public function toHtml()
	{
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

    public function setChildren($children = null)
    {
        $this->children = $children;
        return $this;
    }
    public function getChildren()
    {
        return $this->children;
    }

    public function createChild($className)
    {
        return \Mage::getBlock($className);
    }

    public function addChild(Template $child, $key=null)
    {
        if (!$key) {
            $key = get_class($child);
        }
        return $this->children[$key] = $child;
         
    }
    public function getChild($key)
    {
        if (!array_key_exists($key,$this->children)) 
        {
            return null;
        }
        return $this->children[$key];
    }
    public function removeChild($key)
    {
        if (array_key_exists($key,$this->children)) 
        {
            unset($this->children[$key]);
        }
        return $this;
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

    public function setRequest()
    {
       $this->request = \Mage::getModel('model\core\request');
       return $this;
    }
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
       return $this->request;
    }
    public function setUrl($url = null)
    {
        if (!$url) {
            $this->url = \Mage::getModel('model\core\url');
        }
        return $this->url;  
    }
    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    public function baseUrl($suburl)
    {
        return $this->getUrl()->baseUrl($suburl);
    }
    
   
}


?>