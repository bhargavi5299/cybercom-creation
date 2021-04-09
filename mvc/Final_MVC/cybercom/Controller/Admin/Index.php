<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class index extends \Controller\Core\Admin
{
 public function indexAction()
 {
  $form = \Mage::getBlock('Block\Admin\Index\Grid');
  $layout = $this->getLayout();
  $content = $layout->getChild('Content');
  $content->addChild($form, 'form');
  echo $layout->toHtml();
 
 }

}
