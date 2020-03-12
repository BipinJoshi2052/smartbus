<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author Chetan Rajbhandari
 */

namespace common\components;

use common\components\HelperContact as HContact;
use common\components\HelperWebsettings as WSettings;
use Yii;
use yii\bootstrap;
use yii\base\Component;
use yii\helpers\Html;


class Email extends Component {

    public static function sendTo($email, $name, $subject, $msg) {
        $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
        require_once($path);

        if (!empty(Yii::$app->params['email'])) {
            $mail = new \JPhpMailer();
            $mail->Host = Yii::$app->params['email']['Host'];
            $mail->Port = Yii::$app->params['email']['Port'];
            $mail->SMTPSecure = Yii::$app->params['email']['SMTPSecure'];
            $mail->SMTPAuth = Yii::$app->params['email']['SMTPAuth'];
            $mail->SMTPKeepAlive = Yii::$app->params['email']['SMTPKeepAlive'];
            $mail->SMTPDebug = Yii::$app->params['email']['SMTPDebug'];
            $mail->Mailer = Yii::$app->params['email']['Mailer'];
            $mail->CharSet = Yii::$app->params['email']['CharSet'];
            $mail->ContentType = Yii::$app->params['email']['ContentType'];
            $mail->IsHTML(true);

            $mail->From = Yii::$app->params['email']['From'];
            $mail->FromName = Yii::$app->params['email']['FromName'];
            $mail->Username = Yii::$app->params['email']['Username'];
            $mail->Password = Yii::$app->params['email']['Password'];
            $mail->AltBody = Yii::$app->params['email']['AltBody'];

            $mail->Subject = $subject;
            $mail->MsgHTML($msg . Yii::$app->params['email']['Signature']);
            $mail->AddAddress($email, $name);

            if ($mail->send()) {
                return true;
            }
        }
        return false; //$mail->ErrorInfo;
    }

    public static function sendFrom($email, $name, $subject, $msg) {
        $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
        require_once($path);

        if (!empty(Yii::$app->params['email'])) {
            $mail = new \JPhpMailer();
            $mail->Host = Yii::$app->params['email']['Host'];
            $mail->Port = Yii::$app->params['email']['Port'];
            $mail->SMTPSecure = Yii::$app->params['email']['SMTPSecure'];
            $mail->SMTPAuth = Yii::$app->params['email']['SMTPAuth'];
            $mail->SMTPKeepAlive = Yii::$app->params['email']['SMTPKeepAlive'];
            $mail->SMTPDebug = Yii::$app->params['email']['SMTPDebug'];
            $mail->Mailer = Yii::$app->params['email']['Mailer'];
            $mail->CharSet = Yii::$app->params['email']['CharSet'];
            $mail->ContentType = Yii::$app->params['email']['ContentType'];
            $mail->IsHTML(true);

            $mail->From = $email;
            $mail->FromName = $name;
            $mail->Username = Yii::$app->params['email']['Username'];
            $mail->Password = Yii::$app->params['email']['Password'];
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!!';

            $mail->Subject = $subject;
            $mail->MsgHTML($msg);
            $mail->AddAddress(Yii::$app->params['email']['from-email'], Yii::$app->params['email']['from-email-name']);

            if ($mail->send()) {
                return true;
            }
        }
        return false; //$mail->ErrorInfo;
    }

