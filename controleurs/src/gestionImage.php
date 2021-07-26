<?php

namespace gestion;

class gestionImage
{

    public function getSizeFolder($folder) {
        $size = 0;

        $files = glob($folder.'*');

        foreach ($files as $taille) {
            if ($files != '.' && $files != '..') {
                $size += filesize($taille);
            }
        }
        return $this->convertByteToKilobyte($size);

    }

    private function convertByteToKilobyte($byte) {
        return round($byte/1024,2);
    }

    public function isFolderEmpty($folder) {
        return glob($folder."*");
    }


    public function deleteImage($url) {
        unlink($url);

    }
    public function deleteAllImage($folder) {
        $îmages = glob($folder.'*');
        foreach ($îmages as $image) {
            unlink($image);
        }

    }

}
