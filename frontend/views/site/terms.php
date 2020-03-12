<?php
/* @var $this yii\web\View */
$this->title = 'Terms and Conditions';
?>
<div class = "page-header">
   <div class = "container">
      <h1 class = "title">Terms & Conditions</h1>
   </div>
</div><!-- page-header -->
<?php foreach ($terms

as $t) {
?>
<?php if (isset($t['id']) && $t['id'] % 2 == 0) { ?>
<section class = "page-section">
    <?php }
    else { ?>
   <section class = "page-section bg-light">
       <?php } ?>
      <div class = "container">
         <div>
            <h4 style="color: deepskyblue; font-weight: bold"><?php echo(isset($t['section']) ? $t['section'] : 'No name for this section') ?></h4>
            <hr>
            <div class = "row">
               <div class = "content-privacy col-md-12">
                   <?php echo(isset($t['content']) ? $t['content'] : 'No Terms for this section') ?>
               </div>
            </div>
            <hr>
   </section>
    <?php } ?>
