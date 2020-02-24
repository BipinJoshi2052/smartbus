<div class="scroll-sidebar">
   <!-- Sidebar navigation-->
   <nav class="sidebar-nav">
      <ul id="sidebarnav">


         <!-- SAMPLE //// -->
         <li class="d_none"><a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
            <ul aria-expanded="false" class="collapse">
               <li><a href="javascript:void(0);">item 1.1</a></li>
               <li><a href="javascript:void(0);">item 1.2</a></li>
               <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Menu 1.3</a>
                  <ul aria-expanded="false" class="collapse">
                     <li><a href="javascript:void(0);">item 1.3.1</a></li>
                     <li><a href="javascript:void(0);">item 1.3.2</a></li>
                     <li><a href="javascript:void(0);">item 1.3.3</a></li>
                     <li><a href="javascript:void(0);">item 1.3.4</a></li>
                  </ul>
               </li>
               <li><a href="javascript:void(0);">item 1.4</a></li>
            </ul>
         </li>
         <!-- //// SAMPLE -->


         <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
            <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/" aria-expanded="false">
               <i class="mdi mdi-drag"></i>
               <span class="hide-menu">Dashboard</span></a>
         </li>


         <li class="nav-divider"></li>

         <li class="<?= (Yii::$app->controller->id == 'pos' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
            <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/pos" aria-expanded="false">
               <i class="mdi mdi-cash-multiple"></i>
               <span class="hide-menu">Sales Counter</span></a>
         </li>

      </ul>
   </nav>
   <!-- End Sidebar navigation -->
</div>