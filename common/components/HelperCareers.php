<?php


namespace common\components;

use common\components\HelperUpload as Upload;
use common\components\Query;
use common\models\BlogCategories;
use common\models\Careers;
use common\models\generated\BlogComments;
use common\models\User;
use common\models\Vacancy;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\base\Component;
use common\models\Blog;
use common\components\Misc;
use yii\data\Pagination;


class HelperCareers extends Component {
    public static function getApplicants() {
        $model = Careers::find()->asArray()->orderBy('created_on DESC')->all();

        return $model;
    }

    public static function getVacancy() {
        $model = Vacancy::find()->asArray()->all();
        return $model;
    }

    public static function getSingleApplicants($id) {
        $model = Careers::find()->where('id = ' . $id)->one();
        $model->is_new = 1;
        if ($model->save()) {
            return $model;
        }
        return false;
    }

    public static function getSingle($id) {
        $model = Vacancy::find()->where('id = ' . $id)->asArray()->one();
        return $model;
    }

    public static function getCount() {
        $count_unseen = Careers::find()->where(['=', 'is_new', '0'])->count();
        $count_seen = Careers::find()->where(['=', 'is_new', '1'])->count();

        Yii::$app->params['count_application'] = $count_unseen;
        return $count = [
                'count_unseen' => $count_unseen,
                'count_seen'   => $count_seen,
                //                    'count_all' => $count_all,
        ];
    }

    public static function setVacancy($data) {
        if ($data['id'] != '') {
            $id = $data['id'];
            $model = Vacancy::findOne($id);
            $model->title = $data['title'];
            $model->description = $data['description'];
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $model;
            }

        }
        else {
            $model = new Vacancy();
            $model->title = $data['title'];
            $model->description = $data['description'];
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $model;
            }

        }
    }

    public static function deleteVacancy($id) {
        $model = Vacancy::findOne($id);
        if ($model->delete()) {
            return json_encode(true);
        }
        return json_encode(false);
    }

    public static function Status($id) {
        $newStat = Vacancy::find()->where('id =' . $id)->asArray()->one();
        return $newStat;
    }

    public static function setStatus($data) {
        $id = $data['id'];
        $model = Vacancy::findOne($id);
        $model->updated_on = date('Y-m-d H:i:s');
        $model->is_active = $data['is_active'];
        if ($model->save()) {
            return $model;
        }
        echo '<pre>';
        print_r($model->getErrors());
        echo '</pre>';
        die;

    }

    public static function setApplication($post, $file='') {

        $model = new Careers();
        $model->attributes =$post;
        if ($model->save()) {

            if (isset($file['name']) && strlen(trim($file['name'])) > 0) {
                $docfile = $file;
                $go = Upload::uploadFile($docfile);
            }
            if ($go) {
                $model->file = $go;
                $model->save(false);
            }
            return true;
        }
      else {
        return false;
        }
//        echo '<pre>';
//        print_r($model->getErrors());
//        echo '</pre>';
//        die;
    }


}

