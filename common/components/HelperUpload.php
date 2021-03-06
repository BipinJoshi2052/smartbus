<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */


    namespace common\components;

    use common\models\Blogs;
    use common\models\SliderImages;
    use Yii;
    use yii\base\Component;

    //use common\models\SliderImages;

    class HelperUpload extends Component {
        public static function upload($upload, $target_dir = '') {
            $target_dir = ($target_dir == '') ? Yii::$app->params['upload_path']['image'] : $target_dir;
            $filename = Misc::timestamp(date('Y-m-d H:i:s')) . substr($upload['name'], -5);
            $target_file = $target_dir . basename($filename);
            $uploadOk = 1;
            $error = '';

            if (isset($_POST["submit"])) {
                $check = getimagesize($upload["tmp_name"]);
                if ($check !== FALSE) {
                    $error = "File is not an image.";
                    $uploadOk = 0;
                }
                else {
                    $error = "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($upload["size"] > Yii::$app->params['image_size']) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error

            if ($uploadOk == 0) {
                echo $error;
              //  die;
                return Yii::$app->session->setFlash('NotUploaded');
                // if everything is ok, try to upload file
            }
            else {
                if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                    return $filename;
                }
                else {
                    return FALSE;
                }
            }
            //die;
        }
        public static function uploadFile($upload) {

            // $target_dir = Yii::$app->params['upload_path']['image'];
            $target_dir = '../../common/assets/files/uploads/';
            $filename = Misc::timestamp(date('Y-m-d H:i:s')) . substr($upload["name"], -6);
            $target_file = $target_dir . basename($filename);
            $uploadOk = 1;
            $error = '';
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($upload["tmp_name"]);
                if ($check !== FALSE) {
                    $error = "File format not supported.";
                    $uploadOk = 0;
                }
                else {
                    $error = "File format not supported.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($upload["size"] > 10000000000000) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($FileType != "pdf" && $FileType != "docx") {
                $error = "Sorry, pdf and docx are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error

            if ($uploadOk == 0) {

                echo "Sorry, your file was not uploaded - " . $error;
                die;
                // if everything is ok, try to upload file
            }
            else {
                if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                    //echo "The file " . basename($upload["name"]) . " has been uploaded.";
                    return $filename;
                }
                else {
                    //return false;
                    echo "Sorry, there was an error uploading your file.";
                    die;
                }
            }
            //die;
        }


        function reArrayFiles(&$file_post) {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }

        public static function delete() {
            return;
        }
    }
