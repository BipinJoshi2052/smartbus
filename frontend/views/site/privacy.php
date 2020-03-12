<?php
/* @var $this yii\web\View */
$this->title = 'Privacy and Conditions';
?>
<div class = "page-header">
   <div class = "container">
      <h1 class = "title">Privacy & Policies</h1>
   </div>
</div><!-- page-header -->
<?php foreach ($privacy

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
            <h4 style = "color: deepskyblue; font-weight: bold"><?php echo(isset($t['section']) ? $t['section'] : 'No name for this section') ?></h4>
            <hr>
            <div class = "row">
               <div class = "content-privacy col-md-12">
                   <p ><?php echo(isset($t['content']) ? $t['content'] : 'No Privacy for this section') ?></p>
               </div>
            </div>
            <hr>
   </section>
    <?php } ?>
