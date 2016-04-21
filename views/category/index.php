<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Categories';
?>

<h2 class="page-header"> Categories <a href="index.php?r=category/create" class="btn btn-primary pull-right"> Create </a> </h2>

<?php if( null !== Yii::$app->session->getFlash('success') ) : ?>

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?=Yii::$app->session->getFlash('success');?>
</div>

<?php endif; ?>

<ul class="list-group">
    <?php foreach ($categories as $category):  ?>
    <li class="list-group-item">
        <a href="index.php?r=job&category=<?php echo $category->id; ?>">
            <?php echo $category->name; ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>

<?php echo LinkPager::widget([ 'pagination' => $pagination ]);  ?>
