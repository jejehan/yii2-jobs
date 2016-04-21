<?php
use yii\helpers\Html;

echo Html::csrfMetaTags();
?>

<a href="index.php?r=job/index"> Back to Job </a>

<?php if ( null !== Yii::$app->session->getFlash('success') ) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=Yii::$app->session->getFlash('success');?>
    </div>
<?php endif; ?>

<h2 class="page-header">
    <?php echo $job->title ?> in <?php echo $job->city ?>

    <span class="pull-right">
        <a href="index.php?r=job/edit&id=<?php echo $job->id ?>" class="btn btn-default"> Edit </a>
        <a href="/yii2-jobs/web/index.php?r=job/delete&id=<?php echo $job->id ?>" class="btn btn-danger" data-method="post" data-confirm="Are you sure want to deleted this job?" > Delete </a>
        
    </span>

</h2>

<div class="well">
    <h4> Job Description </h4>
    <?php echo $job->description; ?>
</div>

<ul class="list-group">
    <?php if (!empty($job->created_date)) : ?>
    <li class="list-group-item">
        Job Posting : <?php echo $job->created_date ?>
    </li>
    <?php endif; ?>

    <?php if (!empty($job->category_id)) : ?>
    <li class="list-group-item">
        Job Category : <?php echo $job->category->name ?>
    </li>
    <?php endif; ?>

    <?php if (!empty($job->type)) : ?>
    <li class="list-group-item">
        Job type : <?php echo  ucwords(str_replace('_',' ', $job->type ))  ?>
    </li>
    <?php endif; ?>

    <?php if (!empty($job->email)) : ?>
    <li class="list-group-item">
        Job Contact Email : <?php echo $job->email ?>
    </li>
    <?php endif; ?>

    <?php if (!empty($job->phone)) : ?>
    <li class="list-group-item">
        Job Contact Phone : <?php echo $job->phone ?>
    </li>
    <?php endif; ?>

</ul>

<a href="mailto:<?php echo $job->email ?>?Subject=Job20%Application" class="btn btn-primary"> Contact Employeer </a>
