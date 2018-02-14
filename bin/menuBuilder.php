<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 13.02.2018
 * Time: 17:03
 */
class menuBuilder {

    private function init($id,$lang) {
        $this->pageIDs = array('home','about','contact');
        $this->langIDs = array('en','pl','ru');
        $this->page = $id;
        $this->lang = $lang;
    }

    public function buildMenu($id,$lang) {
        $this->init($id,$lang);

        echo '
            <nav class="navbar navbar-expand-sm navbar-light bg-faded justify-content-between text-uppercase">
                <div class="collapse navbar-collapse" id="nav-content">
                  <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link pgr-20" href="/"> home </a></li>
                    <li class="nav-item"><a class="nav-link pgr-20" href="/about"> about </a></li>
                    <li class="nav-item"><a class="nav-link pgr-20 active-link" href="/contact"> contact </a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        galleries
                      </a>
                      <div class="dropdown-menu" aria-labelledby="Preview">
                        <a class="dropdown-item" href="/2016">2016</a>
                        <a class="dropdown-item" href="/2017">2017</a>
                        <a class="dropdown-item" href="/2018">2018</a>
                      </div>
                  </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="nav-content">
                  <ul class="navbar-nav">
                      <li class="nav-item"><a class="nav-link active-link" href="/pl">pl</a></li>
                      <li class="nav-item"><a class="nav-link" href="/en">en</a></li>
                      <li class="nav-item"><a class="nav-link" href="/ru#">ru</a></li>
                    </li>
                  </ul>
                </div>
            </nav>
            ';
    }
}