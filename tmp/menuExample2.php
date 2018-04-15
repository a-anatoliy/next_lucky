<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 27.03.2018
 * Time: 21:06
 */

function example($a,$pre=''){
    foreach ($a as $k=>$v){
        if (is_array($v)){
            echo "$pre$k =><br>\n";
            example($v,$pre.'-');
        }
        else echo "$pre$v<br>\n";
    }
}

$s=array('Меню 1',
    'Меню 2'=>array('Меню 2.1',
        'Меню 2.2'=>array('Меню 2.2.1','Меню 2.2.2'),
        'Меню 2.3'),
    'Меню 3');
example($s);
