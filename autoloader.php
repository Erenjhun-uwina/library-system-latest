<?php


spl_autoload_register(
    function (string $classname)
    {   
  
        $paths = ['src','view','controller','conf'];

        foreach ($paths as $path) {

            $class = __DIR__."\\$path\\".$classname.".class.php";

            if(file_exists($class))break;
        }
        include $class;
    }
);


