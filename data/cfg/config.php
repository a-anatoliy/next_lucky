<?php 
return array(
    'db' => array(
        'host' => '',
        'user' => '',
        'pass' => '',
        'name' => '' ,
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
//	'to'   => '',
//  'bcc'  => '',
     'bcc' => '',
     'to'  => '',
	'from' => '',
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
