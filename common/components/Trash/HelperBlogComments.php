<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\components;

use common\components\HelperUpload as Upload;
use common\components\Query;
use common\models\BlogComments;
use common\models\User;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\base\Component;
use common\models\Blog;
use common\components\Misc;


class HelperBlogComments extends Component {


    public static function getBlog() {
        $blog = Blog::find()->all();
        return $blog;
    }

//    public static function getBlogComments($id) {
//        $blog_comments = Query::queryAll($sql);
//        return $blog_comments;
//    }

    public static function getSingleBlog($id) {
        $singleBlog= Blog::find()->
                where('id ='.$id)->
                with('category')->
                with('author')->
                with('blogComments')->
                asArray()->
                one();
        return $singleBlog;

    }

    public static function setBlogComments($post) {
        if (isset($post) && !empty($post)) {
            $admin = '';
            $model = new BlogComments();
            $user_id = $post['user_id'];
            if(!empty($user_id)) {
                $user_role = User::findOne($user_id);
                if($user_role['role']==1) {
                    $model -> is_verified =1;
                    $admin = 1;
                }
            }
            $model->blog_id = $post['blog_id'];
            $model->comment =$post['comment'];
            $model->name =$post['name'];
            $model->email =$post['email'];
            $model->phone =$post['phone'];
            $model->customer_id = $post['user_id'];
            if($model->save()){
                return $var =[
                        'blog_id' => $post['blog_id'],
                        'role' => $admin
                ];
            }
        }
        return false;
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


    public static function deleteBlog($id) {
        $model = Blog::findOne($id);
        if ($model->delete()) {
            return json_encode(true);
        }
        return json_encode(false);
    }


}
