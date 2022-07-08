<?php

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = "App\\";
    // var_dump($prefix);
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';
    //var_dump($base_dir);
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    //var_dump($len);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // get the relative class name
    $namespace = substr($class, $len);
    //var_dump($namespace);
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file= $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . '.php';
    //var_dump($file);

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
      //  return true;
    }
    //return false;
});