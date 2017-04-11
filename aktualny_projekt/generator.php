<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \frontend\models\GeneratorForm;
use yii\bootstrap\Modal;

$title = $db[0]['title'] ?  $db[0]['title'] : ' ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row contracts">
        <div class="col-lg-7 pull-left">
          <?php  $form = ActiveForm::begin(['id' => 'generator-form']);
            $model = new GeneratorForm();
            $post = yii::$app->request->post('generator');
            ?>
        </div>
        <div class="col-lg-7 pull-left">
            <?=
            $form->field($model, 'contracts')
            ->textarea(['rows' => 10, 'cols'=>40 ,'readonly' => true, 'value' =>Html::decode($db)])
              ->label('Description'); ?>
        </div>
        <div class="col-lg-7 pull-left">

        <div class="form-edit pull-right">
            <?php  Modal::begin([
                'toggleButton' => [
                    'label' => '<i class="btn"></i>Write',
                    'class' => 'btn btn-danger'
                ],
                'closeButton' => [
                    'label' => 'Close',
                    'class' => 'btn btn-danger pull-left',
                ],
                'size' => 'modal-lg',
            ]);

            echo $this->render('write', ['model' => $model]);
            Modal::end();
            ?>
        </div>
    </div>
</div>