<?php

namespace bin\epaphrodite\env;

use bin\epaphrodite\env\config\GeneralConfig;
use bin\epaphrodite\define\config\traits\currentFunctionNamespaces;

class env extends GeneralConfig
{

    use currentFunctionNamespaces;

    private string $chaine_translate;

    /**
     * 
     * @param string|null $string
     * @param int|100 $limit
     * @param string $separator
     * @param string $tail
     * 
     * @return string
     *  */
    public function truncate(?string $string = null, int $limit = 100, string $separator = '...', string $tail = '')
    {
        if (strlen($string) > $limit) {
            $string = wordwrap($string, $limit, "\n");
            $string = explode("\n", $string, 2);
            $string = $string[0];
            $string = rtrim($string, " .\t\n\r\0\x0B") . $separator . $tail;
        }
    
        return $this->chaine($string);
    }
    
    /** 
    * @param mixed $date
    **/
    public function date_chaine($date)
    {
        $formatter = new \IntlDateFormatter( 'fr_FR.utf8' , \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);

        $timestamp = strtotime($date);

        return $formatter->format($timestamp);
    }

    /**
     * @param mixed $date
     * @return void
     */
    public function LongDate($date)
    {

        $dateTime = new \DateTime($date);

        $formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::MEDIUM);

        $dateLong = $formatter->format($dateTime);

        echo $dateLong;
    }

    /**
     * Transform to ISO code
     * @param string|null $chaine
     * 
     * @return mixed
     */
    public function chaine(?string $chaine = null)
    {
        if (empty($chaine)) {
            return null;
        }
    
        return match(true) {
            (bool)preg_match('/&#039;/', $chaine) => str_replace('&#039;', "'", $chaine),
            (bool)preg_match('/&#224;/', $chaine) => str_replace('&#224;', 'à', $chaine),
            (bool)preg_match('/&#225;/', $chaine) => str_replace('&#225;', 'á', $chaine),
            (bool)preg_match('/&#226;/', $chaine) => str_replace('&#226;', 'â', $chaine),
            (bool)preg_match('/&#227;/', $chaine) => str_replace('&#227;', 'ã', $chaine),
            (bool)preg_match('/&#228;/', $chaine) => str_replace('&#228;', 'ä', $chaine),
            (bool)preg_match('/&#230;/', $chaine) => str_replace('&#230;', 'æ', $chaine),
            (bool)preg_match('/&#231;/', $chaine) => str_replace('&#231;', 'ç', $chaine),
            (bool)preg_match('/&#232;/', $chaine) => str_replace('&#232;', 'è', $chaine),
            (bool)preg_match('/&#233;/', $chaine) => str_replace('&#233;', 'é', $chaine),
            (bool)preg_match('/&#234;/', $chaine) => str_replace('&#234;', 'ê', $chaine),
            (bool)preg_match('/&#235;/', $chaine) => str_replace('&#235;', 'ë', $chaine),
            (bool)preg_match('/&#238;/', $chaine) => str_replace('&#238;', 'î', $chaine),
            (bool)preg_match('/&#239;/', $chaine) => str_replace('&#239;', 'ï', $chaine),
            (bool)preg_match('/&#244;/', $chaine) => str_replace('&#244;', 'ô', $chaine),
            (bool)preg_match('/&#251;/', $chaine) => str_replace('&#251;', 'û', $chaine),
            (bool)preg_match('/&amp;/', $chaine) => str_replace('&amp;', '&', $chaine),
            default => $chaine,
        };
    }
    

    /**
     * For transcoding values in an Excel generated (french)
     *
     * @param string $chaine
     * @return string
     */
    public function translate_fr(string $chaine)
    {

        $this->chaine_translate = iconv('Windows-1252', 'UTF-8//TRANSLIT', $chaine);

        return $this->chaine_translate;
    }

    /**
     * @param array|[] $target
     * @param array|[] $files
     * @return bool
     */
    public function UplaodFiles(?array $target = [], ?array $files = []): bool
    {
        foreach ($files as $key => $value) {

            move_uploaded_file($this->GetFiles($key), $target[$key] . '/' . $value);
        }

        return true;
    }

    /**
     * Clean directory
     *
     * @param string $Directory
     * @param string $Extension
     * @return bool
     */
    public function DeleteDirectoryFiles(string $Directory, string $Extension)
    {

        if (is_dir($Directory) === true) {

            array_map('unlink', glob($Directory . '*' . $Extension));
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete specific file
     *
     * @param string $Directory
     * @param string $FileName
     * @return bool
     */
    public function DeleteFiles(string $Directory, string $FileName)
    {

        if (file_exists($Directory . $FileName) === true) {

            unlink($Directory . $FileName);
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @param string $chaines|null
     * @return string
     */
    public function no_space($chaines)
    {
        return str_replace(' ', '', $chaines);
    }

    /**
     * Formar
     */
    public function nbre_format($num, $dec, $separator)
    {

        return $num !== null ? number_format($num, $dec, ',', ' ') : 0;
    }

    /**
     *
     * @param string $chaines|null
     * @return string
     */
    public function reel(?string $chaines = null)
    {

        $chaines = str_replace(' ', '', $chaines);

        return str_replace(',', '.', $chaines);
    }


    /**
     * Export data in json type
     * @param array|null $datas
     * @return mixed
     */
    public function e_json(?array $datas = [])
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
        return json_encode($datas, JSON_PRETTY_PRINT);
    }
    

    /**
     *
     * @param string $chaines|null
     * @return string
     */
    public function explodeDatas(?string $datas = null, ?string $separator = '', ?int $nbre = 0)
    {

        $chaines = explode($separator, $datas);

        return $chaines[$nbre];
    }

    /**
     * Date format
     */
    public function DateFormat($StringDate)
    {

        if (!empty($StringDate)) {
            $CreateDate = date_create($StringDate);

            return date_format($CreateDate, 'Y-m-d');
        } else {
            return null;
        }
    }

    /**
     * @return string
     */
    public function strpad($number, $pad_length, $pad_string)
    {
        return str_pad($number, $pad_length, $pad_string, STR_PAD_LEFT);
    }

    /**
     * To use this function, you must install python 3
     * and run this command "pip install pycryptodome"
     * @param null|string $value
     * @param null|string $type
     * @return mixed
     */
    public function pyEncryptDecrypt( ?string $value , ?string $type ){

        return static::initConfig()['python']->executePython( $type , [ 'value' => $value ]);
    }

    /**
     * To use this function, you must install python 3
     * and run this command "pip install pytesseract"
     * E.g : $imgPath = $_FILES['file']['tmp_name']
     * @param mixed|null $imgPath
     * @return mixed
     */
    public function pyConvertImgToText( $imgPath ){

       return static::initConfig()['python']->executePython( 'convert_img_to_text' , [ "img" => $imgPath ]);
    }

    /**
     * To use this function, you must install python 3
     * and run this commande "pip install PyPDF2"
     * E.g : $imgPath = $_FILES['file']['tmp_name']
     * @param mixed|null $pdfPath
     * @return mixed
     */
    public function pyConvertPdfToText( $pdfPath ){

        return static::initConfig()['python']->executePython( 'convert_pdf_to_text' , [ "pdf" => $pdfPath ]);
     }    
}
