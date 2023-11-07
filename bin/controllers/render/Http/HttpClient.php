<?php

namespace bin\controllers\render\Http;


class HttpClient extends HttpRequest
{

    /**
     * @return mixed
     */
    public function HttpResponses():mixed
    {

        return  static::class('paths')->href_slug($this->ParseMethod());
    }

    /**
     * @return mixed
     */
    private function ParseMethod():mixed
    {

        return $this->HttpRequest() !=="/" && $this->HttpRequest()[-1] === "/" ? substr( $this->HttpRequest() , 1 ) : _DASHBOARD_;
    }

}