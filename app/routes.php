<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write("<!DOCTYPE html>\n"
            . "<html class=\"wf-brandongrotesque-n7-active wf-brandongrotesque-n3-active wf-active\">\n"
            . "<head>\n"
            . "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/all.css\">\n"
            . "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\"/>\n"
            . "<link rel=\"shortcut icon\" href=\"images/favicon.png\"/>\n"
            . "</head>\n"
            . "<body>\n"
            . "<header class=\"site-header\">\n"
            . "<div class=\"site-title\">\n"
            . "<a href=\"http://www.slimframework.com/\">Slim</a>\n"
            . "</div>\n"
            . "<p class=\"site-slogan\">\n"
            . "Welcome to the Slim Framework Skeleton Application!\n"
            . "</p>\n"
            . "</header>\n"
            . "</body>\n"
            . "</html>\n"
        );

        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