    public static function template($title, $msgbody) {
        return '<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic" rel="stylesheet" type="text/css">' .
                '<table style="width:50%; border-left:2px solid #2ecc71 ; border-right:2px solid #2ecc71; font: 400 14px/1.6em Lato, sans-serif;"  border="0" cellpadding="0" cellspacing="0">' .
                '<tbody>' .
                '<tr>' .
                '<td style="padding:30px; background:#2ecc71; color:#ffffff; font-size:16px; font-weight:600;">' .
                '<div style="float:left; display:inline-block;">' . '<img style="width: auto; height:50px;" src="' . Yii::$app->params['logo'] . '"/>' . '</div>' .
                '<div style="float:right; display:inline-block; margin-top:20px; font-size:16px; font-family: lato; font-weight:600;">' . $title . '</div>' .
                '</td>' .
                '</tr>' .
                '<tr>' .
                '<td style="text-align:center; padding:40px 30px; line-height:28px; color:#606366; font-size:13px; font-weight:400; font-family: lato; ">' .
                $msgbody .
                '</td>' .
                '</tr>' .
                '<tr>' .
                '<td  style="text-align:center; padding:10px 0 30px 0;  color:#606366; font-size:14px; font-weight:400">' .
                '<span style="padding:4px 20px;  font-family: lato; font-size: 13px;">Phone: ' .
                Yii::$app->params['phone'] .
                '</span>' .
                '<span style="padding:4px 10px;  font-family: lato; font-size: 13px;">Email: ' .
                '<a style=" text-decoration:none; color:#679EE8;  font-family: lato; font-size: 13px;" href="mailto:' .
                Yii::$app->params['supportEmail'] .
                '">' .
                Yii::$app->params['supportEmail'] .
                '</a>' .
                '</span>' .
                '<span style="padding:4px 10px;  font-family: lato; font-size: 13px;">Website: ' .
                '<a style=" text-decoration:none; color:#679EE8;  font-family: lato; font-size: 13px;" href="' .
                Yii::$app->params['contact']['url'] .
                '" target="_blank">' .
                Yii::$app->params['contact']['url'] .
                '</a>' .
                '</span>' .
                '</td>' .
                '</tr>' .
                '<tr>' .
                '<td style="text-align:center; padding:10px 30px; background:#2ecc71; color:#ffffff; font-size:12px; font-family: lato; font-weight:400">' .
                Yii::$app->params['contact']['name'] .
                ' <br/> ' .
                '<a style="text-decoration:none; color:#ffffff;  font-size:12px; font-family: lato; " target="_blank" href="' .
                Yii::$app->params['contact']['map'] .
                '">' .
                Yii::$app->params['contact']['address'] .
                ' (View Map)</a>' .
                '</td>' .
                '</tr>' .
                '</tbody>' .
                '</table>';
    }


    public static function template2($title, $msgbody, $contact) {
        return '<section style="margin:0; padding:20px 0; background-color:#EAF3FF;">
   <div style=" max-width: 625px;width: 100%; padding-left: 30px; padding-right: 30px; margin-left: auto;margin-right: auto;"  class="email-tem" >
      <div class="" >
         <table style=" border: 1px solid #58c9ee91; font: 400 14px/1.6em Lato, sans-serif; background: #eaf3ff;"   border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
               <td style="padding:20px 30px; background:#ffffff; color:#58c9ee; font-size:16px; font-weight:600;">
                  <div style="float:left; display:inline-block;"> <img style="width: auto; height:50px;" src="' . Yii::$app->params['logo'] . '"/> </div>
              
              <div style="  padding: 5px 0 30px 0; float: right" >
        <a href="http://smartbus.ritechsolution.com/site/login" style="text-decoration: none; font-size: 24px; font-weight: 600; color: #58c9ee; "> Login</a>
                  </div>
                                    </td>
            </tr>
            <tr>
               <td style="font-size:13px; text-align:center; padding:20px 30px; line-height:19px;color:#606366; font-weight:400; font-family: lato;"  class="registration-details mar-20 " >
                  <div>
                     <p style="margin: 20px 0 " ><span style=" font-size: 24px; font-weight: 600; color: #58c9ee;"  >' . $title . '</span> </p>

                     <p style="margin: 20px 0 " >' . $msgbody . ' </p>' .

                '</div>
               </td>
            </tr>
            <tr>
            <td style="font-size:13px; text-align:center; padding:20px 30px; line-height:19px;color:#606366; font-weight:400; font-family: lato;"  class="registration-details mar-20 " >
            <div>
            <p style="margin: 20px 0 " > This message is autogenerated please do not reply. Regards!</p>
            </div>
            </td>
</tr>
            <tr>
               <td style="font-size:13px; text-align:center;  padding:10px 0 30px 0; color:#606366; font-weight:400 "  >
                  <span style="  padding:4px 20px; font-family: lato; font-size: 13px;" >Phone : ' . Yii::$app->params['phone'] . '</span>
                  <span style="  padding:4px 20px; font-family: lato; font-size: 13px;" >Email : '
                . '<a href="' . Yii::$app->params['supportEmail'] . '">' . Yii::$app->params['supportEmail'] . '  </a>' .
                '</span>
                <span style="  padding:4px 20px; font-family: lato; font-size: 13px;" >Website : '
                . ' <a href="http://smartbus.ritechsolution.com/" style="text-decoration: none; font-size: 13px; ">www.smartbus.com </a>' .
                '</span>' .
                '</td>' .
                '</tr>' .
                '<tr>' .
                '<td style="text-align:center; padding:10px 30px; background:#5da6da; color:#ffffff; font-size:12px; font-family: lato; font-weight:400">' .
                '<a href=""  style="text-decoration:none; cursor:pointer; color:#ffffff;  font-size:12px; font-family: lato; " target="_blank">
           ' . Yii::$app->params['supportEmail'] .
                ' </a>' . '</td>
            </tr>  
            </tbody>
            </table>
      
    </div>
     

    </div>
</section>';
    }
}