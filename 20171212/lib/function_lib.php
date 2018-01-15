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

/**
 * @param $type
 * @param $text
 *
 * @return void
 */
function addMessage($type, $text)
{
    global $messages;

    $messages[$type][] = $text;
}

/**
 * @return string
 */
function showMessage()
{
    global $messages;

    $result = '';

    if (!empty($messages)) {
        foreach ($messages as $key => $value) {
            foreach ($value as $message) {
                $result .= sprintf("<div class='alert alert-%s alert-dismissible fade show' role='alert'>", $key);
                $result .= sprintf("<strong>%s!</strong> %s", ucfirst($key), $message);
                $result .= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                $result .= "<span aria-hidden='true'>&times;</span></button></div>";
            }
        }
    }
    return $result;
}

/**
 * @param string $path
 *
 * @return bool|resource
 */
function folderCheck($path)
{
    if (is_dir($path)) {
        if (!$dir_handle = opendir($path)) {
            addMessage(MSG_DANGER, 'Невозможно открыть указанный каталог.');
        } else {
            return $dir_handle;
        }
    } else {
        addMessage(MSG_DANGER,'Каталог не существует или отсутствует доступ к нему.');
    }

    return false;
}

/**
 * @param string $path
 * @param resource $dir_handle
 * @param string $pattern
 * @param bool $sort_desc
 *
 * @return array
 */
function folderScan($path, $dir_handle, $pattern, $sort_desc = false)
{
    $result = [];
    $pattern = "/{$pattern}/i";

    while (($entity = readdir($dir_handle)) !== false) {
        if (is_file($path . DIRECTORY_SEPARATOR . $entity)) {
            if (preg_match($pattern, $entity))
                $result[] = $entity;
        }
    }
    closedir($dir_handle);

    if ($sort_desc)
        rsort($result);

    return $result;
}

/**
 * @param $arr
 *
 * @return array
 */
function rebuildArray($arr)
{
    $result = [];
    foreach ($arr as $key_ext => $value_ext) {
        foreach ($value_ext as $key_int => $value_int) {
            $result[$key_int][$key_ext] = $value_int;
        }
    }

    return $result;
}

/**
 * @param integer $err_code
 *
 * @return string
 */
function getErrorText($err_code)
{
    $errors = [
        0 => 'There is no error, the file uploaded with success. ',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini. ',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ',
        3 => 'The uploaded file was only partially uploaded. ',
        4 => 'No file was uploaded. ',
        6 => 'Missing a temporary folder. ',
        7 => 'Failed to write file to disk. ',
        8 => 'A PHP extension stopped the file upload. '
    ];

    return array_key_exists($err_code, $errors) ? $errors[$err_code] : 'Unknown error. ';
}

/**
 * @param string $type
 *
 * @return string
 */
function getUserDir($type)
{
    switch ($type) {
        case SECTION_IMG:
            $dir = DIR_USER_IMG;
            break;
        default:
            $dir = DIR_USER_DOC;
    }
    return $dir;
}

/**
 * @param string $file_name
 *
 * @return string
 */
function checkType($file_name)
{
    global $pca;

    if (empty($pca['file_types']))
        new Exception('Error in configuring file types.', 500);

    $result = '';
    $file_type = mime_content_type($file_name);
    foreach ($pca['file_types'] as $key => $value) {
        foreach ($value as $type) {
            if ($type == $file_type) {
                $result = getUserDir($key);
                break 2;
            }
        }
    }

    return $result;
}

/**
 * @return string
 */
function getUniqueStr()
{
    return str_replace('.', '', uniqid(microtime(true), true));
}

/**
 * @param string $separator
 * @param string $section
 *
 * @return string
 */
function getListFileType($separator, $section = null)
{
    global $pca;

    $arr = [];
    if (empty($section)) {
        foreach ($pca['file_types'] as $file_type) {
            $arr = array_merge($arr, $file_type);
        }
    } else {
        $arr = $pca['file_types'][$section];
    }

    if (empty($arr))
        new Exception('Error in configuring file types.', 500);

    $result = implode($separator, array_keys($arr));

    return trim($result, $separator);
}
