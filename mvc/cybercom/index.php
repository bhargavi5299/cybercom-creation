<?php
spl_autoload_register(__NAMESPACE__.'\Mage::loadClassByFileName');


class Mage
{
    public static function init()
    {
        self::loadClassByFileName('controller\core\front');
        \Controller\Core\Front::init();
    }

    public static function loadClassByFileName($className)
    {
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '/', $className);
        $className = $className . '.php';
        // echo $className."<br>";

        require_once $className;
    }

    public static function getController($controllerName)
    {
        //self::loadClassByFileName($controllerName);

        $controllerName = str_replace('\\', ' ', $controllerName);
        $controllerName = ucwords($controllerName);
        $controllerName = str_replace(' ', '\\', $controllerName);
        return new $controllerName;
    }

    public static function getModel($className)
    {
        //self::loadClassByFileName($className);

        $className = str_replace('_', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '_', $className);
        return new $className;
    }

    public static function getBlock($className)
    {
        //self::loadClassByFileName($className);

        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return new $className;
    }

    public static function getBaseDir($subPath = null)
    {
        if ($subPath) {
            return getcwd() . DIRECTORY_SEPARATOR . $subPath;
        }
        return getcwd();
    }
}
Mage::init();
