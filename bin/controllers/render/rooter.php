<?php

namespace bin\controllers\render;

use bin\controllers\render\Twig\TwigRender;
use bin\epaphrodite\heredia\SettingHeredia;

class rooter extends TwigRender
{

    private array $content = [];
    private string $target;
    private object $setting;

    public function __construct()
    {
        $this->setting = new SettingHeredia;
    }

    /**
     * target
     *
     * @param array $target
     * @return self
     */
    public function target(string $target):self
    {

        $this->target =  $target;

        return $this;
    }

    /**
     * Find content
     *
     * @param array $InitContent
     * @param bool|false $switch
     * @return self
     */
    public function content( $InitContent = [] , ?bool $switch = false ):self
    {

        $GetLayoutsContent = $this->GetLayouts($switch, $InitContent);

        $init = $switch === true ? $this->setting->AdminInitMainLayouts() : $this->setting->MainUserInitLayouts();
        
        $this->content = array_merge( $InitContent , $GetLayoutsContent , $init );

        return $this;
    }    

    /**
     * run page
     *
     * @return self
    */    
    public function get():void
    {
        
        $this->render( "{$this->target}" , $this->content );
    }

    /**
     * Verify if loyaut exist in content array
     * @return bool
     */
    public function CheckLayout($content = []){

        return array_key_exists("layouts",$content);
    }

    /**
     * @return array
     */
    public function GetLayouts( $Switch , $content = []){

        if($Switch===false && $this->CheckLayout($content)!==true){ $content = $this->setting->MainLayout(); }
       
        if($Switch===true && $this->CheckLayout($content)!==true){ $content =  $this->setting->AdminLayout(); }

        return $content;
    }
}