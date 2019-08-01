<?php

define('DEBUG', 1);
// define('DISABLE_DEVEL', 1);

include '/data/www/lib/library.php';

$args = explode('/', preg_replace('/^\//', '', $_GET['arg'] ?? '') ?? '');

// get controller
$controller = $args[0] ?? 'home';

if (!$controller)
    $controller = 'home';

if (!file_exists($controller_path = sprintf('./controllers/%s.php', strtolower($controller))))
    throw new Exception('Could not locate controller: '. $controller);
else 
    include_once ($controller_path);

if (!class_exists($controller)) 
    throw new Exception('Could not create controller class');

$page                     = new $controller;
$page->current_controller = $controller;

$method = $args[1] ?? null;
$method = preg_replace('/[-]/', '_', $method);

if ($method && method_exists($page, $method))
    call_user_func_array([$page, $method], array_slice($args, 2));
else if (method_exists($page, 'index'))
    call_user_func_array([$page, 'index'], array_slice($args, 1));