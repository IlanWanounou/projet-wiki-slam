<?php

use Controller\src\Admin\Article\ArticleManager;

require_once(__DIR__ . '/../controleurs/src/ArticleManager.php');

$articleManager = new ArticleManager($bdd);

$content = $articleManager->getContent($parseArticleId);
echo $content;
