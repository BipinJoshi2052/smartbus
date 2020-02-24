$(document).ready(function () {
   "use strict";
   var revapi50,
         tpj;
   (function () {
      if (!/loaded|interactive|complete/.test(document.readyState)) {
         document.addEventListener("DOMContentLoaded", onLoad);
      } else {
         onLoad();
      }

      function onLoad() {
         if (tpj === undefined) {
            tpj = jQuery;

            if ("off" == "on") {
               tpj.noConflict();
            }
         }
         if (tpj("#rev_slider_50_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_50_1");
         } else {
            revapi50 = tpj("#rev_slider_50_1").show().revolution({
               sliderType: "standard",
               jsFileLocation: baseUrl + "/assets/slider/js/",
               sliderLayout: "fullwidth",
               dottedOverlay: "none",
               delay: 6000,
               navigation: {
                  keyboardNavigation: "on",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  mouseScrollReverse: "default",
                  onHoverStop: "off",
                  touch: {
                     touchenabled: "on",
                     touchOnDesktop: "on",
                     swipe_threshold: 75,
                     swipe_min_touches: 50,
                     swipe_direction: "horizontal",
                     drag_block_vertical: false
                  },
                  arrows: {
                     style: "uranus",
                     enable: true,
                     hide_onmobile: true,
                     hide_onleave: true,
                     tmp: '',
                     left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 0
                     },
                     right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 0
                     }
                  }
               },
               responsiveLevels: [1240, 1024, 778, 480],
               visibilityLevels: [1240, 1024, 778, 480],
               gridwidth: [1400, 1240, 778, 480],
               gridheight: [699, 599, 791, 551],
               lazyType: "none",
               shadow: 0,
               spinner: "spinner3",
               stopLoop: "off",
               stopAfterLoops: -1,
               stopAtSlide: -1,
               shuffle: "off",
               autoHeight: "off",
               disableProgressBar: "on",
               hideThumbsOnMobile: "off",
               hideSliderAtLimit: 0,
               hideCaptionAtLimit: 0,
               hideAllCaptionAtLilmit: 0,
               debugMode: false,
               fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
               }
            });
         }
         ; /* END OF revapi call */
      }; /* END OF ON LOAD FUNCTION */
   }()); /* END OF WRAPPING FUNCTION */
});