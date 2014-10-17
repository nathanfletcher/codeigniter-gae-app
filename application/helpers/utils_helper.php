<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('getFileMime')) {
    function getFileMime($file)
    {
        if (PHP_VERSION >= '5.3.0') {
            $file_info = new finfo(FILEINFO_MIME_TYPE);
            return $file_info->file($file);
        } else {
            return mime_content_type($file);
        }
    }
}

if (!function_exists('isValidImageExtension')) {
    function isValidImageExtension($file, $extensions)
    {
        $image_mimes = array(
            'image/jpeg' => 'jpg',
            'image/pjpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/png' => 'png',
        );
        $mime = $image_mimes[getFileMime($file)];
        return (array_search($mime, $extensions) > -1);
    }
}

if (!function_exists('getImageWidthAndHeight')) {
    function getImageWidthAndHeight($path)
    {
        $values = getimagesize($path);
        return array(
            "width" => $values[0],
            "height" => $values[1]
        );
    }
}

if (!function_exists('getCaptcha')) {
    function getCaptcha()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/vendor/cool-php-captcha-0.3.1/captcha.php");
        $captcha = new SimpleCaptcha();
        $captcha->resourcesPath = $_SERVER['DOCUMENT_ROOT'] . "/vendor/cool-php-captcha-0.3.1/resources";
        $captcha->wordsFile = null;
        $captcha->imageFormat = 'png';
        return $captcha->CreateImage();
    }
}

if (!function_exists('hashIdsEncrypt')) {
    function hashIdsEncrypt($items, $min_length = null, $alphabet = null)
    {
        $result = array();
        foreach ($items as $item) {
            array_push($result, hashIdEncrypt($item, $min_length, $alphabet));
        }
        return $result;
    }
}

if (!function_exists('hashIdsDecrypt')) {
    function hashIdsDecrypt($items, $min_length = null, $alphabet = null)
    {
        $result = array();
        foreach ($items as $item) {
            array_push($result, hashIdDecrypt($item, $min_length, $alphabet));
        }
        return $result;
    }
}

if (!function_exists('hashIdPrepare')) {
    function hashIdPrepare($min_length = null, $alphabet = null)
    {
        $CI = &get_instance();
        $salt = $CI->config->item('hash-ids-salt');
        if (is_null($min_length)) {
            $min_length = $CI->config->item('hash-ids-min-length');
        }
        if (is_null($alphabet)) {
            $alphabet = $CI->config->item('hash-ids-alphabet');
        }
        require_once($_SERVER['DOCUMENT_ROOT'] . "/vendor/hashids-1.0.1/lib/Hashids/Hashids.php");
        return new Hashids\Hashids($salt, $min_length, $alphabet);
    }
}

if (!function_exists('hashIdEncrypt')) {
    function hashIdEncrypt($item, $min_length = null, $alphabet = null)
    {
        $hashIds = hashIdPrepare($min_length, $alphabet);
        return $hashIds->encode($item);
    }
}

if (!function_exists('hashIdDecrypt')) {
    function hashIdDecrypt($item, $min_length = null, $alphabet = null)
    {
        $hashIds = hashIdPrepare($min_length, $alphabet);
        return $hashIds->decode($item)[0];
    }
}

if (!function_exists('addHashIds')) {
    function addHashIds($items, $id = "id", $hash_id_label = "hash")
    {

        $ids = array();
        foreach ($items as $item) {
            array_push($ids, $item[$id]);
        }

        $hashIds = hashIdsEncrypt($ids);
        foreach ($items as $key => $item) {
            $items[$key][$hash_id_label] = $hashIds[0];
            array_splice($hashIds, 0, 1);
        }

        return $items;
    }
}