<?php
/* @var $commonmodels Yii/common/models */


namespace frontend\controllers;


use common\models\Contracts;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\Generator;
use frontend\models\TitleContracts;
use yii\bootstrap\Html;
//use generator;

class GeneratorController extends Controller
{
    private $key;//zmienna do usunięcia -> w chwili obecnej tylko dla testów

    public function actionIndex() {
            $this->key = \Yii::$app->request->cookieValidationKey;
            if(!$this->key) {
                throw new NotFoundHttpException('Trwają prace, prosimy o cierpliwość',404);
            }

            $title = new TitleContracts();

            $titlePa = $title->getAll();
            for ($i=0; $i<count($titlePa); ++$i) {
                return $this->render('index', ['result' => $titlePa]);
            }
    }
    
    public function actionGenerator() {

            $this->key = \Yii::$app->request->cookieValidationKey;

            $post = Yii::$app->request->post('generator');

            $db = new Contracts();

          $result = $db->getOneFront($post['id']);

         if(!$result['context']) {
             throw new NotFoundHttpException('Something went wrong. Contact us later'. 404);
         }

     return $this->render('generator',['db' => $result['context']]);

    }
       
   public function actionWrite($data) {

       $this->key = \Yii::$app->request->cookieValidationKey;
       if(!$this->key) {
           throw new NotFoundHttpException(404);
       }

            return $this->render('write');
   }
}