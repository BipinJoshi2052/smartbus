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


<div id="rev_slider_50_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="smartbus" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
   <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
   <div id="rev_slider_50_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
      <ul>   <!-- SLIDE  -->
         <li data-index="rs-207" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/100x50_newspaper_bg1.jpg" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/newspaper_bg1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->
            <!-- LAYER NR. 7 -->
            <div class="tp-caption WebProduct-Title   tp-resizeme" id="slide-207-layer-7" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['-80','-80','137','130']" data-fontsize="['90','90','75','75']" data-lineheight="['90','90','75','70']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 11; white-space: nowrap; ">Smart Bus<br/>
               Bookings
            </div>

            <!-- LAYER NR. 8 -->
            <div class="tp-caption WebProduct-SubTitle   tp-resizeme" id="slide-207-layer-10" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['44','44','294','277']" data-fontsize="['15','15','15','13']" data-color="['rgb(255,255,255)','rgb(255,255,255)','rgba(153,153,153,1)','rgba(153,153,153,1)']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1250,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 12; white-space: nowrap; color: #ffffff; letter-spacing:2px;font-weight:500;">EASY / Convenient / Reliable
            </div>

            <!-- LAYER NR. 9 -->
            <div class="tp-caption WebProduct-Content   tp-resizeme" id="slide-207-layer-9" data-x="['left','left','left','left']" data-hoffset="['29','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['129','127','345','316']" data-fontsize="['16','16','16','14']" data-lineheight="['24','24','24','22']" data-color="['rgb(255,255,255)','rgba(153,153,153,1)','rgba(153,153,153,1)','rgba(153,153,153,1)']" data-width="['448','356','334','277']" data-height="['none','none','76','68']" data-whitespace="normal"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 13; min-width: 448px; max-width: 448px; white-space: normal; color: #ffffff; ">Our portfolio includes some of the most prominent clients.<br/>
               You can be a part now!
            </div>

            <!-- LAYER NR. 10 -->
            <div class="tp-caption rev-btn rev-btn " id="slide-207-layer-8" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['268','268','456','420']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-208","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":1750,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(51,51,51,1);bg:rgba(255,255,255,1);"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[40,40,40,40]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[40,40,40,40]"

                 style="z-index: 14; white-space: nowrap; font-size: 16px; line-height: 48px; font-weight: 600; color: rgba(255,255,255,1); font-family:Raleway;background-color:rgba(51,51,51,1);letter-spacing:1px;">GET STARTED TODAY
            </div>
         </li>
         <!-- SLIDE  -->
         <li data-index="rs-209" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/100x50_mountainbg.jpg" data-rotate="0" data-saveperformance="off" data-title="Easy to Use" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/mountainbg.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->

            <!-- LAYER NR. 18 -->
            <div class="tp-caption   tp-resizeme" id="slide-209-layer-1" data-x="['right','right','center','center']" data-hoffset="['-54','-133','0','0']" data-y="['middle','middle','middle','bottom']" data-voffset="['50','50','211','5']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="image" data-responsive_offset="on"

                 data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 5;">
               <img src="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/macbookpro.png" alt="" data-ww="['1000px','1000px','500px','350px']" data-hh="['600px','600px','300px','210px']" data-no-retina>
            </div>


            <!-- LAYER NR. 20 -->
            <div class="tp-caption WebProduct-Title   tp-resizeme" id="slide-209-layer-7" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['-80','-80','137','140']" data-fontsize="['90','90','75','75']" data-lineheight="['90','90','75','70']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 7; white-space: nowrap; letter-spacing: ;">How Does<br/>
               it Work?
            </div>

            <!-- LAYER NR. 21 -->
            <div class="tp-caption WebProduct-SubTitle   tp-resizeme" id="slide-209-layer-10" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['44','44','294','287']" data-fontsize="['15','15','15','13']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1250,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 8; white-space: nowrap; letter-spacing: ;letter-spacing:2px;font-weight:500;">IT'S SO EASY THAT ANYONE CAN DO IT
            </div>

            <!-- LAYER NR. 22 -->
            <div class="tp-caption WebProduct-Content   tp-resizeme" id="slide-209-layer-9" data-x="['left','left','left','left']" data-hoffset="['30','30','200','80']" data-y="['middle','middle','top','top']" data-voffset="['129','127','345','326']" data-fontsize="['16','16','16','14']" data-lineheight="['24','24','24','22']" data-width="['448','356','334','277']" data-height="['none','none','76','68']" data-whitespace="normal"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 9; min-width: 448px; max-width: 448px; white-space: normal; ">Our new system will make creating any design an absolute breeze. Designers will feel at home right away!
            </div>

            <!-- LAYER NR. 23 -->
            <div class="tp-caption WebProduct-Button rev-btn " id="slide-209-layer-8" data-x="['left','left','left','left']" data-hoffset="['30','30','200','79']" data-y="['middle','middle','top','top']" data-voffset="['268','268','456','430']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-207","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":1750,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(51,51,51,1);bg:rgba(255,255,255,1);"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[40,40,40,40]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[40,40,40,40]"

                 style="z-index: 10; white-space: nowrap; letter-spacing:1px;">BOOK A TICKET NOW
            </div>
         </li>
         <!-- SLIDE  -->
         <li data-index="rs-210" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/100x50_officeloop_cover.jpg" data-rotate="0" data-saveperformance="off" data-title="Get a License" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/officeloop_cover.jpg" alt="" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->

            <!-- BACKGROUND VIDEO LAYER -->
            <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-videomp4="<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/officeloop_low.mp4" data-videopreload="auto" data-videoloop="none" data-forceCover="1" data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false"></div>
            <!-- LAYER NR. 24 -->
            <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme" id="slide-210-layer-11" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap"

                 data-type="shape" data-basealign="slide" data-responsive_offset="on"

                 data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 5;background-color:rgba(245,245,245,0.95);"></div>

            <!-- LAYER NR. 25 -->
            <div class="tp-caption WebProduct-Title   tp-resizeme" id="slide-210-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','top','top']" data-voffset="['-80','-80','176','187']" data-fontsize="['90','90','50','40']" data-lineheight="['90','90','50','40']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 6; white-space: nowrap; ">The Whole World of<br/>
               Ticket Booking
            </div>

            <!-- LAYER NR. 26 -->
            <div class="tp-caption WebProduct-SubTitle   tp-resizeme" id="slide-210-layer-10" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','top','top']" data-voffset="['44','44','294','287']" data-fontsize="['15','15','15','13']" data-width="none" data-height="none" data-whitespace="nowrap"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1250,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 7; white-space: nowrap; letter-spacing:2px;font-weight:500;">EXPERIENCE A NEW WAY OF BOOKING YOUR TICKETS
            </div>

            <!-- LAYER NR. 27 -->
            <div class="tp-caption WebProduct-Content   tp-resizeme" id="slide-210-layer-9" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','top','top']" data-voffset="['129','127','345','326']" data-fontsize="['16','16','16','14']" data-lineheight="['24','24','24','22']" data-width="['448','356','334','277']" data-height="['none','none','76','68']" data-whitespace="normal"

                 data-type="text" data-responsive_offset="on"

                 data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

                 style="z-index: 8; min-width: 448px; max-width: 448px; white-space: normal; letter-spacing: ;">Make the most of your website and enhance it with cutting-edge ThemePunch technology.
            </div>

            <!-- LAYER NR. 28 -->
            <a class="tp-caption WebProduct-Button rev-btn " href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?ref=themepunch" target="_blank" id="slide-210-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','top','top']" data-voffset="['268','268','456','430']" data-width="none" data-height="none" data-whitespace="nowrap"

               data-type="button" data-actions='' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":1750,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(51,51,51,1);bg:rgba(255,255,255,1);"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[40,40,40,40]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[40,40,40,40]"

               style="z-index: 9; white-space: nowrap; letter-spacing:1px;text-decoration: none;">BOOK YOUR TICKET </a>
         </li>
      </ul>
      <div style="overflow:hidden;width:100%;height:100%;top:0px;left:0px;" class="tp-static-layers">

         <!-- LAYER NR. 29 -->
         <div class="tp-caption -   tp-static-layer" id="slider-50-layer-1" data-x="['right','right','right','right']" data-hoffset="['30','30','30','30']" data-y="['top','top','top','top']" data-voffset="['30','30','30','30']" data-width="none" data-height="none" data-whitespace="nowrap"

              data-type="text" data-actions='[{"event":"click","action":"toggleclass","layer":"slider-50-layer-1","delay":"0","classname":"open"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-50-layer-3","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-50-layer-4","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-50-layer-5","delay":"0"},{"event":"click","action":"togglelayer","layerstatus":"hidden","layer":"slider-50-layer-6","delay":"0"}]' data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-startslide="0" data-endslide="3" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"

              style="z-index: 33; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: rgba(255,255,255,1); letter-spacing: ;">
            <div id="rev-burger">
               <span></span>
               <span></span>
               <span></span>
            </div>
         </div>
      </div>
      <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
   </div>
</div><!-- END REVOLUTION SLIDER -->




