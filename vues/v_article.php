<?php
require_once(__DIR__ . '/../controleurs/adminManager.php');

$articleManager = new Article\ArticleManager($bdd);

$content = $articleManager->getContent($parseArticleId);
echo $content;
