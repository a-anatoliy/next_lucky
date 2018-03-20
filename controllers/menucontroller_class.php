<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 13.02.2018
 * Time: 17:03
 */

//namespace MainController;

defined('_ATHREERUN') or die('Ай-яй-яй, сюда нельзя!');

class MenuController  {

    public function __construct($parent) {
        $this->id      = $parent->model;
        $this->lang    = $parent->lang;
        $this->pageIDs = $parent->pageIDs;
        $this->langIDs = $parent->langIDs;
        $this->media   = $parent->media;
//echo '<pre>obj: '; var_dump($parent); echo '</pre>';
    }

    public function buildMenu() {

    $outString = '<nav class="navbar navbar-expand-sm navbar-light bg-faded justify-content-between text-uppercase"><div class="collapse navbar-collapse" id="nav-content"><ul class="navbar-nav">';
    $outString .= $this->getElements('page');

    $outString .=   '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        galleries
                      </a><div class="dropdown-menu" aria-labelledby="Preview">';

        $outString .= $this->buildMediaMenu();

    $outString .= '</div></ul></div><div class="collapse navbar-collapse justify-content-end" id="nav-content"><ul class="navbar-nav">';
    $outString .= $this->getElements('lang');
    $outString .= '</ul></div></nav>';
    return $outString;
    }

    private function getElements($part) {
        $outString     = "<li class=\"nav-item\">";
        $activeHrefStr = '<a class="nav-link active-link" href="%s">%s</a>';
        $arrName = $part."IDs";
        foreach ($this->$arrName as $dest) {
            if ($dest == $this->id || $dest == $this->lang) {
                $format = $activeHrefStr;
                $url = '#top';
            } else {
                $format = '<a class="nav-link" href="/%s">%s</a>';
                $url = $dest;
            }
            $outString .= sprintf($format, $url, $dest) . "</li>\n";
        }

        return $outString;
    }

    private function buildMediaMenu() {
        $outStr=""; $format = '<a class="dropdown-item" href="/media/%s/%s">%s</a>';
        foreach ($this->media as $gallery) {
            $outStr.= sprintf($format,$this->lang,$gallery,$gallery);
        }
        return $outStr;
    }

}