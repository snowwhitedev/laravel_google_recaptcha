<?php
/**
 * Created by Ahmed Maher Halima.
 * Email: phpcodertop@gmail.com
 * github: https://github.com/phpcodertop
 * Date: 14/02/2019
 * Time: 09:00 م
 */
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if ($item['id'] == $needle){
            return true;
        }
    }

    return false;
}

function strip_tags_content($string) {
    return preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $string);
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function get_array_key_null($key, $array = [],$default = null)
{
    return array_key_exists($key, $array) ? $array[$key] : $default;
}