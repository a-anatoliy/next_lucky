<?php 
return array(
    'db' => array(
        'host' => '23159.m.tld.pl',
        'user' => 'admin23159_lucky_dress',
        'pass' => 'v4320942VV',
        'name' => 'baza23159_lucky_dress' ,
    ),
    'site' => array(
        'url'     => 'http://lucky-dress.eu/',
    	'defLang' => 'pl',
        'imgIndex' => '/data/imgIndex.csv',
    ),
    'stat' => array(
        'OK_mail'   => '/data/ok_requests.txt',
        'FAIL_mail' => '/data/bad_requests.txt',
        'hits'      => '/data/hitcount.txt',
    ),
 'form' => array(
//	'to'   => 'a3three@gmail.com',
//  'bcc'  => 'olyusya932@gmail.com',
     'bcc' => 'athree@protonmail.com',
     'to'  => 'apanolga@gmail.com',
	'from' => 'info@lucky-dress.eu',
    ),
    'menu_items' => array(
        1 => array('href' => 'home'   ),
        2 => array('href' => 'about'  ),
        3 => array('href' => 'contact'),
        5 => array('href' => 'media'  )
//        5 => array('href' => 'galleries', 'items' => array( 1=>'001',2=>'002' ) ),
    ),
    'mediaDirs' => array(
            "other"=>"_other",
             "misc"=>"_design",
              "g18"=>"2018",
              "g17"=>"2017"),
);
