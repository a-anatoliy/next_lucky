<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 27.03.2018
 * Time: 21:07
 */

function print_menu($menu) {
    $buffer = null;
    foreach ($menu as $name => $link) {
        if (is_array($link)) {
            $buffer .= '<li>'.$name.'</li>';
            $buffer .= '<ul>'.print_menu($link).'</ul>';
        } else {
            $buffer .= '<li><a href="'.$link.'">'.$name.'</a></li>';
        }
    }
    return $buffer;
}

$menu = array (
    'Main'       => '#',
    'Games'      => array('Adventure'=>'#', 'RPG'=>'#', 'Race'=>'#', 'Strategy'=>'#'),
    'Soft'       => array('Buisiness'=>'#', 'Education'=>'#', 'Other'=>'#'),
    'Copyrights' => '#',
    'Contact'    => '#'
);

echo print_menu($menu);