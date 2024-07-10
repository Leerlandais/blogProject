<?php
session_start();

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

use model\OurPDO;

require_once "../config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

require_once PROJECT_DIRECTORY.'/vendor/autoload.php';

$loader = new FilesystemLoader(PROJECT_DIRECTORY.'/view/');
$twig = new Environment($loader, [
    'cache' => false,
    'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$db = OurPDO::getInstance( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
    DB_LOGIN,
    DB_PWD);

$db->setAttribute(OurPDO::ATTR_ERRMODE, OurPDO::ERRMODE_EXCEPTION);

require_once PROJECT_DIRECTORY.'/controller/routeController.php';

$db = null;


