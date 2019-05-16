<?php

namespace app\models;
use yii\db\ActiveRecord;


class Todo extends ActiveRecord
{
    public static function tableName(){
        return 'todo';
    }

    public function rules(){
        return [
            [ 'name', 'required' ],
            [ 'category_id', 'integer' ],
        ];
    }
}