<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$test = new ArticleManager($db);
$newTest = new ArticleMapping([]);

$art = "hihi";

echo $twig->render('publicView/public.home.view.twig', ["article" => $art]);
