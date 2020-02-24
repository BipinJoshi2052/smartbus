<?php
$this->registerCssFile("http://fonts.googleapis.com/css?family=Raleway:100%2C400%2C600");
$this->registerCssFile(Yii::$app->request->baseUrl . "/assets/slider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css");
$this->registerCssFile(Yii::$app->request->baseUrl . "/assets/slider/css/settings.css");

$this->registerJsFile(Yii::$app->request->baseUrl . "/assets/slider/js/jquery.themepunch.tools.min.js");
$this->registerJsFile(Yii::$app->request->baseUrl . "/assets/slider/js/jquery.themepunch.revolution.min.js");
$this->registerJsFile(Yii::$app->request->baseUrl . "/assets/slider/init.js");

?>

<style>

   .tparrows {
      background: transparent !important;
   }

   .tparrows:before {
      color: #ffc107 !important;
   }

   .tp-caption.WebProduct-Title, .WebProduct-Title {
      color: rgba(51, 51, 51, 1.00);
      font-size: 90px;
      line-height: 90px;
      font-weight: 100;
      font-style: normal;
      font-family: Raleway;
      text-decoration: none;
      background-color: transparent;
      border-color: transparent;
      border-style: none;
      border-width: 0px;
      border-radius: 0 0 0 0px
   }

   .tp-caption.WebProduct-SubTitle, .WebProduct-SubTitle {
      color: rgba(153, 153, 153, 1.00);
      font-size: 15px;
      line-height: 20px;
      font-weight: 400;
      font-style: normal;
      font-family: Raleway;
      text-decoration: none;
      background-color: transparent;
      border-color: transparent;
      border-style: none;
      border-width: 0px;
      border-radius: 0 0 0 0px
   }

   .tp-caption.WebProduct-Content, .WebProduct-Content {
      color: rgba(153, 153, 153, 1.00);
      font-size: 16px;
      line-height: 24px;
      font-weight: 600;
      font-style: normal;
      font-family: Raleway;
      text-decoration: none;
      background-color: transparent;
      border-color: transparent;
      border-style: none;
      border-width: 0px;
      border-radius: 0 0 0 0px
   }

   .tp-caption.WebProduct-Button, .WebProduct-Button {
      color: rgba(255, 255, 255, 1.00);
      font-size: 16px;
      line-height: 48px;
      font-weight: 600;
      font-style: normal;
      font-family: Raleway;
      text-decoration: none;
      background-color: rgba(51, 51, 51, 1.00);
      border-color: rgba(0, 0, 0, 1.00);
      border-style: none;
      border-width: 2px;
      border-radius: 0 0 0 0px;
      letter-spacing: 1px
   }

   .tp-caption.WebProduct-Button:hover, .WebProduct-Button:hover {
      color: rgba(51, 51, 51, 1.00);
      text-decoration: none;
      background-color: rgba(255, 255, 255, 1.00);
      border-color: rgba(0, 0, 0, 1.00);
      border-style: none;
      border-width: 2px;
      border-radius: 0 0 0 0px
   }

   #rev_slider_50_1_wrapper .tp-loader.spinner3 {
      background-color: #FFFFFF !important;
   }

   #rev_slider_50_1 .uranus.tparrows {
      width: 50px;
      height: 50px;
      background: rgba(255, 255, 255, 0)
   }

   #rev_slider_50_1 .uranus.tparrows:before {
      width: 50px;
      height: 50px;
      line-height: 50px;
      font-size: 60px;
      transition: all 0.3s;
      -webkit-transition: all 0.3s
   }

   #rev_slider_50_1 .uranus.tparrows:hover:before {
      opacity: 0.75
   }
</style>


<script type="text/javascript">function setREVStartSize(e) {
      document.addEventListener("DOMContentLoaded", function () {
         try {
            e.c = jQuery(e.c);
            var i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
               f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
               var u = (e.c.width(), jQuery(window).height());
               if (void 0 != e.fullScreenOffsetContainer) {
                  var c = e.fullScreenOffsetContainer.split(",");
                  if (c) jQuery.each(c, function (e, i) {
                     u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                  }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
               }
               f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({height: f})
         } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
         }
      });
   };
</script>





