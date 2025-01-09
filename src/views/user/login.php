<?php

use siripravi\materialdashboard\helpers\Html;
use siripravi\materialdashboard\widgets\ActiveForm;
use siripravi\materialdashboard\widgets\buttons\Button;
use siripravi\materialdashboard\widgets\buttons\Link;
use siripravi\materialdashboard\widgets\buttons\Submit;
use siripravi\materialdashboard\widgets\Card;

/** @var yii\web\View $this */
/** @var yii\bootstrap\ActiveForm $form */
/** @var yii\base\Model $model */

$this->title = Yii::$app->name . ' - ' . Yii::t('materialdashboard', 'Sign in');

$js = <<<JS
setTimeout(function() {
    $('.card').removeClass('card-hidden');
}, 700);
JS;
$this->registerJs($js);


$bundle = Yii::$app->assetManager->getBundle(\siripravi\materialdashboard\assets\MaterialAsset::class);

?>
<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?= $bundle->baseUrl ?>/img/login.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <?php Card::begin([
                    'containerOptions' => ['class' => ['type' => 'card-login', 'visibility' => 'card-hidden']],
                    'headerOptions' => ['class' => ['type' => 'card-header-info', 'text' => 'text-center']],
                    'title' => $this->title,
                    'footer' => [
                        Link::widget([
                            'title' => Yii::t('materialdashboard', 'Forgot your password?'),
                            'url' => ['/auth/forgot-password/reset-request'],
                            'options' => ['tabindex' => '-1', 'class' => ['id' => 'forgot-pass-btn']],
                            'optionType' => 'btn-link',
                        ]),
                        Submit::widget(['icon' => 'login', 'title' => Yii::t('materialdashboard', 'Sign in'), 'form' => 'login-form']),
                    ],
                ]) ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

                <?= $form->errorSummary($model) ?>

                <?= $form->field($model, 'email', ['addon' => ['prepend' => ['content' => Html::icon('email')]]])
                    ->textInput(['placeholder' => $model->getAttributeLabel('email'), 'autofocus' => 1])
                    ->label(false) ?>

                <?= $form->field($model, 'password', ['addon' => ['prepend' => ['content' => Html::icon('lock')]]])
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                    ->label(false) ?>

                <?php ActiveForm::end() ?>
                <?php Card::end() ?>

            </div>
        </div>
    </div>
    <?= $this->render('../layouts/_footer') ?>
</div>
