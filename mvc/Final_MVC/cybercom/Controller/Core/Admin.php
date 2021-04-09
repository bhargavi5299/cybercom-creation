<?php
namespace Controller\Core;

class Admin
{
    protected $request = null;
    protected $layout;
    protected $message;
    public function __construct()
    {
        $this->setRequest();
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

    public function setLayout(\Block\Core\Template $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('block\core\layout');
        }
        $this->layout = $layout;
        return $this;
    }
    public function getLayout()
    {
        if (!$this->layout) {
            $this->setLayout(null);
        }
        return $this->layout;
    }

    public function randerLayout()
    {
        echo $this->getLayout()->toHtml();
    }

    public function setMessage(\Model\Admin\Message $message = null)
    {
        if (!$message) {
            $message = \Mage::getModel('Model\admin\message');
        }
        $this->message = $message;
        return $this;
    }
    public function getMessage()
    {
        if (!$this->message) {
            $this->setMessage();
        }
        return $this->message;
    }
    public function redirectUrl($actionName = null, $controllarName = null, $prams = [], $resetparam = false)
    {
        header("Location:" . $this->getUrl($actionName, $controllarName, $prams, $resetparam));
        exit();
    }
    public function getUrl($actionName = null, $controllarName = null, $prams = [], $resetparam = false)
    {
        $final = $_GET;
        if ($resetparam) {
            $final = [];
        }

        if ($controllarName == null) {
            $controllarName = $this->getRequest()->getGet('c');
        }
        if ($actionName == null) {
            $actionName = $this->getRequest()->getGet('a');
        }
        $final['c'] = $controllarName;
        $final['a'] = $actionName;

        $final = array_merge($final, $prams);
        $queryString = http_build_query($final);
        unset($final);
        return "http://localhost/php_practice/mvc/cybercom/index.php?{$queryString}";
    }
}
