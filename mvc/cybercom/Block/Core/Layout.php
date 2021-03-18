<?php
namespace Block\Core;
\Mage::loadClassByFileName('Block\Core\template');
class Layout extends Template
{
       function __construct()
       {
              $this->setTemplate("core/layout/onecolumn.php");
            
              $this->prepareChildren();
       }
       public function templateEdit()
       {
           $this->setTemplate('core/layout/twocolumn.php');
       }


       public function  prepareChildren()
       {
              $header=\Mage::getBlock('Block\core\layout\header');
              $this->addChild($header,'header');

              $headerLink=\Mage::getBlock('Block\core\layout\HeaderLink');
              $this->addChild($headerLink,'headerLink');
              
              $left = \Mage::getBlock('block\core\layout\left');
              $this->addChild($left,'leftTab');
       
              $footer = \Mage::getBlock('block\core\layout\footer');
              $this->addchild($footer,'footer');
              
              $content =\Mage:: getBlock('Block\Core\Layout\Content');
              $this->addChild($content,'content');

       }
       public function getContent()
       {
              return $this->getChild('content');
       }
       public function getLeft()
       {
              return $this->getChild('leftTab');
       }
      
}

?>