<?php

namespace Services\Admin\Manager;

abstract class AdminManager {

    public static function getCurrentPagePath() {
        $repertories = explode("/", $_SERVER['REQUEST_URI']);
        array_splice($repertories, 0, 2);
        return preg_replace('/\?(.*)/', '', implode("/", $repertories));
    }
    public static function getCurrentPageConfig($pages ='t') {
        foreach ($pages as $item) {
            if ($item['href'] == AdminManager::getCurrentPagePath()) {
                return $item;
            }
        }
        if (!isset($configPage)) {
            return $pages[0];
        }
    }
}
