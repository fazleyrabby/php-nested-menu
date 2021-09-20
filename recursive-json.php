<?php

$json = '[{"icon":"menu1","name":"menu1","children":[{"icon":"menu1sub","name":"menu1sub","children":[{"icon":"menu1subsub","name":"menu1subsub"}]}]},{"icon":"menu2","name":"menu2","children":[{"icon":"menu2sub","name":"menu2sub"}]},{"icon":"menu3","name":"menu3"}]';

$menu = json_decode($json, JSON_PRETTY_PRINT);
// echo "<pre>";
// print_r($menu);
echo renderMenu($menu);

function renderMenu($array){
    $html = '<ul>';
    foreach($array as $item){
        $class = isset($item['children']) ? 'dropdown' : '';
        $html .= '<li class='.$class.' > <a>' . $item['name'] . '</a>';
        if(isset($item['children'])) $html .= renderMenu($item['children']);
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}
