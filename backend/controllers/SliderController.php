<?php
    namespace backend\controllers;

    use common\components\Helper;
    use common\components\Helperslider;
    use common\components\Misc;
    use common\models\Slider;
    use Yii;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\Controller;



    class SliderController extends Controller {
          public $permissions;

        /**
         * {@inheritdoc}
         */
        public function behaviors() {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow'   => TRUE,
                        ],
                        [
//                            'actions' => ['logout', 'index'],
                            'allow'   => TRUE,
                            'roles'   => ['@'],
                        ],
                    ],
                ],
                'verbs'  => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        //                    'logout' => ['post'],
                    ],
                ],
            ];
        }
 /**
     * {@inheritdoc}
     */
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'error';
        }
        $this->permissions = Helper::checkAuthority(Yii::$app->controller->id, Yii::$app->controller->action->id);
        return parent::beforeAction($action);
    }
        /**
         * {@inheritdoc}
         */
        public function actions() {
            return [
                'error' => [
                    'class'  => 'yii\web\ErrorAction',
                    'layout' => 'error',
                ],
            ];
        }

        /**
         * Displays homepage.
         * @return string
         */
        public function actionIndex($id = '') {
            $id = Misc::decrypt($id);
            return $this->render('index', [
                'slider'   => Slider::find()->all(),
                'editable' => ($id > 0) ? Slider::findOne($id) : FALSE,
            ]);
        }

        public function actionUpdate() {

            $image = (isset($_FILES['image'])) ? $_FILES['image'] : [];
            if (isset($_POST['slider'])) {
                $updated = HelperSlider::set($_POST['slider'], $image);
                if ($updated != FALSE) {
                    Misc::setFlash('success', 'Slide Updated.');
                    //  return $this->redirect(Yii::$app->request->baseUrl . '/slider/edit/' . Misc::encrypt($updated['id']));
                }
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/slider/');
        }
        public function actionDelete()
        {

            if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
                return Helperslider::deleteSlider($_POST['id']);
            }
        }
    }
