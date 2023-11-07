<?php

namespace bin\epaphrodite\env\ImagesRessources;

class ImagesChecker extends InitImages
{


    /**
     * @param mixed $FirstImages
     * @param mixed $SecondImages
     * @param int|0 $nbre
     * @return false|void
     */
    protected function AllImagesCheker( $FirstImages , $SecondImages , $nbre )
    {
        $Extension = $this->InitExtension( $FirstImages , $SecondImages );

        if( $Extension !== false ){

            $result = $this->InitAllImages($FirstImages)->compareImages($this->InitAllImages($SecondImages), \Imagick::METRIC_MEANSQUAREERROR);
            $result[0]->setImageFormat($Extension);
    
            header("Content-Type: image/$Extension");
            echo $result[$nbre];
        }else{
            return false;
        }

    }

}