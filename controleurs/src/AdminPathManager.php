<?php

namespace Controller\src\Admin\Path;

abstract class AdminPathManager
{

    public static function getCurrentPagePath()
    {
        $repertories = explode("/", $_SERVER['REQUEST_URI']);
        // Suppression de l'url du site et du /admin
        array_splice($repertories, 0, 2);
        while (isset($repertories[2])) {
            // On ne prend que les 2 premiers résultats
            unset($repertories[2]);
        }
        return preg_replace('/\?(.*)/', '', implode("/", $repertories));
    }
    public static function getCurrentPageConfig($pages)
    {
        foreach ($pages as $item) {
            if ($item['href'] == AdminPathManager::getCurrentPagePath()) {
                return $item;
            }
        }
        if (!isset($configPage)) {
            return $pages[0];
        }
    }
}
