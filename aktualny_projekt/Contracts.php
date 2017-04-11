<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\NotFoundHttpException;


class Contracts extends ActiveRecord {

    public $id;

    public static function tableName() {
        return 'contracts';
    }

    public function getAll() {

        return Contracts::find()->all();
    }

    public function getOneFront($id) {

        return Contracts::findOne(['id' => $id]);
    }

    public function getOne($id) {

        $result =  Contracts::findOne(['id' => $id+1]);

        if (!$result) {
            throw new Exception('Sorry this page dont exist');
        }

        return $result;
    }

    public function saveContracts($data)
    {
        $saveC = new Contracts();
        $saveC->context = $data['contracts']['contracts'];
       $saveC->title = $data['contracts']['title'];
        $saveC->save();
        return $saveC['id'];
    }

    public function upload($data) {

        $update = Contracts::findOne(['id_title' => $data['contracts']['id']]);

        $update->descriotion = substr($data['contracts']['contracts'], 0, 100);
        $update->context = $data['contracts']['contracts'];

        if (isset($data['contracts']['active'])) {
            $update->active = (int) $data['contracts']['active'];
        } else {
            $update->active = (int) 0;
        }

        if (isset($data['contracts']['trash'])) {
            $update->trash = (int) $data['contracts']['trash'];
        } else {
            $update->trash = (int) 0;
        }
        if (isset($data['contracts']['archive'])) {
            $update->archive = (int) $data['contracts']['archive'];
        } else {
            $update->archive = (int) 0;
        }
        $update->titlebutton = substr($data['contracts']['contracts'], 0, 20);
        $update->title = substr($data['contracts']['contracts'], 0, 20);
        $update->save();
    }

}