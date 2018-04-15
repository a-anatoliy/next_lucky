<?php
/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 27.03.2018
 * Time: 21:01
 */

$items = array(
    (object) array( 'id' => 1155, 'name' => 'Первый уровень', 'parent' => 0,    'sublevel' => 0, ),
    (object) array( 'id' => 1157, 'name' => 'Подменю',        'parent' => 1155, 'sublevel' => 1, ),
    (object) array( 'id' => 4,    'name' => 'Подменю',        'parent' => 1155, 'sublevel' => 1, ),
    (object) array( 'id' => 1,    'name' => 'Главная',        'parent' => 0,    'sublevel' => 0, ),
    (object) array( 'id' => 1156, 'name' => 'Помощь!!!',      'parent' => 0,    'sublevel' => 0, )
);


foreach ($items as $item) {
    $item->subs = array();
    $indexedItems[$item->id] = $item;
}

$topLevel = array();


foreach ($indexedItems as $item) {
    if ($item->parent == 0) {
        $topLevel[] = $item;
    } else {
        $indexedItems[$item->parent]->subs[] = $item;
    }
}

function renderMenu($items) {
    $render = "<ul>\r\n";

    foreach ($items as $item) {
        if (!$item->subs && !$item->sublevel)
            $render .= "<li class=''>\r\n";
        else
            $render .= "<li>\r\n";
        $render .= "<a href=''><span>{$item->name}</span></a>\r\n";
        if (!empty($item->subs)) {
            $render .= renderMenu($item->subs);
        }
        $render .= "</li>\r\n";
    }

    return $render . "</ul>\r\n";
}

echo renderMenu($topLevel);

