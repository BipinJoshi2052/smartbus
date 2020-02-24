<?php

namespace common\components;


use common\models\BlogComments;
use common\models\VerificationActions;
use Yii;
use yii\base\Component;

class Verification extends Component {
    public function init() {
        parent::init();
    }

    //actions
    public static function getActions() {
        return VerificationActions::find()->with('verifieduser')->with('requesteduser')->asArray()->orderBy(['id' => SORT_DESC])->all();
    }

    public static function getSingleAction($id) {
        $actions = VerificationActions::find()
                                      ->where(['id' => $id])
                                      ->with('requesteduser')
                                      ->with('verifieduser')
                                      ->asArray()
                                      ->one();
        return $actions;
    }

    public static function verifyAction($verify) {

        $id = $verify['id'];
        $model = VerificationActions::findOne($id);
        //verification comment
        $model->verification_comment = $verify['verification_comment'];
        //edited status
        $model->edited_status = 1;
        //verification status
        $model->verification_status = $verify['verified'];
        //Verified on
        $model->verified_on = date('Y-m-d H:i:s');
        //Verified by
        $model->verified_by = Yii::$app->user->identity->id;

        if ($model->save()) {
            $m = Yii::$app->params['modelpath'] . ucwords($verify['table_name']);
            $model2 = $m::find()->where('id=' . $verify['table_id'])->one();
            $model2->is_verified = $verify['verified'];
            if ($model2->save(false)) {
                return $model->id;
            }
        }
        else {
            return false;
        }

    }
    //actions
    //comment
    public static function getComments() {
        return BlogComments::find()->with('blog')->with('verifieduser')->with('requesteduser')->asArray()->orderBy(['id' => SORT_DESC])->all();
    }

    public static function getSingleComment($id) {
        $actions = BlogComments::find()
                               ->where(['id' => $id])
                               ->with('blog')
                               ->with('requesteduser')
                               ->with('verifieduser')
                               ->asArray()
                               ->one();
        return $actions;
    }

    public static function verifyComment($verify) {
        $id = $verify['id'];
        $model = BlogComments::findOne($id);
        //verification comment
        $model->verification_comment = $verify['verification_comment'];
        //edited status
        $model->edited_status = 1;
        //verification status
        $model->is_verified = $verify['verified'];
        //Verified on
        $model->verified_on = date('Y-m-d H:i:s');
        //Verified by
        $model->verified_by = Yii::$app->user->identity->id;

        if ($model->save()) {
            return $model->id;
        }
        else {
            return false;
        }


    }
    //comment

}