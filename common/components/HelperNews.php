<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 * @author Chetan Rajbhandari
 */

namespace common\components;


use common\models\NewsCategories;
use Yii;
use common\models\News;
use common\components\HelperUpload as Upload;
use common\models\Settings;
use yii\base\Component;

class HelperNews extends Component {

    public $this;
    public $id;


    public static function getNews() {
        $news = News::find()->all();
        return $news;
    }

    public static function getSingleNews($id) {

        $singleNews = News::find()->
        where('id =' . $id)->
        asArray()->
        WITH('author')->
        one();
        return $singleNews;
    }

    public static function set($data, $image = '') {
        if ($data['post']['id'] != '') {
            $id = $data['post']['id'];
            $model = News::findOne($id);
            $slug = str_replace(' ', '-', strtolower($data['post']['title']));
            $model->title = $data['post']['title'];
            $model->slug = $slug;
            $model->post_content = $data['post']['post_content'];
            $model->subtitle = $data['post']['subtitle'];
            $model->category_id = $data['post']['category_id'];
            $model->is_active = $data['post']['is_active'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                $id = $model->id;

                if (isset($image['name']) && $image['name'] != '') {
                    if ($id > 0) {
                        $newfile = $image;
                        $up = Upload::upload($newfile);

                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }
                    }
                }

            }


        }
        else {
            $slug = str_replace(' ', '-', strtolower($data['post']['title']));

            $model = new News;

            $model->title = $data['post']['title'];
            $model->slug = $slug;
            $model->post_content = $data['post']['post_content'];
            $model->subtitle = $data['post']['subtitle'];
            $model->category_id = $data['post']['category_id'];
            $model->is_active = $data['post']['is_active'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;


            if ($model->save()) {
                $id = $model->id;
                if (isset($image['name']) && $image['name'] != '') {
                    $newfile = $image;
                    if ($id > 0) {
                        $model = News::findOne($id);
                        $up = Upload::upload($newfile);
                        if ($up) {
                            $model->image = $up;
                            $model->save(false);
                        }
                    }
                }

            }
            else {
                echo '<pre>';
                print_r($model->getErrors());
                echo '</pre>';
                die;
            }

        }
    }
    public static function deleteNews($id) {
        $model = News::findOne($id);
        return $model->delete() ? json_encode(true) : json_encode(false);
    }

    //News Category
    public static function getNewsCat() {
        $newsCat = NewsCategories::find()->all();
        return $newsCat;
    }

    public function getSingleCat($id) {

        $singleCat = NewsCategories::find()->where('id =' . $id)->one();
        return $singleCat;
    }

    public static function getCategories() {
        $categories = NewsCategories::find()->orderBy(['id'=>SORT_DESC])->all();
        return Misc::exists($categories, false);
    }

    public static function setCat($data) {
        if (empty($data['post']['id'])) {
            $model = new NewsCategories();
            $model->name = $data['post']['name'];
            $model->remark = $data['post']['remark'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {
                return true;
            }
        }
        else {
            $id = $data['post']['id'];
            $model = NewsCategories::findOne($id);
            $model->name = $data['post']['name'];
            $model->remark = $data['post']['remark'];
            $model->created_by = Yii::$app->user->identity->id;
            $model->updated_by = Yii::$app->user->identity->id;
            if ($model->save()) {

            }
        }


    }

    public static function deleteNewsCategory($id) {
        $model = NewsCategories::findOne($id);
        return $model->delete() ? json_encode(true) : json_encode(false);
    }
    public static function getSiteNews()
    {
        $news = News::find()->limit(3)->orderBy(['id'=>SORT_DESC])->all();
        return $news;
    }
}

