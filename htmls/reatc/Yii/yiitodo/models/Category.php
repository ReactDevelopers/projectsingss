<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Category is the model.
 */
class Category extends ActiveRecord
{

    public static function tableName(){
        return 'Category';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    
}
