<?php

/**
 * @param array $arr_config
 * @param string $path
 *
 * @return string $str_compound
 */
function configBuilder(array $arr_config, $path)
{
    $str_compound = '';
    $folder = key($arr_config);

    foreach ($arr_config[$folder] as $key => $value) {
        if (is_array($value)) {
            $str_compound .= configBuilder([$key => $value],$path . $folder . '/');
        } else {
            if ($value === 'component.php') {
                $str_compound = $path . $folder . '/' . $value . STR_SEPARATOR . $str_compound;
            } else {
                $str_compound = $str_compound . $path . $folder . '/' . $value . STR_SEPARATOR;
            }
        }
    }

    return trim($str_compound, STR_SEPARATOR);
}

/**
 * @param $str
 *
 * @return null|string
 */
function checkRequest($str)
{
    return preg_replace('/[!?<>=:;.~@#$&{}()]+/', '', $str);
}

/**
 * @param array $items
 *
 * @return string
 */
function menuBuilder(array $items){
    $menu = ['<ul>'];
    foreach ($items as $item) {
        if(isset($item['items'])) {
            $submenu = menuBuilder($item['items']);
            $menu[] = "<li>{$item['title']}$submenu</li>";
        } else {
            $menu[] = "<li><a href='{$item['href']}'>{$item['title']}</a></li>";
        }
    }
    $menu[] = '</ul>';
    return implode('', $menu);
}
