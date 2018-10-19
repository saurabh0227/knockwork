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
require '../src/models/PopularServicesModel.php';
require '../src/models/SubCategoriesModel.php';
require '../src/models/ClientLancerSearchModel.php';
require '../src/models/CategorySubCategoryModel.php';
require '../src/models/LancerSearchModel.php';

$app = new \Slim\App;

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {

//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });

require '../src/routes/knockWork.php';

$app->run();

?>
