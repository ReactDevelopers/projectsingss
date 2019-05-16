<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \yii\widgets\Pjax;
?>
<?php Pjax::begin([
        'enableReplaceState'=>false,
        'enablePushState'=>false,
        'clientOptions'=>[
            'container'=>'x1',
        ]
    ]); ?>
<?php $form = ActiveForm::begin(['enableClientValidation'=>true,'action' => ['todo/addtodo'],/*'enableAjaxValidation'=>true,*/'options' => ['id' => 'Addpost']]) ?>
<div class="row" style="margin-top: 20px;">
	<div class="col-md-3 col-sm-4 col-xs-12">    
		<div class="heightbox">
			<?php echo $form->field($model, 'category_id')->dropDownList($items
						)->label(false); ?>
		</div>
	</div>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?= $form->field($model, 'name')->input('text', ['placeholder' => "Type todo item name"])->label(false)?>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-12">
    	<div class="heightbox">
			<?= Html::submitButton('Add', ['class' => 'btn btn-success'])?>
		</div>
	</div>
		<?php ActiveForm::end() ?>
</div>
<?php Pjax::end(); ?>
<hr>
<?php
   use yii\grid\GridView;
   \yii\widgets\Pjax::begin(['id' => 'my_pjax']); 
   echo GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
	            ['label' => 'Todo item name','attribute'=>'name'],
	            ['label' => 'Category','attribute'=>'cat'],
	            [
	            	'label' => 'Timestamp',
		            'attribute' => 'created_at',
		            'format' =>  ['date', 'php:dS M']
		        ],
		        [
		            'class' => 'yii\grid\ActionColumn',
		            'template' => '{delete}',
		            'header'=>"Actions",
		            'buttons' => [
		                'delete' => function ($url, $model) {
		                        return Html::a('Delete', false, [
		                            'class' => 'pjax-delete-link',
		                            'delete-url' => $url,
		                            'pjax-container' => 'my_pjax',
		                            'title' => Yii::t('yii', 'Delete')
		                        ]);
		                    }
			        ],
		        ],

            ]
   ]);
   \yii\widgets\Pjax::end();
	if (class_exists('yii\debug\Module')) {
		$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
	}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
	/**** Delete ajax ***/
	$(document).on('ready pjax:success', function() {
		$('.pjax-delete-link').on('click', function(e) {
		    e.preventDefault();
		    var deleteUrl = $(this).attr('delete-url');
		    var pjaxContainer = $(this).attr('pjax-container');
		    var result = confirm('Delete this item, are you sure?');                                
		    if(result) {
		        $.ajax({
		            url: deleteUrl,
		            type: 'post',
		            error: function(xhr, status, error) {
		                // alert('There was an error with your request.' + xhr.responseText);
		            }
		        }).done(function(data) {
		            // $.pjax.reload('#' + $.trim(pjaxContainer), {timeout: 3000});
		        });
		    }
		});
	});

	/**** Add Todo ajax ***/
	$(document).ready(function() {
		$(".help-block").remove();
    	$("div").removeClass("help-block");
    	$("div").removeClass("has-error");
    	$('#todo-name').val('');
       $("#Addpost").submit(function(event) {
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function (data, status, jqXHR) {
					// $("#container").html(data);
					alert('html data ');
					alert("Local success callback.");
				},
                error: function(xhr, status, error) {
                    alert('There was an error with your request.' + xhr.responseText);
                }
            })
            /*.done(function(response) {
            })*/;/*
            .fail(function() {
                console.log("error");
            });*/
            return false;
        
        });
    });

</script>

