<?php
/**
 * /
 * @param  $className [description]
 * @return require path
 */
/* If autoload.php  and index.php are inside EntityGenerator Namespace
function autoload($className)
{
    $namespaceRoot = "EntityGenerator"; 
    $className = ltrim($className, '\\');
    if (strpos($className,$namespaceRoot) !== 0) { return; } //Not handling other namespaces
    $className = substr($className, strlen($namespaceRoot));
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

*/
/* Absolute path if the autoload.php is outside the EntityGenerator Namespace */
// function autoload($className)
// {
//     $className = ltrim($className, '\\');
//     $fileName  = '';
//     $namespace = '';
//     if ($lastNsPos = strrpos($className, '\\')) {
//         $namespace = substr($className, 0, $lastNsPos);
//         $className = substr($className, $lastNsPos + 1);
//         $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
//     }
//     $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
//     echo __DIR__.DIRECTORY_SEPARATOR.$fileName;
//     require __DIR__.DIRECTORY_SEPARATOR.$fileName; //absolute path now
// }
// spl_autoload_register('autoload');

/* Relative Path if autoload.php is outside EntityGenerator Namespace
 * Must not use relative path name 
 */
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
    require $fileName;
}
spl_autoload_register('autoload');

/* PSR - 4 */
// spl_autoload_register(function ($class) {

//     // project-specific namespace prefix
//     $prefix = 'Foo\\Bar\\';

//     // base directory for the namespace prefix
//     $base_dir = __DIR__ . '/src/';

//     // does the class use the namespace prefix?
//     $len = strlen($prefix);
//     if (strncmp($prefix, $class, $len) !== 0) {
//         // no, move to the next registered autoloader
//         return;
//     }

//     // get the relative class name
//     $relative_class = substr($class, $len);

//     // replace the namespace prefix with the base directory, replace namespace
//     // separators with directory separators in the relative class name, append
//     // with .php
//     $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

//     // if the file exists, require it
//     if (file_exists($file)) {
//         require $file;
//     }
// });