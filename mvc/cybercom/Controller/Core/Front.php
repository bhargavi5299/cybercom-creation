<?php
namespace Controller\Core;

class Front
{
    public static function init()
    {
        $request = \Mage::getModel('model\core\request');
        $controllerName = ucwords($request->getControllerName());
        $actionName = $request->getActionName() . "Action";
        $controllerName = self::prepareClassName($controllerName, "Controller");
        $controller = \Mage::getController($controllerName);
        $controller->$actionName();

    }

    public function prepareClassName($key, $namespace)
    {
        $className = $namespace . "\Admin\\" . $key;
        $className = str_replace("_", " ", $className);
        $className = ucwords($className);
        $className = str_replace(" ", "\\", $className);
        return $className;
    }
}
