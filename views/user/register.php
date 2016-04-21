<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user app\models\USer */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($user)  ?>

        <?= $form->field($user, 'full_name') ?>
        <?= $form->field($user, 'username') ?>
        <?= $form->field($user, 'email') ?>
        <?= $form->field($user, 'password')->passwordInput() ?>
        <?= $form->field($user, 'passsword_repeat')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
