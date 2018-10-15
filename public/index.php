<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';
require '../src/models/JobDescriptionLancerModel.php';
require '../src/models/PageLancerModel.php';
require '../src/models/ClientLancerModel.php';
require '../src/models/CategoriesModel.php';
require '../src/models/JobDescriptionModel.php';
require '../src/models/ClientDetailMOdel.php';
require '../src/models/ClientDetailCategoryModel.php';
require '../src/models/ClientDetailSubCategoryModel.php';
require '../src/models/DetailedJobDescriptionModel.php';
require '../src/models/RequiredSkillsModel.php';

$app = new \Slim\App;

// $checkProxyHeaders = true;
// $trustedProxies = ['192.168.0.1', '192.168.0.2'];

// $app->add(new RKA\Middleware\IpAddress($checkProxyHeaders, $trustedProxies));

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {

    //$ipAddress = $request->getAttribute('ip_address');


    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

require '../src/routes/knockWork.php';

$app->run();
