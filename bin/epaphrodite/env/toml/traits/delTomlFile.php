<?php

namespace bin\epaphrodite\env\toml\traits;

trait delToTomlFile
{
    protected $section;
    protected $propriete;

    public function __construct($section = null) {
        $this->section = $section;
        $this->propriete = [];
    }

    public static function sections($section) {
        return new self($section);
    }

    public function param($propriete) {
        $this->propriete = is_array($propriete) ? $propriete : [$propriete];
        return $this;
    }

    public function del($cheminFichier) {
        $contenu = file_get_contents($cheminFichier);

        if ($this->section !== null) {
            $pattern = '/\[' . $this->section . '\]\s*(.*?)\n(\[\[.*?\]\]|\[.*?\]|$)/s';
            preg_match($pattern, $contenu, $matches);

            if (isset($matches[1])) {
                $sectionContent = $matches[1];
                foreach ($this->propriete as $prop) {
                    $contenu = preg_replace('/' . $prop . '\s*=\s*.*(\n|$)/', '', $sectionContent);
                }
            }
        }

        file_put_contents($cheminFichier, $contenu);
    }
}