<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Category;

?>
<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->errorSummary($job) ?>

    <?php
        echo $form->field($job, 'category_id')
                ->dropDownList( Category::find()->select(['name','id'])
                                    ->indexBy('id')
                                    ->column() ,[ 'prompt'=> '- Select Category -' ]);
    ?>
    <?= $form->field($job, 'title') ?>
    <?= $form->field($job, 'description') ?>
    <?php
        echo $form->field($job, 'type')
                ->dropDownList([
                    'full_time' => 'Full Time',
                    'part_time' => 'Part Time',
                    'as_needed' => 'As Needed',
                ],[ 'prompt' => '- Select Type -' ])
    ?>
    <?= $form->field($job, 'requirements') ?>
    <?php
        echo $form->field($job, 'salary_range')
                ->dropDownList([
                    'under $30k'    => ' Under 30k ',
                    '$30 - $50'     => '$30 - $50',
                    '$60 - $100'    => '$60 - $100',
                    '$110 - $150'   => '$110 - $150',
                    '$160 - $200'   => '$160 - $200',
                    'over $200'     => 'over $200',
                ],[ 'prompt' => '- Select Salary Range -' ])
    ?>
    <?= $form->field($job, 'city') ?>
    <?= $form->field($job, 'state') ?>
    <?= $form->field($job, 'zipcode') ?>
    <?= $form->field($job, 'email') ?>
    <?= $form->field($job, 'phone') ?>
    <?= $form->field($job, 'is_publish')->radioList([ 1=>'Yes', 0=>'No' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
