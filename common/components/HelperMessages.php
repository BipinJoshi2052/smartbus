<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */


    namespace common\components;

    use common\models\Messages;
    use Yii;
    use yii\base\Component;


    class HelperMessages extends Component
    {
        public static function getCount()
        {
            $count_unseen =Messages::find()->where(['=','is_new','1'])->count();
            $count_seen =Messages::find()->where(['=','is_new','0'])->count();
            Yii::$app->params['count_messages']['count_unseen'] = $count_unseen;
            return $count=[
                    'count_unseen' => $count_unseen,
                    'count_seen' => $count_seen,
//                    'count_all' => $count_all,
            ];
        }
        public static function update($message)
        {
            $model = new Messages;
            $model->attributes = $message;
            if ($model->save()) {
//                $subject = 'New Message Received';
//                $title = 'Message Received at ' . date('l jS M Y h:i:s A');
//                $msgBody = '<ul style="text-align:left; list-style-type: none; padding:0;">' .
//                    '<li style="padding:0; margin:0; font-family: lato; font-size: 13px;"><strong>Name:</strong> ' . $message['name'] . '</li>' .
//                    '<li style="padding:0; margin:0; font-family: lato; font-size: 13px;"><strong>Phone:</strong> ' . $message['phone'] . '</li>' .
//                    '<li style="padding:0; margin:0; font-family: lato; font-size: 13px;"><strong>Email:</strong> ' . $message['email'] . '</li>' .
//                    '</ul>' .
//                    '<p style="padding:30px 0; text-align: justify; text-justify: inter-word; font-family: lato; font-size: 13px;">' . $message['message'] . '</p>';
//                $msg = Email::template($title, $msgBody);
//                Email::sendTo(Yii::$app->params['contact']['receive_email'], Yii::$app->params['contact']['receive_name'], $subject, $msg);
                return Yii::$app->session->set('alert', json_encode(array(
                    'title' => 'Success',
                    'type' => 'success',
                    'text' => 'Your Message Has been sent.',
                )));
            }
            return Yii::$app->session->set('alert', json_encode(array(
                'title' => 'Oops',
                'type' => 'error',
                'text' => 'Sorry! couldn\'t send your message. Please try again.',
            )));
        }

        public static function getMessages()
        {
            $messages = Query::queryAll("SELECT * FROM messages ORDER BY created_on ASC");
            return Misc::exists($messages, FALSE);
        }


        public static function getSingleMessage($id)
        {
            $message = Query::queryOne("SELECT * FROM messages as c WHERE c.id = $id");
            return Misc::exists($message, FALSE);
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
