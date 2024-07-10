<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$test = new ArticleManager($db);
$newTest = new ArticleMapping([
    "article_id" => "1",
    "article_title" => "Test Title",
    "article_slug" => "test-title",
    "article_text" => "Test Text",
    'user_user_id' => "1",
]);



echo $twig->render('base.html.twig', ["article" => $newTest]);
