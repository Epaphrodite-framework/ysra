<?php

declare(strict_types=1);

namespace bin\epaphrodite\Extension\Functions;

use bin\epaphrodite\Extension\Filters\SetTwigFilters;

class SetTwigFunctions extends SetTwigFilters
{

    /**
     * Return Qrcode datas
     * 
     * @param mixed $datas
     * @return string
     */
    public function QRcodes_twig($datas)
    {
        static::initNamespace()['qrcode']->GenerateQRCodeDatas($datas);
    }    

    /**
     * Generate Google Qrcode datas
     * 
     * @param mixed $datas
     * @return string
     */
    public function GoogleQRCodes_twig($datas){

        static::initNamespace()['qrcode']->GenerateGoogleQRCode($datas);
    }


    /**
     * Return input of token csrf
     * 
     * @return string
     */
    public function csrf_token_twig()
    {

        static::initNamespace()['crsf']->input_field();
    }

    /**
     * Return image paths
     * 
     */
    public function imagePath_twig($img)
    {

        echo static::initNamespace()['paths']->img($img);
    }

    /**
     * Return css paths
     * 
     */
    public function cssPath_twig($css)
    {

        echo static::initNamespace()['paths']->css($css);
    }

    /**
     * Return css paths
     * 
     */
    public function pdfPath_twig($pdf)
    {

        echo static::initNamespace()['paths']->pdf($pdf);
    }

    /**
     * Return css paths
     * 
     */
    public function cssfontPath_twig($css)
    {

        echo static::initNamespace()['paths']->font($css);
    }

    /**
     * Return css paths
     * 
     */
    public function cssiconfontPath_twig($css)
    {

        echo static::initNamespace()['paths']->icofont($css);
    }

    /**
     * Return bootstrap icon paths
     * 
     */
    public function cssbsicontPath_twig($css)
    {

        echo  static::initNamespace()['paths']->bsicon($css);
    }

    /**
     * Return javascript paths
     * 
     */
    public function jsPath_twig($js)
    {

        echo  static::initNamespace()['paths']->js($js);
    }

    /**
     * Return javascript paths
     * 
     */
    public function mainPath_twig(?string $dir = null, ?string $page = null)
    {

        if (static::initNamespace()['session']->login() != false && static::initNamespace()['session']->id() != false) {

            echo  static::initNamespace()['paths']->admin($dir, $page);
        } else {

            echo  static::initNamespace()['paths']->main($dir);
        }
    }

    /**
     * Return javascript paths
     * 
     */
    public function mainidPath_twig(?string $folder = null, ?string $url = null, ?string $action = null, ?string $id = null)
    {

        if (static::initNamespace()['session']->login() != false && static::initNamespace()['session']->id() != false) {

            echo  static::initNamespace()['paths']->admin_id($folder, $url, $action, $id);
        } else {

            echo  static::initNamespace()['paths']->main($folder);
        }
    }


    /**
     * Return javascript paths
     * 
     */
    public function hostPath_twig()
    {
        if (static::initNamespace()['session']->login() != false && static::initNamespace()['session']->id() != false) {

            echo  static::initNamespace()['paths']->dashboard();
        } else {

            echo  static::initNamespace()['paths']->gethost();
        }
    }

    /**
     * Return previous page
     * 
     */
    public function previousPath_twig()
    {

        echo  static::initNamespace()['paths']->db();
    }

    /**
     * Return javascript paths
     * 
     */
    public function dbPath_twig()
    {

        echo  "";
    }

    /**
     * Return javascript paths
     * 
     */
    public function logoutPath_twig()
    {

        echo  static::initNamespace()['paths']->logout();
    }

    /**
     * Tronquer le nombre de mot du text ou de la phrase
     * @return string
     */
    public function truncatePath_twig($string, $limit)
    {

        return static::initNamespace()['env']->truncate($string, $limit);
    }


    public function replace_funct($search, $replace, $datas)
    {
        return str_replace($search, $replace, $datas);
    }

    /**
     * Explode and returne datas element
     * @return string
     */
    public function datasExplode(?string $datas = null, ?string $separator = '', ?int $nbre = 0)
    {

        return static::initNamespace()['env']->explode_datas($datas, $separator, $nbre);
    }

    public function ifformat_twig($num, $dec, $separator)
    {

        return static::initNamespace()['env']->nbre_format($num, $dec, $separator);
    }

    /**
     * Get message
     * @param string|error_text $msg
     * @return string
     */
    public function msgPath_twig(?string $msg = 'error_text')
    {

        return static::initNamespace()['msg']->answers($msg);
    }

    /**
     * Return login paths
     * 
     */
    public function login_twig()
    {

        echo  static::initNamespace()['session']->login();
    }

    /**
     * Return login paths
     * 
     */
    public function typeusers_twig()
    {

        echo  static::initNamespace()['session']->type();
    }

    /**
     * Return yedidiah paths
     * 
     */
    public function datas_twig(?string $key = null, ?string $value = null)
    {

        echo  NULL;
    }

    /**
     * Return login paths
     * 
     */
    public function menu_twig(?string $key = null)
    {

        return NULL;
    }

    /**
     * Return login paths
     * 
     */
    public function ifmodules_twig(?string $module = null)
    {

        echo  NULL;
    }
}