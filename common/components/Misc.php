<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Misc
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\Query as Query;
use common\models\generated\Moderation;
use common\models\generated\ModerationActions;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\HttpException;

class Misc extends Component {
    public static function getDbName() {
        return Yii::$app->params['dbname'];
    }
    public static function getNextId($table) {
        $expression = new \yii\db\Expression("`AUTO_INCREMENT`
                                                        FROM INFORMATION_SCHEMA.TABLES
                                                        WHERE TABLE_SCHEMA = '" . self::getDbName() . "' 
                                                        AND   TABLE_NAME   = '" . $table . "';");
        return (new \yii\db\Query)->select($expression)
                                  ->scalar();
    }

    public static function formatSchedulePrice($prices) {

        if (isset($prices) && $prices != '') {
            return self::json_decode($prices);
        }

        return false;
    }

    public static function formatScheduleRoute($schedule) {
        $s = $schedule;

        return $s;
    }

    public static function getClass($model) {
        $m = get_class($model);
        $c = explode('\\', $m);
        return end($c);
    }

    public static function secToHR($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return "$hours:$minutes";
    }

    public static function encrypt($str) {
        return self::encodeUrl($str);
        //        return ($str != '') ? (bin2hex($str)) : false;
        return ($str != '') ? (bin2hex($str)) : false;
    }

    public static function decrypt($str = '') {
        return self::decodeUrl($str);
        if ($str != '') {
            //  $str = self::decodeUrl($str);
            if ($str != '') {
                $m = pack('H*', $str);
                if (is_numeric($m)) {
                    return $m;
                }
            }
        }
        return false;
    }

    public static function getTime($x = '') {
        return ($x != '') ? date('Y-m-d H:i:s', strtotime($x)) : date('Y-m-d H:i:s');
    }

    public function getModelName($table_name) {

        // $table_name = 'first';// if name is single word then comment the next line
        $table_split = explode("_", $table_name);
        $model = ucfirst($table_split[0]) . ucfirst($table_split[1]);
        return $model;
    }


    /* public static function batchInsert($tableName, $data) {
         $modelName = "common\models\generated\\" . self::getModelName($tableName);
         $model = new $modelName;
         $model->attributes = $data;
         $columns = array_keys($model->attributes);
         $values = array_values($model->attributes);
         return Yii::$app->db
                 ->createCommand()
                 ->batchInsert($tableName, $columns, $values)
                 ->getRawSql();
     }*/

    public static function setFlash($type, $message) {
        $f = [];
        if (Yii::$app->session->hasFlash('flash')) {
            $f = json_decode(Yii::$app->session->getFlash('flash'), true);
        }
        array_push($f, ['message' => $message, 'type' => $type]);
        return Yii::$app->session->setFlash('flash', self::json_encode($f));
    }

    public static function encodeUrl($id) {
        $str = self::shuffle(4) . $id . self::shuffle(4);
        return $str;
    }

    public static function deleteImage($image, $path = '') {
        if ($path = '') {
            $path = Yii::$app->params['upload_path']['image'];
        }
        $file = $path . $image;
        if (file_exists($file)) {
            if (unlink($file)) {
                return true;
            }
        }
        return false;

    }

    public static function decodeUrl($str) {
        $id = substr($str, 4, -4);
        return $id;
    }

    public static function shuffle($length) {
        return substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), rand(0, 25), $length);
    }

    public static function forceLogout() {
        Yii::$app->user->logout();
        return Yii::$app->getResponse()
                        ->redirect(Yii::$app->getHomeUrl());
    }

    public static function throwException($code = 403, $msg = '') {
        throw new HttpException($code, Yii::t('app', Yii::$app->params['exceptions'][$code]));
    }


    public static function RUrl() {
        $digits = 4;
        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }

    //for model data in array format
    public static function model_to_list($model, $index, $value) {
        $array = '';
        if (self::if_exists_count($model)) {
            $mod = $model[0];
            if (self::if_exists($mod)) {
                if (($index === 'int' || self::if_exists($mod[$index])) && self::if_exists($mod[$value])) {
                    foreach ($model as $m) {
                        if ($index === 'int') {
                            $array[] = $m[$value];
                        }
                        else {
                            $array[$m[$index]] = $m[$value];
                        }
                    }
                }
            }
        }
        return $array;
    }

    public static function limit_text($text, $limit = '200', $includeTags = false) {
        if (!$includeTags) {
            $text = strip_tags($text);
        }
        if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit) . '...';
        }
        return $text;
    }

    public static function array_strip_tags($array) {
        $result = [];

        foreach ($array as $key => $value) {
            // Don't allow tags on key either, maybe useful for dynamic forms.
            $key = strip_tags($key);

            // If the value is an array, we will just recurse back into the
            // function to keep stripping the tags out of the array,
            // otherwise we will set the stripped value.
            if (is_array($value)) {
                $result[$key] = static::arrayStripTags($value);
            }
            else {
                // I am using strip_tags(), you may use htmlentities(),
                // also I am doing trim() here, you may remove it, if you wish.
                $result[$key] = trim(strip_tags($value));
            }
        }

        return $result;
    }

    public static function strip_tags($term) {
        return trim(strip_tags($term));
    }

    public static function clean_text($text) {
        return trim(preg_replace('/\s+/', ' ', $text));
    }

    public static function encrypt_text($value) {
        if (!$value) {
            return false;
        }
        $key = 'dxjrmP9yIe0X9zIaT0rRooZiPR9bIYZo';
        return utf8_encode(Yii::$app->security->encryptByKey($value, $key));
    }

    public static function decrypt_text($value) {
        if (!$value) {
            return false;
        }
        $key = 'dxjrmP9yIe0X9zIaT0rRooZiPR9bIYZo';
        return Yii::$app->security->decryptByKey(utf8_decode($value), $key);
    }

    public static function Ymd($date = '') {
        return date('Y-m-d', self::timestamp($date));
    }


    public static function timeDifference($date1, $date2) {
        return strtotime($date1) - strtotime($date2);
    }

    public static function positiveTimeDifference($date1, $date2) {
        $x = strtotime($date1);
        $y = strtotime($date2);
        if ($x < $y) {
            $tmp = $x;
            $x = $y;
            $y = $tmp;
        }
        return ($x - $y);
    }

    public static function convertToHoursMins($seconds, $format = '%02d : %02d') {
        $t = round($seconds);
        return sprintf($format, ($t / 3600), ($t / 60 % 60));
    }

    public static function timeDifferenceHr($date1, $date2) {
        return self::convertToHoursMins(self::positiveTimeDifference($date1, $date2));
    }

    public static function formatDate($date = '', $format = '') {
        if ($format == '') {
            $format = 'Y-m-d';
        }
        return date($format, self::timestamp($date));
    }

    public static function dmY($date = '') {
        return date('d-m-Y', ($date!='')?self::timestamp($date):date('Y-m-d H:i:s'));
    }

    public static function time($time) {
        return date('H:i:s', self::timestamp($time));

    }

    public static function time_Hia($time) {
        return date('H:i a', self::timestamp($time));

    }

    public static function time_His($time) {
        return date('H:i:s', self::timestamp($time));

    }

    public static function time_Hi($time) {
        return date('H:i', self::timestamp($time));

    }

    public static function dmYHia($date = '') {
        return date('d-m-Y H:i a', self::timestamp($date));
    }

    public static function date_HiaDdMy($date = '') {
        return date('H:i a D d-M-Y', self::timestamp($date));
    }

    public static function date_YmdHis($date = '') {
        return date('Y-m-d H:i:s', self::timestamp($date));
    }

    public static function date_dmYHis($date = '') {
        return date('d-m-Y H:i:s', self::timestamp($date));
    }

    public static function date_DdmY($date = '') {
        return date('D, d M, Y', self::timestamp($date));
    }

    public static function timestamp($date = '') {
        return !empty($date) ? strtotime($date) : time();
    }

    public static function add_days($days, $date = '') {
        $old_date = !empty($date) ? $date : date('Y-m-d');
        return date('Y-m-d', strtotime($old_date .  $days . ' days'));
    }

    public static function add_datetime($days, $date = '') {
        $old_date = !empty($date) ? $date : date('Y-m-d H:i:s');
        return date('Y-m-d H:i:s', strtotime($old_date . ' + ' . $days . ' days'));
    }

    public static function json_encode($value) {
        return JSON::encode($value);
    }

    public static function json_decode($value, $asArray = true) {
        return JSON::decode($value, $asArray);
    }

    public static function exists($value, $alt = '') {
        return (isset($value) && !empty($value) && $value != null) ? $value : $alt;
    }

    public static function exists_count($value, $alt = '') {
        return (isset($value) && !empty($value) && count($value) > 0 && $value != null) ? $value : $alt;
    }

    public static function if_exists($value) {
        return (isset($value) && !empty($value) && $value != null) ? true : false;
    }

    public static function if_exists_count($value) {
        return (isset($value) && !empty($value) && count($value) > 0 && $value != null) ? true : false;
    }

    public static function is_value_exists($needle, $haystack) {
        if (in_array($needle, $haystack)) {
            return true;
        }
        foreach ($haystack as $element) {
            if (is_array($element) && self::is_value_exists($needle, $element)) {
                return true;
            }
        }
        return false;
    }

    public static function array_to_json($array) {
        if (!is_array($array)) {
            return false;
        }

        $associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
        if ($associative) {

            $construct = [];
            foreach ($array as $key => $value) {

                // We first copy each key/value pair into a staging array,
                // formatting each key and value properly as we go.
                // Format the key:
                if (is_numeric($key)) {
                    $key = "key_$key";
                }
                $key = "\"" . addslashes($key) . "\"";

                // Format the value:
                if (is_array($value)) {
                    $value = self::array_to_json($value);
                }
                else {
                    if (!is_numeric($value) || is_string($value)) {
                        $value = "\"" . addslashes($value) . "\"";
                    }
                }

                // Add to staging array:
                $construct[] = "$key: $value";
            }

            // Then we collapse the staging array into the JSON form:
            $result = "{ " . implode(", ", $construct) . " }";
        }
        else { // If the array is a vector (not associative):
            $construct = [];
            foreach ($array as $value) {

                // Format the value:
                if (is_array($value)) {
                    $value = self::array_to_json($value);
                }
                else {
                    if (!is_numeric($value) || is_string($value)) {
                        $value = "'" . addslashes($value) . "'";
                    }
                }

                // Add to staging array:
                $construct[] = $value;
            }

            // Then we collapse the staging array into the JSON form:
            $result = "[ " . implode(", ", $construct) . " ]";
        }

        return $result;
    }

    public static function rand_char($length) {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= chr(mt_rand(33, 126));
        }
        return $random;
    }

    public static function json_file_parse($path, $file) {
        return file_get_contents($path . $file);
    }

    public static function add_into_json($json, $value) {
        $array = self::json_decode($json);
        if ($array != null && !in_array($value, $array)) {
            array_push($array, $value);
            return self::json_encode($array);
        }
        return $json;
    }

    public static function remove_from_json($json, $value) {
        $array = self::json_decode($json);
        if ($array != null && in_array($value, $array)) {
            array_splice($array, array_search($value, $array));
            return self::json_encode($array);
        }
        return $json;
    }

    public static function file_exists($filename, $type) {
        return (file_exists(Yii::$app->params['upload_path'][$type] . $filename)) ? true : false;
    }

    public static function delete_file($filename, $type) {
        if (self::file_exists($filename, $type)) {
            unlink(Yii::$app->params['upload_path'][$type] . $filename);
            return true;
        }
        return false;
    }

    public static function uploadFile($file_data, $type) {
        $post = time();
        $target_dir = Yii::$app->params['upload_path'][$type];
        $basename = explode('.', basename($file_data["name"]));
        $name = '';

        foreach ($basename as $key => $base) {
            if ($key == count($basename) - 1) {
                $name .= $post . '.' . $base;
            }
            else {
                $name .= $base;
            }
        }
        $target_file = $name;
        //$target_file =  $basename[0] . '-' . $post . '.' . $basename[1];
        $orig_name = basename($file_data["name"]);
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_dir . $target_file)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return [
                    'uploaded'     => 'ERROR',
                    'upload_error' => 'Sorry, file already exists. Your file was not uploaded.',
            ];
            // if everything is ok, try to upload file
        }
        else {
            if (move_uploaded_file($file_data["tmp_name"], $target_dir . $target_file)) {
                if ($type != 'doc') {
                    self::resize($target_file, $type, true);
                }
                return [
                        'uploaded'  => 'OK',
                        'filename'  => $target_file,
                        'orig_name' => $orig_name,
                ];
            }
            else {

                $file_error = [
                        0 => "There is no error, the file uploaded with success",
                        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                        3 => "The uploaded file was only partially uploaded",
                        4 => "No file was uploaded",
                        6 => "Missing a temporary folder",
                ];

                return [
                        'uploaded'     => 'ERROR',
                        'upload_error' => $file_error[$_FILES['files']['error']],
                ];
            }
        }
        return [
                'uploaded'     => 'ERROR',
                'upload_error' => 'Sorry, your file was not uploaded.',
        ];
    }

    //create new image from the base64 encoded cropped image data
    public static function base64_to_jpeg($base64_string, $image_name, $type) {
        if (self::file_exists($image_name, $type)) {
            self::delete_file($image_name, $type);
        }

        $image = $image_name . '-' . time() . '.jpg';
        $output_file = Yii::$app->params['upload_path'][$type] . $image;
        $ifp = fopen($output_file, "wb");

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        self::resize($image, $type, true);

        return $image;
    }

    public static function check_image_extension($image) {
        $extensions = ['jpg', 'png', 'gif', 'jpeg'];

        $extension = strtolower(end(explode('.', $image)));
        if (in_array($extension, $extensions)) {
            return $extension;
        }
        return false;
    }

    public static function resize($image, $type, $crop = false) {
        $ext = self::check_image_extension($image);

        $newname = Yii::$app->params['upload_path'][$type] . $image;
        $thumb_name = Yii::$app->params['upload_path']['temp'] . $image;

        if (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext)) {
            $src_img = imagecreatefromjpeg($newname);
        }

        if (!strcmp("png", $ext)) {
            $src_img = imagecreatefrompng($newname);
        }

        if (!strcmp("gif", $ext)) {
            $src_img = imagecreatefromgif($newname);
        }

        //gets the dimmensions of the image
        list($width, $height) = getimagesize($newname);
        $new = Yii::$app->params['crop_size'];

        if ($width < $height) {
            $ratio = $width / $new['width'];
            $thumb_width = $new['width'];
            $thumb_height = $height / $ratio;
        }
        else {
            $ratio = $height / $new['height'];
            $thumb_height = $new['height'];
            $thumb_width = $width / $ratio;
        }

        // we create a new image with the new dimmensions
        $dst_img = ImageCreateTrueColor($thumb_width, $thumb_height);

        $x = 0;
        $y = 0;
        // resize the big image to the new created one
        $x = 0;
        $y = 0;
        imagecopyresampled($dst_img, $src_img, 0, 0, $x, $y, $thumb_width, $thumb_height, $width, $height);

        if (!strcmp("png", $ext)) {
            imagepng($dst_img, $thumb_name);
            return ($crop == true) ? self::crop($image) : true;
        }
        elseif (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext)) {
            imagejpeg($dst_img, $thumb_name);
            return ($crop == true) ? self::crop($image) : true;
        }
        elseif (!strcmp("gif", $ext)) {
            imagegif($dst_img, $thumb_name);
            return ($crop == true) ? self::crop($image) : true;
        }
        return false;
    }

    public static function crop($image) {
        $ext = self::check_image_extension($image);

        $thumb_name = Yii::$app->params['upload_path']['thumb'] . $image;
        $newname = Yii::$app->params['upload_path']['temp'] . $image;

        if (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext)) {
            $src_img = imagecreatefromjpeg($newname);
        }

        if (!strcmp("png", $ext)) {
            $src_img = imagecreatefrompng($newname);
        }

        if (!strcmp("gif", $ext)) {
            $src_img = imagecreatefromgif($newname);
        }

        //gets the dimmensions of the image
        list($width, $height) = getimagesize($newname);
        $new = Yii::$app->params['crop_size'];

        if ($width > $height) {
            $x = ($width - $new['width']) / 2;
            $y = 0;
        }
        else {
            $x = 0;
            $y = ($height - $new['height']) / 2;
        }

        //echo $x; echo "/"; echo $y; echo "/"; echo $width; echo "/"; echo $height;

        // we create a new image with the new dimmensions
        $dst_img = ImageCreateTrueColor($new['width'], $new['height']);

        // resize the big image to the new created one
        imagecopyresampled($dst_img, $src_img, 0, 0, $x, $y, $new['width'], $new['height'], $width, $height);

        if (!strcmp("png", $ext)) {
            imagepng($dst_img, $thumb_name);
            self::delete_file($image, 'temp');
            return true;
        }
        elseif (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext)) {
            imagejpeg($dst_img, $thumb_name);
            self::delete_file($image, 'temp');
            return true;
        }
        elseif (!strcmp("gif", $ext)) {
            imagegif($dst_img, $thumb_name);
            self::delete_file($image, 'temp');
            return true;
        }
        return false;
    }

    public static function get_url() {
        $path = $_SERVER['REQUEST_URI'];
        $url_array = explode("/", $path);
        $url_count = count($url_array);
        if ($url_array[$url_count - 1] == "") {
            $url_array[$url_count - 1] = "index.php";
        }
        $url_array = array_slice($url_array, -3, $url_count);
        $url = '';
        foreach ($url_array as $uri) {
            $url .= $uri . '/';
        }
        $url = trim($url);
        return $url;
    }

    public static function getMessages($field, $value) {
        $data = Query::queryAll('SELECT * FROM  `message` WHERE  `' . $field . '` = ' . $value);
        return self::exists($data, false);
    }

    public static function getClientRequest($field = '', $value = '') {
        $sql = "SELECT *  FROM `client_request` " . 'WHERE `' . $field . '` = ' . $value . " ORDER BY `id` DESC";
        $data = Query::queryAll($sql);
        return $data;
    }

    public static function getPriceTable($route) {
        $array = [];

        foreach ($route as $location) {

            if ((isset($location['is_boarding']) && $location['is_boarding'] == 1) || (isset($location['is_dropping']) && $location['is_dropping'] == 1)) {
                array_push($array, $location);
            }
        }
        return $array;
    }


}
