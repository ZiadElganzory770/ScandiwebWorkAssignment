<?php

function my_autoloader($class_name) {
    $classpath = __DIR__ .'/classes/' . str_replace('\\', '/', $class_name) . '.class.php';
    // $interfacePath = __DIR__ . '/interfaces/' . str_replace('\\', '/', $class_name) . '.interface.php';
    if (file_exists($classpath)) {
        require $classpath;
     } 
    //elseif (file_exists($interfacePath)) {
    //     require $interfacePath;
    // }
    echo $classpath;
    echo $interfacePath;
}
spl_autoload_register('my_autoloader');
?>