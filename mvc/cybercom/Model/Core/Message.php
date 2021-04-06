<?php

Mage::loadClassByFileName('model_core_session');

class Model_Core_Message extends \Model\Core\Session 
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

    public function setNotice($notice)
    {
        $this->notice = $notice;
        return $this;
    }
    public function getNotice()
    {
        return $this->notice;
    }
    public function clearNotice()
    {
        unset($this->failure);
    }

    
}
