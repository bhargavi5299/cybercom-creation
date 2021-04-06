<?php
namespace Model\Admin;

\Mage::loadClassByFileName('model\admin\session');

class Message extends Session 
{    
    public function __construct()
    {
        parent::__construct();
    }
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }
    public function getSuccess()
    {
        return $this->success; 
    }
    public function clearSuccess()
    {
        unset($this->success);
    }    

    public function setFailure($failure)
    {
        $this->failure = $failure;
        return $this;
    }
    public function getFailure()
    {
        return $this->failure;
    }
    public function clearFailure()
    {
        unset($this->failure);
    }

}
