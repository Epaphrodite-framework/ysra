<?php

namespace bin\epaphrodite\path;

class paths extends host
{

    /**
     * paths variables
     *
     * @var string $slug
     * @var string $path
     */
    private string $path;
    private string $slug;

    /**
     * Host link path
     *
     * @return mixed
     */
    public function gethost()
    {

        return $this->host();
    }

    /**
     * Logout
     */
    public function logout()
    {

        $this->path = $this->gethost() . 'logout/';

        return $this->path;
    }

    /**
     * Dashboard path link
     *
     * @param string $url|null
     * @return mixed
     */
    public function dashboard()
    {

        $this->path = $this->gethost() . 'dashboard/';

        return $this->path;
    }

    /**
     * Main path link
     *
     * @param string $link
     * @return mixed
     */
    public function main(string $link)
    {

        $this->path = $this->gethost() . 'views/' . $this->slug($link) . '/';

        return $this->path;
    }

    /**
     * Main path link
     *
     * @param string $link
     * @return mixed
     */
    public function previous()
    {

        $this->path = $_SERVER['HTTP_REFERER'];

        return $this->path;
    }

    /**
     * Main path link
     *
     * @param string $link
     * @return mixed
     */
    public function admin_referer(string $link)
    {

        $this->path = $link;

        return $this->path;
    }

    /**
     * Path main @id
     *
     * @param string $linkneeded
     * @param string $typeaction
     * @param integer $idneeded
     * @return mixed
     */
    public function main_id(?string $adminlinkneeded = null, ?string $typeaction = null, ?string $idneeded = null)
    {

        $this->path = $this->gethost() . 'admin-views/' . $adminlinkneeded . $typeaction . $idneeded;

        return $this->path;
    }

    /**
     * Admin link path
     *
     * @param string $url|null
     * @param string $folder|null
     * @return mixed
     */
    public function admin(?string $folder = null, ?string $url = null)
    {

        $this->path = $this->gethost() . $folder . '/' . $this->slug($url) . '/';

        return $this->path;
    }

    /**
     * Admin for @id
     *
     * @param string $url|null
     * @param string $action
     * @param string $id
     * @return mixed
     */
    public function admin_id(?string $folder = null, ?string $url = null, ?string $action = null, ?string $id = null)
    {

        $this->path = $this->gethost() . $folder . '/' . $this->slug($url) . '/' . $action . $id;

        return $this->path;
    }

    /**
     * db paths
     *
     * @return string
     */
    public function db()
    {

        $this->path = $this->gethost() . 'yedidiah/';

        return $this->path;
    }


    /**
     * images paths
     *
     * @param string $img
     * @return mixed
     */
    public function img(?string $img = NULL)
    {

        $this->path = $this->gethost() . 'static/img/' . $img;

        return $this->path;
    }

    /**
     * deleted images paths
     *
     * @param string $img
     * @return mixed
     */
    public function del_photos($img)
    {

        $this->path = $this->gethost() . 'bin/media' . $img;

        return $this->path;
    }

    /**
     * js paths
     *
     * @param string $js
     * @return mixed
     */
    public function js(string $js)
    {

        $this->path = $this->gethost() . 'static/js/' . $js . '.js';

        return $this->path;
    }

    /**
     * css paths
     *
     * @param string $css
     * @return mixed
     */
    public function css(string $css)
    {

        $this->path = $this->gethost() . 'static/css/' . $css . '.css';

        return $this->path;
    }

    /**
     * bootstrap font paths
     *
     * @param string $css
     * @return mixed
     */
    public function font(string $css)
    {

        $this->path = $this->gethost() . 'static/font-awesome/css/' . $this->slug($css) . '.css';

        return $this->path;
    }

    /**
     * bootstrap font paths
     *
     * @param string $css
     * @return mixed
     */
    public function icofont(string $css)
    {

        $this->path = $this->gethost() . 'static/icofont/' . $css . '.css';

        return $this->path;
    }

    /**
     * bootstrap icon paths
     *
     * @param string $bsicon
     * @return string
     */
    public function bsicon(string $bsicon)
    {
        $this->path = $this->gethost() . 'static/bootstrap-icons/' . $bsicon . '.css';
        return $this->path;
    }

    /**
     * pdf files paths
     *
     * @param string $docs
     * @return string
     */
    public function pdf(?string $docs = null)
    {

        $this->path = $this->gethost() . 'static/docs/' . $docs;

        return $this->path;
    }

    /**
     * slug constructor
     *
     * @param string $string
     * @param string $delimiter
     * @return mixed
     */
    private function slug(string $string, string $delimiter = '-')
    {

        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $this->slug = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $this->slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $this->slug);
        $this->slug = strtolower($this->slug);
        $this->slug = preg_replace("/[\/_|+ -]+/", $delimiter, $this->slug);
        $this->slug = trim($this->slug, $delimiter);
        setlocale(LC_ALL, $oldLocale);

        return $this->slug;
    }

    /**
     * slug constructor for href
     *
     * @param string $string
     * @param string $delimiter
     * @return mixed
     */
    public function href_slug(string $string, string $delimiter = '_')
    {

        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $this->slug = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $this->slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $this->slug);
        $this->slug = strtolower($this->slug);
        $this->slug = preg_replace("/[\%<>_|+ -]+/", $delimiter, $this->slug);
        $this->slug = trim($this->slug, $delimiter);
        setlocale(LC_ALL, $oldLocale);

        return $this->slug;
    }
}
