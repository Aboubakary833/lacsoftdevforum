<?php

function loadClass($class, $path = null) {
    if(isset($path)) {
        require_once $path.'/'.$class;
    } else require_once $class;
}

spl_autoload_register("loadClass");

?>