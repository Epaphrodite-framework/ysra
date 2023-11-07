<?php declare(strict_types=1);

namespace bin\controllers\render\Http;

class ConfigHttp extends HttpClient
{

    /**
     * @param null|array $url
     * @return string 
    */    
    protected function provider(?array $url = null):string
    {

        return static::class('session')->id() !== NULL && count($url) > 1 ? $url[0] . '/' . $url[1] . _MAIN_EXTENSION_ : $url[1] . _MAIN_EXTENSION_;
    }

    /**
     * @return string
     */
    protected function ParseMethod(){

        return $this->HttpRequest() !=="/" && $this->HttpRequest()[-1] === "/" ? substr( $this->HttpRequest() , 1 ) : _DASHBOARD_;
    }
  

}