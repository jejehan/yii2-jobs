<?php


/* @var $this yii\web\View */
/* @var $job app\models\Job */
/* @var $form ActiveForm */

$this->title = ' Create Job ';
?>
<div class="job-create">
    <a href="index.php?r=job/index"> Back to Job List </a>
    <?php  echo $this->render('_form',['job'=>$job]) ?>
</div><!-- job-create -->
