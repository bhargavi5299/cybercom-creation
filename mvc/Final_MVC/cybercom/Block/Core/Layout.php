<?php
namespace Block\core;

\Mage::loadClassByFileName('block\core\template');

class Layout extends Template
{
    public function __construct()
    {
        $this->setTemplate('core/layout/oneColumn.php');
        // $this->setTemplate('core/layout/threeColumnWithLeftRightBar.php');
        $this->prepareChildren();
    }

    // public function templateEdit()
    // {
    //     // $this->setTemplate("core/layout/twoColumnWithLeftBar.php");
    //     $this->setTemplate('core/layout/threeColumnWithLeftRightBar.php');
    // }

    public function prepareChildren()
    {
        $left = \Mage::getBlock('block\core\layout\left');
        $this->addChild($left, "leftTab");

        $header = \Mage::getBlock('block\core\layout\header');
        $this->addChild($header, "Header");

        $footer = \Mage::getBlock('block\core\layout\footer');
        $this->addChild($footer, "Footer");

        $content = \Mage::getBlock('block\core\layout\content');
        $this->addChild($content, "Content");

        $rightBar = \Mage::getBlock('block\core\layout\rightbar');
        $this->addChild($rightBar, "Rightbar");
    }

    public function getContent()
    {
        return $this->getChild('Content');
    }
    public function getLeft()
    {
        return $this->getChild('leftTab');
    }

}
