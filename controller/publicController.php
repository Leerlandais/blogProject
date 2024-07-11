<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$test = new ArticleManager($db);
$newTest = new ArticleMapping([]);

$art = "hihi";
$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        echo $twig->render('publicView/public.home.view.twig');
        break;
    case 'login' :
        echo $twig->render('publicView/public.login.view.twig');
        break;
}
