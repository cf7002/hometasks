<?php

/* @var array $pca Project Configuration Array */

if (empty($pca['components'])) {
    new Exception('The project is not configured.', 500);
} else {
    foreach ($pca['components'] as $key => $value) {
        if (is_array($value)) {
            $path = "./components/";
            $arr_components[$key] = explode(STR_SEPARATOR, configBuilder([$key => $value], $path));
        } else {
            new Exception('Component configuration error.', 500);
        }
    }
}
