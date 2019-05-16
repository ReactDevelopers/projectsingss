<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use app\models\Todo;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;


class TodoController extends Controller
{
    public function actionAddtodo()
    {
        $items = ArrayHelper::map(Category::find()->all(), 'id', 'name');

        $dataProvider = new ActiveDataProvider([
            'query' => Todo::find()->select('todo.id,todo.name,Category.name as cat,todo.created_at')->leftJoin('Category', 'Category.id=todo.category_id')->asArray(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $model = new Todo();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model); \Yii::$app->end();

        }
        else{

            if( $model->load(Yii::$app->request->post()) ){
                // print_r(json_decode(json_encode($_POST)));
        // die('11');
                if( $model->save() ){
                    // if (Yii::$app->request->isAjax) {
                    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    //     return ['success' => true];
                    // }
                }
            }
        }

        return $this->render('add', ['model'=>$model, 'items'=>$items,'dataProvider'=>$dataProvider]);
    }

    public function actionDelete($id)
    {
        $model = Todo::findOne($id);

        // $id not found in database
        if ($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');

        // delete record
        $model->delete();
        return $this->redirect('index.php?r=todo%2Faddtodo');
       
    }
}