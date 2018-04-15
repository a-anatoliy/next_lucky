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
        $this->id       = $parent->model;
        $this->lang     = $parent->lang;
        $this->langPack = $parent->langPack;
        $this->pageIDs  = $parent->cfg["menu_items"];
        $this->langIDs  = $parent->langIDs;
//        $this->media    = $parent->media;

        $this->ul_open  = '<ul class="navbar-nav">';
        $this->ul_close = '</ul>';
        $this->li_open  = '<li class="nav-item">';
        $this->activeHrefStr = '<a class="nav-link active-link" href="%s">%s</a>';
//echo '<pre>obj: '; var_dump($this->langIDs); echo '</pre>';
    }

    public function renderBase() {
//        $separator = "\n\t";
        $separator = " ";
        $outString = $this->ul_open;

        foreach ($this->pageIDs as $id => $itemProp) {
            $pageTitle = $this->langPack["pages"][$id];

            if (array_key_exists('items',$itemProp)) {
                $outString .= $separator
                    . '<li class="nav-item dropdown">'
//                    . $separator
                    . '<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">'
                    .     $pageTitle
                    . '</a>'
                    . '<div class="dropdown-menu" aria-labelledby="Preview">'
                    .     $this->buildDropDown($id,$itemProp['items'])
                    . '</div></li>';
                continue;
            } else {
                if ($itemProp["href"] === $this->id) {
                    $format = $this->activeHrefStr;
                    $url = '#top';
                } else {
                    $format = '<a class="nav-link" href="/%s">%s</a>';
                    $url = $itemProp["href"];
                }
            }

            $outString .= $this->li_open . sprintf($format, $url, $pageTitle) . "</li>";

        }
        $outString .= $this->ul_close;
        return $outString;
    }

    public function renderLangs() {
        $outString = $this->ul_open;
        foreach ($this->langIDs as $lang) {
            if ($lang === $this->lang) {
                $format = $this->activeHrefStr;
                $url = '#top';
            } else {
                $format = '<a class="nav-link" href="%s">%s</a>';
                $url = sprintf("/%s/%s",$this->id,$lang);
            }
            $outString .= $this->li_open . sprintf($format, $url, $lang) . "</li>";
        }

        $outString .= $this->ul_close;
        return $outString;
    }


    private function buildDropDown($parentID,$items) {
        $outStr=''; // $separator="\n\t";
        $separator=" ";
        $format = '<a class="dropdown-item" href="/media/%s/%s">%s</a>';

        foreach ($items as $cID => $item) {
            $id = $parentID.$cID;
            $outStr.= $separator . sprintf($format,$this->lang,$item,$this->langPack["pages"][$id]);
        }
        return $outStr;
    }

}


