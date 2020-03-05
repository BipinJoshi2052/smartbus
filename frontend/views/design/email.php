
  <style type="text/css">

  
 
    
    .header {
      width: 100%;
    }
    
    .header .social {
      text-align:right;
      vertical-align:middle;
    }
    
    .social-wrapper {
      width: 100%;
      display: table;
    }
    .social .link {
      font-size: 12px;
      line-height: 26px;
      letter-spacing:0.2px;
      color:#946099;
      display: table-cell;
      padding-right: 24px;
    }
    
    .social .icon {
      border-radius:50%;
      background-color: #0098C6;
      width: 30px;
      height: 30px;
      display: table-cell;
      text-align:center;
      vertical-align:middle;
    }
    
    .social .icon img {
      width: 14px;
      display: inline-block;
    }
    .social .divider {
      width: 6px;
    }
    
	  .intro {
      margin-top: 20px;
		  background-color:#fff;
      width: 100%;
      padding-top: 20px;
	  }
    
    .content {
      width:100%;
    }
    
    @media screen and (max-width: 550px) {
      .content .cell {
        display: block;
        width:100%;
      }
    }
    

    
    @media screen and (max-width: 550px) {
      .col-wrapper {
        width:100%;
      }
    }
    
    .cell h2 {
      color:#0098C6;
      font-weight:normal;
      font-size: 18px;
      line-height: 24px;
      letter-spacing:0.2px;
    }
    
    .footerlink {
      font-size: 12px;
      color: #47505A;
      margin-top: 50px;
      margin-bottom: 50px;
      display: block;
      
    }
    
    .is-center {
      text-align:center;
    }


    /*e-mail*/
    .registration-details p{
      margin-bottom: 2px;
    }
    .margin-top-12{
      margin-top: 12px;
    }
   
	  
  </style>    
</head>
<section style="margin:0; padding:0; background-color:#EAF3FF;">
  <div class="container" >
    
      <table style="width:50%; border-left:2px solid #5da6da ; border-right:2px solid #5da6da; font: 400 14px/1.6em Lato, sans-serif;"  border="0" cellpadding="0" cellspacing="0">' .
            <tbody>
            <tr>
            <td style="padding:30px; background:#5da6da; color:#ffffff; font-size:16px; font-weight:600;"> 
            <div style="float:left; display:inline-block;"> <img style="width: auto; height:50px;" src="' . Yii::$app->params['logo'] . '"/> </div>
            <div style="float:right; display:inline-block; margin-top:5px; font-size:16px; font-family: lato; font-weight:600;"> Sign Up </div>
            </td>
            </tr>
            <tr>
              <td class="registration-details"  style="text-align:center; padding:17px 30px; line-height:19px; color:#606366; font-size:13px; font-weight:400; font-family: lato; " >
                <div>
                  <p>Welcom, to the Smartbus </p>
                  
                  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur </p>
                
                </div>
                
              </td>
            </tr>
            <tr>
            <td class="registration-details"  style="text-align:center; padding:40px 30px; line-height:19px; color:#606366; font-size:13px; font-weight:400; font-family: lato; ">
            
            <div class="welcome-email" >
              <p>Welcom, to the Smartbus  </p>
              
            </div>

              <p>Thank You For Your Registratiuon </p>
                   <p> Here is your Varification Key
               </p>
               <P> <strong> 12345</strong></p>

            </td> 
            </tr>
            <tr>
            <td  style="text-align:center; padding:10px 0 30px 0;  color:#606366; font-size:14px; font-weight:400"> 
            <span style="padding:4px 20px;  font-family: lato; font-size: 13px;">Phone: ' 
            Yii::$app->params['phone'] .
            </span> 
            <span style="padding:4px 10px;  font-family: lato; font-size: 13px;">Email: 
            '<a style=" text-decoration:none; color:#679EE8;  font-family: lato; font-size: 13px;" href="mailto:' .
            Yii::$app->params['supportEmail'].
            '">' .
            Yii::$app->params['supportEmail'] .
            </a> 
            </span>
            <span style="padding:4px 10px;  font-family: lato; font-size: 13px;">Website: 
            <a style=" text-decoration:none; color:#679EE8;  font-family: lato; font-size: 13px;" href="' .
            Yii::$app->params['contact']['url'] .
            '" target="_blank">
            Yii::$app->params['contact']['url'] .
            </a>
            </span>
            </td>
            </tr>
            <tr>
            <td style="text-align:center; padding:10px 30px; background:#5da6da; color:#ffffff; font-size:12px; font-family: lato; font-weight:400">
            Yii::$app->params['contact']['name'] .
             <br/> 

             <a href=""  style="text-decoration:none; color:#ffffff;  font-size:12px; font-family: lato; " target="_blank">

              www.smartbus.com
               
             </a>
               <div class = "social-icon margin-top-12 gray-bg icons-circle i-3x">
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'facebook'})){echo $contact[0]->{'facebook'};} ?>">
                        <i class = "fa fa-facebook"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'twitter'})){echo $contact[0]->{'twitter'};} ?>">
                        <i class = "fa fa-twitter"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'pinterest'})){echo $contact[0]->{'pinterest'};} ?>">
                        <i class = "fa fa-pinterest"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'google'})){echo $contact[0]->{'google'};} ?>">
                        <i class = "fa fa-google"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'linkedin'})){echo $contact[0]->{'linkedin'};} ?>">
                        <i class = "fa fa-linkedin"></i>
                     </a>
                  </div>
           
            </td>
            </tr> 
            </tbody>
            </table>

    </div>
  </section>

