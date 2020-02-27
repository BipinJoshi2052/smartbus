<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\components;

use common\components\HelperUpload as Upload;
use common\components\Query;
use common\models\Advertisement;
use common\models\generated\BlogComments;
use common\models\User;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\base\Component;
use common\models\Blog;
use common\components\Misc;


class HelperAdd extends Component {


    public static function getAdd() {
        $add = Advertisement::find()->orderBy(['id'=>SORT_DESC])->all();
        return $add;
    }

    //    public static function getBlogComments($id) {
    //        $blog_comments = Query::queryAll($sql);
    //        return $blog_comments;
    //    }

    public static function getSingleAdd($id) {
        $singleBlog= Advertisement::find()->
        where('id ='.$id)->
        asArray()->
        one();
        return $singleBlog;

    }

    public static function setAdd($post, $image) {
        if (empty($post['id'])) {
            $model = new Advertisement();
            //name
            $model->name = $post['name'];
            //alt_text
            $model->alt_text = $post['alt_text'];
            //title
            $model->title = $post['title'];
            //price
            $model->price = $post['price'];
            //post_content
            $model->content = $post['content'];
            //company
            $model->company = $post['company'];
            //contact person
            $model->contact_person = $post['contact_person'];
            //address
            $model->address = $post['address'];
            //phone
            $model->phone = $post['phone'];
            //phone
            $model->email = $post['email'];
            //is_active
            $model->is_active = $post['is_active'];
            //created_by
            $model->created_by = Yii::$app->user->identity->id;
            //created_on
            $model->created_on = date('Y-m-d H:i:s');
            //expiring_on
            $model->expiring_on = $post['expiring_on'];


            if ($model->save()) {
                $id = $model->id;
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Advertisement::findOne($id);
                        // Upload New file
                        $up = Upload::upload($file);

                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }

                    }
                }
                return $id;
            }
            return false;
        }

        else {
            $id = $post['id'];
            $model = Advertisement::findOne($id);
            //name
            $model->name = $post['name'];
            //alt_text
            $model->alt_text = $post['alt_text'];
            //title
            $model->title = $post['title'];
            //price
            $model->price = $post['price'];
            //post_content
            $model->content = $post['content'];
            //company
            $model->company = $post['company'];
            //contact person
            $model->contact_person = $post['contact_person'];
            //address
            $model->address = $post['address'];
            //phone
            $model->phone = $post['phone'];
            //phone
            $model->email = $post['email'];
            //is_active
            $model->is_active = $post['is_active'];
            //created_by
            $model->created_by = Yii::$app->user->identity->id;
            //created_on
            $model->created_on = date('Y-m-d H:i:s');
            //expiring_on
            $model->expiring_on = $post['expiring_on'];
            if ($model->save()) {
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Advertisement::findOne($id);
                        // Upload New file
                        $up = Upload::upload($file);

                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }

                    }
                }
                return $id;
            }else{
                echo '<pre>';
                print_r($model->getErrors());
                echo '</pre>';
                die;
            }

            return false;
        }
    }

    public static function getMessages() {
        $messages = Query::queryAll("SELECT * FROM messages ORDER BY created_on DESC");
        return Misc::exists($messages, false);
    }


    public static function getSingleMessage($id) {
        $message = Query::queryOne("SELECT * FROM messages as c WHERE c.id = $id");
        return Misc::exists($message, false);
    }

    public static function getCertainMessages($field, $value) {
        $data = Query::queryAll('SELECT * FROM  `messages` WHERE  `' . $field . '` = ' . $value);
        return Misc::exists($data, false);
    }


    public static function deleteAdd($id) {
        $model = Advertisement::findOne($id);
        if ($model->delete()) {
            return json_encode(true);
        }
        return json_encode(false);
    }
    public static function Status($id) {
        $newStat = Advertisement::find()->where('id =' . $id)->asArray()->one();
        return $newStat;
    }

    public static function setStatus($post) {

        $id = $post['id'];
        $model = Advertisement::findOne($id);
        $model->name = $post['name'];
        //alt_text
        $model->alt_text = $post['alt_text'];
        //title
        $model->title = $post['title'];
        //price
        $model->price = $post['price'];
        //post_content
        $model->content = $post['content'];
        //company
        $model->company = $post['company'];
        //contact person
        $model->contact_person = $post['contact_person'];
        //address
        $model->address = $post['address'];
        //phone
        $model->phone = $post['phone'];
        //phone
        $model->email = $post['email'];
        //is_active
        $model->is_active = $post['is_active'];
        //created_by
        $model->created_by = Yii::$app->user->identity->id;
        //created_on
        $model->created_on = date('Y-m-d H:i:s');
        //expiring_on
        $model->expiring_on = $post['expiring_on'];
        if ($model->save()) {
            if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                $file = $image;
                if ($id > 0) {
                    $model = Advertisement::findOne($id);
                    // Upload New file
                    $up = Upload::upload($file);

                    if ($up) {
                        $model->image = $up;
                        $model->save(false);
                    }

                }
            }
            return $id;
        }
    }


}
