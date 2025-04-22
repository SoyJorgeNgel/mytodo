<?php
$url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case '/':
    case '/task':

        require_once __DIR__ . '/../controllers/TaskController.php';

        $controller = new TaskController();
        $controller->index();
        break;
    case '/taskdataapi':
        require_once __DIR__ . '/../controllers/TaskController.php';
        $controller = new TaskController();
        $controller->tasksAPI();
        break;
    case '/taskregisterapi':
        require_once __DIR__ . '/../controllers/TaskController.php';
        $controller = new TaskController();
        $controller->taskRegisterAPI();
        break;
    case '/taskupdateapi':
        require_once __DIR__ . '/../controllers/TaskController.php';
        $controller = new TaskController();
        $controller->taskUpdateAPI();
        break;
    case '/taskdeleteapi':
        require_once __DIR__ . '/../controllers/TaskController.php';
        $controller = new TaskController();
        $controller->taskDeleteAPI();
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada.";
}
