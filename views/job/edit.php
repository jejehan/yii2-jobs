<?php

/* @var $this yii\web\View */

$this->title = 'Edit Job : ' . $job->title;
?>
<div class="job-edit">

    <a href="index.php?r=job/detail&id=<?php echo $job->id ?>"> Back To <?php echo $job->title ?> </a>

    <?php echo $this->render('_form',['job'=>$job]) ?>
</div><!-- job-edit -->
