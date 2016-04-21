<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<h2 class="page-header">Jobs <a href="index.php?r=job/create" class="btn btn-primary pull-right"> Create Jobs </a> </h2>

<?php if ( null !== Yii::$app->session->getFlash('success') ) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=Yii::$app->session->getFlash('success');?>
    </div>
<?php endif; ?>


<?php if (!empty($jobs)) :?>

<ul class="list-group">
    <?php foreach ($jobs as $job) :  ?>
        <li class="list-group-item">
            <a href="index.php?r=job/detail&id=<?php echo $job->id ?>">
                <?php echo $job->title; ?> - <?php echo $job->city; ?>
            </a>
            - Posted on <?php echo $job->created_date; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php echo LinkPager::widget([ 'pagination' => $pagination ]); ?>

<?php else: ?>
    <div class="alert alert-warning">
        No Jobs Posted...
    </div>
<?php endif; ?>
