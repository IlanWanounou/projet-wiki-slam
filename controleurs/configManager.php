<?php

namespace Services\Admin\Manager;

use Exception;
use Throwable;

abstract class ConfigManager {

    public static function uploadFavicon($image)
    {
        try {
            $target_file = '../favicon.ico';

            if (getimagesize(($image["tmp_name"]))) {
                if (move_uploaded_file(($image["tmp_name"]), $target_file)) {
                    return true;
                }
            }
        } catch (Throwable) {
            throw new Exception('error');
        }
        
    }

}
