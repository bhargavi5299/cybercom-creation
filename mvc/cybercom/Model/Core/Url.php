<?php
namespace Model\Core;

class Url
{
    protected $request = null;

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
    public function baseUrl($suburl = null)
    {
        $url = 'http://localhost/php_practice/mvc/cybercom/';
        if ($suburl) {
            $url .= $suburl;
        }
        return $url;
    }
}
