<?php

spl_autoload_register(function ($class_name) {
    $directories = [
        'src/',
        'app/',
        'app/views/'
    ];

    foreach ($directories as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
                include $directory . $class_name . '.php';
            return;
        }
    }
});



?>
