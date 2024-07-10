<?php
echo ("Hi There");

use model\Mapping\ArticleMapping;

$test = new ArticleMapping($db);
$test->setArticleId("s");

