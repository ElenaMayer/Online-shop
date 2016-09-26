<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

    <p><img id="photo_image" <?php if(!$model->img): ?>class="hidden"<?php endif; ?> src="<?php echo $model->getPreviewUrl()?>"/></p>
    <div class="right_column">

        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'image'); ?></div>
            <div><?php echo $form->fileField($model,'image'); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'is_show'); ?></div>
            <div><?php echo $form->checkBox($model,'is_show'); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'is_available'); ?></div>
            <div><?php echo $form->checkBox($model,'is_available'); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'category'); ?></div>
            <div><?php echo $form->dropDownList($model,'category', Yii::app()->params['categories'], array('prompt'=>'')); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'article'); ?></div>
            <div><?php echo $form->textField($model,'article'); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'is_new'); ?></div>
            <div><?php echo $form->checkBox($model,'is_new'); ?></div>
        </div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'is_sale'); ?></div>
            <div><?php echo $form->checkBox($model,'is_sale'); ?></div>
        </div>

        <div class="sale" style="display: none">
            <div class="row">
                <div class="label"><?php echo $form->labelEx($model,'sale'); ?></div>
                <div><?php echo $form->textField($model,'sale'); ?></div>
            </div>
            <div class="row">
                <div class="label"><?php echo $form->labelEx($model,'new_price'); ?></div>
                <div><?php echo $form->textField($model,'new_price'); ?></div>
            </div>
            <div class="row">
                <div class="label"><?php echo $form->labelEx($model,'old_price'); ?></div>
                <div><?php echo $form->textField($model,'old_price'); ?></div>
            </div>
        </div>
        <div class="not_sale">
            <div class="row">
                <div class="label"><?php echo $form->labelEx($model,'price'); ?></div>
                <div><?php echo $form->textField($model,'price'); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'has_size'); ?></div>
            <div><?php echo $form->checkBox($model,'has_size'); ?></div>
        </div>
        <div class="row sizes">
            <div class="label"><?php echo $form->labelEx($model,'sizes'); ?></div>
            <div class="input"><?php echo $form->textField($model,'sizes'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="row">
            <div class="label"><?php echo $form->labelEx($model,'weight'); ?></div>
            <div><?php echo $form->textField($model,'weight'); ?></div>
        </div>
    </div>
    <div class="row">
        <div class="label"><?php echo $form->labelEx($model,'title'); ?></div>
        <div><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>

	<div class="row">
        <div class="label"><?php echo $form->labelEx($model,'description'); ?></div>
        <div>
            <?php $htmlOptions = [
                'class'=>'editor',
                'width'=>'100%',
                'height'=>'300px'
            ];
            if(Yii::app()->controller->action->id == 'create')
                $htmlOptions['value'] =
                    '<div class="model_desc">
                        <p>Описание</p>
                        <table>
                            <tbody>
                            <tr>
                                <th>Состав</th>
                                <td>состав</td>
                            </tr>
                            <tr>
                                <th>Цвет</th>
                                <td>цвет</td>
                            </tr>
                            <tr>
                                <th>Детали</th>
                                <td>детали</td>
                            </tr>
                            </tbody>
                            </table>
                        </div>';
            ?>
            <?php $this->widget('application.extensions.tiny_mce.TinyMCE', [
                'model'=>$model,
                'attribute'=>'description',
                'editorOptions'=>[
                    'language'=>'ru',
                    'width'=>'100%',
                    'height'=>'300px'
                ],
                'htmlOptions'=>$htmlOptions
            ]); ?>
        </div>
	</div>

	<div class="row buttons indent">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    subcategory = <?= json_encode(Yii::app()->params['subcategories'])?>;
    $( document ).ready(function() {
        if($('#Photo_is_sale').prop('checked')){
            $('.sale').show();
            $('.not_sale').hide();
        }
        if($('#Photo_has_size').prop('checked')){
            $('.sizes').show();
        } else {
            $('.sizes').hide();
        }
    });
    $("#Photo_is_sale").click(function() {
        if($(this).prop('checked')) {
            $('.sale').show();
            $('.not_sale').hide();
        } else {
            $('.sale').hide();
            $('.not_sale').show();
        }
    });
    $("#Photo_has_size").click(function() {
        if($(this).prop('checked')){
            $('.sizes').show();
        } else {
            $('.sizes').hide();
        }
    });
    $('#Photo_image').change(function() {
        article = $(this).val().replace(/C:\\fakepath\\/i, '').replace(/\.jpg/i, '');
        $('#Photo_article').val(article);
        readURL(this);
    });
    $( "#Photo_sale" ).keyup(function() {
        if ($('#Photo_old_price').val()) {
            sale = parseInt($(this).val());
            old_price = parseInt($('#Photo_old_price').val());
            $('#Photo_old_price').val(old_price);
            new_price = (100-sale)*old_price/100;
            $('#Photo_new_price').val(new_price);
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photo_image').attr('src', e.target.result);
                $('#photo_image').removeClass('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>