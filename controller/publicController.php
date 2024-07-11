<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

/*
$test = new ArticleManager($db);
$newTest = new ArticleMapping([]);
*/

if (isset($_POST['name'], $_POST["pass"])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    // create a login function call here (once the manager is done)
}

$route = $_GET['route'] ?? 'home';
switch ($route) {
    case 'home':
        echo $twig->render('publicView/public.home.view.twig');
        break;
    case 'login' :
        echo $twig->render('publicView/public.login.view.twig');
        break;
}
