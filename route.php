<?php
$routes = [
    ['url' => '/', 'action' => 'home'],
    ['url' => '/articles', 'action' => 'articles'],
    ['url' => '/article/{id}', 'action' => 'article'],
];

$requestUrl = $_SERVER['REQUEST_URI'];

$matchedRoute = null;
foreach ($routes as $route) {
    $pattern = '/^' . str_replace('/', '\/', $route['url']) . '$/';
    if (preg_match($pattern, $requestUrl, $matches)) {
        $matchedRoute = $route;
        break;
    }
}

if ($matchedRoute) {
    // Appeler la fonction ou le contrôleur approprié pour la route
    call_user_func($matchedRoute['action'], $matches);
} else {
    // Renvoyer une erreur 404
    http_response_code(404);
    echo "Page not found";
}

function home()
{
    echo "Welcome to the home page";
}

function articles()
{
    echo "Here are the latest articles";
}

function article($matches)
{
    $id = $matches[1];
    echo "Here is the article with ID $id";
}


?>