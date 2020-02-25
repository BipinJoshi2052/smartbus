<?php


namespace common\components;

use common\components\HelperUpload as Upload;
use common\components\Query;
use common\models\BlogCategories;
use common\models\generated\BlogComments;
use common\models\User;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\base\Component;
use common\models\Blog;
use common\components\Misc;
use yii\data\Pagination;


class HelperBlog extends Component {


    public static function getBlog() {
        $blog = Blog::find()->with('category')->all();
        return $blog;
    }

    public static function getSingleBlog($id) {
        $singleBlog = Blog::find()
                          ->where('id = ' . $id)
                          ->with('category')
                          ->with('author')
                          ->with('blogComments')
                          ->asArray()
                          ->one();
        return $singleBlog;
    }

    public static function getSingleBlogUser($id) {
        $blog = Blog::find()
                    ->where(['id' => $id])
                    ->with('author')
                    ->with('blogComments')
                    ->asArray()
                    ->all();
        return $blog;
    }

    public static function setBlog($post, $image) {
        if (empty($post['id'])) {
            $model = new Blog;
            //category
            $model->category_id = $post['category_id'];
            //slug
            $title = str_replace(' ', '-', strtolower($post['title']));
            $model->slug = $title;
            //title
            $model->title = $post['title'];
            //subtitle
            $model->subtitle = $post['subtitle'];
            //post_content
            $model->post_content = $post['post_content'];
            //is_active
            $model->is_active = $post['is_active'];
            //created_by
            $model->created_by = Yii::$app->user->identity->id;
            //updated_on
            $model->updated_on = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->save()) {
                $id = $model->id;
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Blog::findOne($id);
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
            $model = Blog::findOne($id);

            //category
            $model->category_id = $post['category_id'];
            //slug
            $title = str_replace(' ', '-', strtolower($post['title']));
            $model->slug = $title;
            //title
            $model->title = $post['title'];
            //subtitle
            $model->subtitle = $post['subtitle'];
            //post_content
            $model->post_content = $post['post_content'];
            //is_active
            $model->is_active = $post['is_active'];
            //updated_on
            $model->updated_on = date('Y-m-d H:i:s');
            //updated_by
            $model->updated_by = Yii::$app->user->identity->id;

            if ($model->save()) {
                if (isset($image['name']) && strlen(trim($image['name'])) > 0) {
                    $file = $image;
                    if ($id > 0) {
                        $model = Blog::findOne($id);
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
    }

    public static function getCategories() {
        $blog = BlogCategories::find()->all();
        return $blog;
    }

    public static function deleteBlog($id) {
        $model = Blog::findOne($id);
        if ($model->delete()) {
            return json_encode(true);
        }
        return json_encode(false);
    }

    public static function setBlogComments($post) {
        if (isset($post) && !empty($post)) {
            $admin = '';
            $model = new \common\models\BlogComments();
            $user_id = $post['user_id'];
            if (!empty($user_id)) {
                $user_role = User::findOne($user_id);
                if ($user_role['role'] == 1) {
                    $model->is_verified = 1;
                    $model->edited_status = 1;
                    $admin = 1;
                }
                        $model->blog_id = $post['blog_id'];
                        $model->comment = $post['comment'];
                        $model->name = $post['name'];
                        $model->email = $post['email'];
                        $model->phone = $post['phone'];
                        $model->customer_id = $post['user_id'];
                        if ($model->save()) {
                            return $var = [
                                    'blog_id' => $post['blog_id'],
                                    'role'    => $admin
                            ];
                        }
                    }
                }
                return false;
            }

    //Blog Categories

    public static function getSingleCat($id) {

        $singleCat = BlogCategories::find()->where('id =' . $id)->asArray()->one();
        return $singleCat;
    }

    public static function getBlogCategories() {
        $categories = BlogCategories::find()->orderBy(['id' => SORT_DESC])->all();
        return Misc::exists($categories, false);
    }

    public static function setCat($data) {
        if (empty($data['id'])) {
            $model = new BlogCategories();
            $model->name = $data['name'];
            $model->remark = $data['remark'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                return $model->id;
            }
        }
        else {
            $id = $data['id'];
            $model = BlogCategories::findOne($id);
            $model->name = $data['name'];
            $model->remark = $data['remark'];
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                return $model->id;
            }
            else {
                echo '<pre>';
                print_r($model->getErrors());
                echo '</pre>';
                die;
            }
        }


    }

    public static function deleteBlogCategory($id) {
        $model = BlogCategories::findOne($id);

        return $model->delete() ? json_encode(true) : json_encode(false);
    }

    public static function setComment($blog) {
        if (!empty($blog)) {
            $model = new \common\models\BlogComments();
            $model->blog_id = $blog['id'];
            $model->comment = $blog['contact_message'];
            $model->name = $blog['contact_name'];
            $model->email = $blog['contact_email'];
            $model->phone = $blog['contact_phone'];
            $model->customer_id = Yii::$app->user->identity->id;
            $model->save();
        }
        return false;
    }

    public static function getSiteBlog() {
        $blog = Blog::find()->limit(3)->orderBy(['id' => SORT_DESC])->all();
        return $blog;
    }
    public static function Status($id)
    {
        $newStat = Blog::find()->where('id ='. $id)->asArray()->one();
        return $newStat;
    }
    public static function setStatus($post) {

        $id = $post['id'];
        $model = Blog::findOne($id);
        //category
        $model->category_id = $post['category_id'];
        //slug
        $title = str_replace(' ', '-', strtolower($post['title']));
        $model->slug = $title;
        //title
        $model->title = $post['title'];
        //subtitle
        $model->subtitle = $post['subtitle'];
        //post_content
        $model->post_content = $post['post_content'];
        //is_active
        $model->is_active = $post['is_active'];
        //updated_on
        $model->updated_on = date('Y-m-d H:i:s');
        //updated_by
        $model->updated_by = Yii::$app->user->identity->id;
        if($model->save())
        {
                return true;
        }
    }
}
