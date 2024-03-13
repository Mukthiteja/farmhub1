<?php
ini_set('allow_url_fopen', 1);

$requestPath = @parse_url($_SERVER['REQUEST_URI'])['path'];

switch ($requestPath) {
    case '/':
        require 'index.php';
        break;
    case '/users_area/user_login.php':
        require 'users_area/user_login.php';
        break;
    case '/users_area/user_registration.php':
        require 'users_area/user_registration.php';
        break;
    default:
        http_response_code(404);
        echo $requestPath;
        exit('Not Found');
}
?>
