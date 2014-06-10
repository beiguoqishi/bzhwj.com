<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-6-8
 * Time: 上午12:00
 */
error_reporting(E_ALL);
ini_set( 'display_errors', 'On' );
require_once 'ActiveRecord/ActiveRecord.php';
require_once 'Slim/Slim.php';
require_once 'Controller/CmsController.php';

$connections = array(
    'production' => 'mysql://root:root@127.0.0.1/ecmall?charset=utf8'
);

// initialize ActiveRecord
ActiveRecord\Config::initialize(function($cfg) use ($connections)
{
    $cfg->set_model_directory('Model');
    $cfg->set_connections($connections);

});

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'templates.path' => './static/html/'
));

$cmsController = new CmsController();

$app->get('/',function() use($app){
    $app->render('index.html');
});

$app->get('/list/:table(/:page)',function($table,$page = 1) use ($app,$cmsController){
    $params = $app->request->get();
    header('Content-Type:application/json;charset=UTF-8');
    echo json_encode($cmsController->findListByTable($table,$page,$params));
});

$app->get('/config/:table/:app_id',function($table,$app_id) use ($app,$cmsController){
    header('Content-Type:application/json;charset=UTF-8');
    echo $cmsController->getConfigByTableAndAppId($table,$app_id)->to_json();

});

$app->run();