<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 27.03.2018
 * Time: 21:17
 */

$menu = array(
    array( 'title' => 'Home page', 'url' => 'home.php' ),
    array( 'title' => 'Item 1',    'url' => '#',
            'items' => array(
                array('title' => 'Subitem 1','url' => 'subitem.php')
            )
    )
);

function print_list($list) {
    echo '<ul>';
    foreach($list as $list_item) {
        echo '<li>';
        echo "<a href='{$list_item['url']}'>{$list_item['title']}</a>";
        if (array_key_exists('items', $list_item) && is_array($list_item['items']))
            print_list($list_item['items']);
        echo '</li>';
    }
    echo "</ul>";
}
