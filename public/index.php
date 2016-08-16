<?php
require_once __DIR__ . '/../require.php';
$request = explode('/', ltrim($_SERVER['REQUEST_URI'], ROOT_URLPATH));
$controller = 'Home';
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
    $controller = 'Admin';
    $_SESSION['isAdmin'] = true;
    $request = explode('/', ltrim($_SERVER['REQUEST_URI'], ROOT_URLPATH . ADMIN_DIR));
} else {
    $_SESSION['isAdmin'] = false;
}

if (count($request) > 1) {
    $controller = ucfirst($request[0]);
}

$controller = $controller . 'Controller';
$controllerDir = CONTROLLER_DIR;
if (!empty($_SESSION['isAdmin'])) {
    $controllerDir = $controllerDir . ADMIN_DIR;
}

$file = $controllerDir . $controller . '.php';
if (file_exists($file)) {
    require_once $file;
    $objPage = new $controller();
	
    $objPage->getMode();
    if (method_exists($objPage, $objPage->mode)) {
        $objPage->{$objPage->mode}();
    } else {
        $objPage->index();
    }
}

exit;
