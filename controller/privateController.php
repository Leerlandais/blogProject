<?php

/*
 * Ce fichier sera le router public de notre application
 */

use model\Manager\ArticleManager;
use model\Manager\CategoryManager;
use model\Manager\CommentManager;
use model\Manager\TagManager;
use model\Manager\UserManager;

$articleManager = new ArticleManager($db);
$categoryManager = new CategoryManager($db);
$commentManager = new CommentManager($db);
$tagManager = new TagManager($db);
$userManager = new UserManager($db);

// SUPPRIMER CATEGORY
if(isset($_POST["categoryIdDelete"])
&& ctype_digit($_POST["categoryIdDelete"])) {
    $categoryId = $_POST["categoryIdDelete"];
    $deleteCategory = $categoryManager->delete($categoryId);
    header("Location: ?route=admin&section=categories");
    }
// MODIFIER CATEGORY
if(isset($_POST["categoryIdUpdate"])
    && ctype_digit($_POST["categoryIdUpdate"])) {
    $categoryId = $_POST["categoryIdUpdate"];
    $getCategory = $categoryManager->selectOneById($categoryId);
    $getCategory->setCategoryName($_POST['categoryNameUpdate']);
    $getCategory->setCategorySlug($_POST['categoryNameUpdate']);
    $getCategory->setCategoryDescription($_POST['categoryDescUpdate']);
    $updateCategory = $categoryManager->update($getCategory);
    header("Location: ?route=admin&section=categories");
}
// AJOUTE NOUVEAU CATEGORY
    // TODO
// SUPPRIMER TAGS
if(isset($_POST["tagIdDelete"])
    && ctype_digit($_POST["tagIdDelete"])) {
    $tagId = $_POST["tagIdDelete"];
    $deleteCategory = $tagManager->delete($tagId);
    header("Location: ?route=admin&section=tags");
}
// MODIFIER TAGS
if(isset($_POST["tagIdUpdate"])
    && ctype_digit($_POST["tagIdUpdate"])) {
    $tagId = $_POST["tagIdUpdate"];
    $getTag = $tagManager->selectOneById($tagId);
    // TODO Clean the slug
    $getTag->setTagSlug($_POST['tagSlugUpdate']);

    $updateTag = $tagManager->update($getTag);
    header("Location: ?route=admin&section=tags");
}
// AJOUTE NOUVEAU TAG
    // TODO

$route = $_GET['route'] ?? 'admin';

switch ($route) {
    case 'admin':
        $section = $_GET["section"] ?? "none";
        $arts=null;
        $cats=null;
        $oneCat=null;
        $delCat=null;
        $tags=null;
        $oneTag=null;
        $delTag=null;
        $users=null;
        switch($section){
            case 'articles' :
                $arts=true;
                break;
            case 'categories' :
                $cats = $categoryManager->selectAll();
                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case 'update':
                            $oneCat = $categoryManager->selectOneBySlug($_GET["slug"]);
                            break;
                        case 'delete':
                            $delCat = $categoryManager->selectOneBySlug($_GET["slug"]);
                            break;
                    }
                }
                break;
            case 'tags' :
                $tags= $tagManager->selectAll();
                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case 'update':
                            $oneTag = $tagManager->selectOneBySlug($_GET["slug"]);
                            break;
                        case 'delete':
                            $delTag = $tagManager->selectOneBySlug($_GET["slug"]);
                            break;
                    }
                }
                break;
            case 'users' :
                $users=true;
                break;
        }

        echo $twig->render('privateTwig/private.homepage.html.twig', ['arts' => $arts, 'cats' => $cats, 'oneCat' => $oneCat, 'delCat' => $delCat, 'tags' => $tags, "oneTag" => $oneTag, "delTag" => $delTag, 'users' => $users]);

        break;
    default:
        include PROJECT_DIRECTORY."/view/publicView/public.404.php";
        break;
}
