<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */


    namespace common\components;

    use Yii;
    use yii\base\Component;
    use common\models\BlogCategories;
    use common\components\Query;
    use common\components\Misc;



    class HelperBlogCategories extends Component
    {

        public static function getCategories()
        {
            $categories = Query::queryAll("SELECT * FROM blog_categories ORDER BY name");
            return Misc::exists($categories, FALSE);
        }


        public static function getSingleCategory($id)
        {
            $categories = Query::queryOne("SELECT * FROM blog_categories as c WHERE c.id = $id");
            return Misc::exists($categories, FALSE);
        }

        public static function getCertainMessages($field, $value)
        {
            $data = Query::queryAll('SELECT * FROM  `messages` WHERE  `' . $field . '` = ' . $value);
            return Misc::exists($data, FALSE);
        }


        public static function deleteMessage($id)
        {
            $model = Messages::findOne($id);
            if ($model->delete()) {
                return json_encode(TRUE);
            }
            return json_encode(FALSE);
        }


    }
