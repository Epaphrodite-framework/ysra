<?php

namespace bin\epaphrodite\env\ImagesRessources;

use bin\epaphrodite\env\config\GeneralConfig;

class InitImages{

        /**
     * Check if parameter is Imagick object, if not load from string file path
     *
     * @param  Imagick|string  $image
     * @return Imagick
     */
    protected function InitAllImages($image)
    {
        if(is_string($image))
        {
            return new \Imagick($image);
        }
        elseif ($image instanceof \Imagick)
        {
            return $image;
        }
        else
        {
            throw new \Exception('Image input must be Imagick object or string path ('.gettype($image).' sent)');
        }
    }


    protected function InitExtension(  $FirstImages , $SecondImages  ){

        $FirstExtension = (new GeneralConfig)->EndFiles($FirstImages , '.');
        $SecondExtension = (new GeneralConfig)->EndFiles($SecondImages , '.');

        return $FirstExtension === $SecondExtension ? $FirstExtension : false;

    }

}