<?php

function my_autoloader($class_name) {
    $classpath = __DIR__ .'/../' . str_replace('\\', '/', $class_name) . '.class.php';
    if (file_exists($classpath)) {
        require_once $classpath;
      } 
}

spl_autoload_register('my_autoloader');
?>
