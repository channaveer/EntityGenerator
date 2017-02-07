<?php
/**
 * /
 * @param  $className [description]
 * @return require path
 */

/* Absolute path if the autoload.php is outside the EntityGenerator Namespace */
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    require __DIR__.DIRECTORY_SEPARATOR.$fileName; //absolute path now
}
spl_autoload_register('autoload');
