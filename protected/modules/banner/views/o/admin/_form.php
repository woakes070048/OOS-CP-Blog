<?php
/**
 * Banners (banners)
 * @var $this AdminController
 * @var $model Banners
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2014 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Banner
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'banners-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<?php //begin.Messages ?>
<div id="ajax-message">
	<?php echo $form->errorSummary($model); ?>
</div>
<?php //begin.Messages ?>

<fieldset>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<div class="desc">
			<?php 
			$category = BannerCategory::getCategory(1);
			if($category != null)
				echo $form->dropDownList($model,'cat_id', $category);
			else
				echo $form->dropDownList($model,'cat_id', array('prompt'=>'No Parent'));
			echo $form->error($model,'cat_id');?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'title'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'title',array('class'=>'span-7', 'maxlength'=>64)); ?>
			<?php echo $form->error($model,'title'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'url'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'url',array('class'=>'span-10 smaller', 'rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'url'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>
	
	<?php if(!$model->isNewRecord) {
		$model->old_media = $model->media;
		echo $form->hiddenField($model,'old_media');
		if($model->media != '') {
			$resizeSize = explode(',', $model->category_relation->media_size);
			$file = Yii::app()->request->baseUrl.'/public/banner/'.$model->media;
			$media = '<img src="'.Utility::getTimThumb($file, $resizeSize[0], $resizeSize[1], 1).'" alt="">';
			echo '<div class="clearfix">';
			echo $form->labelEx($model,'old_media');
			echo '<div class="desc">'.$media.'</div>';
			echo '</div>';
		}
	}?>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'media'); ?>
		<div class="desc">
			<?php echo $form->fileField($model,'media'); ?>
			<?php echo $form->error($model,'media'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'published_date'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->published_date != '0000-00-00' ? $model->published_date = date('d-m-Y', strtotime($model->published_date)) : '') : '';
			//echo $form->textField($model,'published_date');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'published_date',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'published_date'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'expired_date'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->expired_date != '0000-00-00' ? $model->expired_date = date('d-m-Y', strtotime($model->expired_date)) : '') : '';
			//echo $form->textField($model,'expired_date');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'expired_date',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'expired_date'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'publish'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'publish'); ?>
			<?php echo $form->labelEx($model,'publish'); ?>
			<?php echo $form->error($model,'publish'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="submit clearfix">
		<label>&nbsp;</label>
		<div class="desc">
			<?php echo CHtml::submitButton($model->isNewRecord ? Phrase::trans(1,0) : Phrase::trans(2,0), array('onclick' => 'setEnableSave()')); ?>
		</div>
	</div>

</fieldset>
<?php $this->endWidget(); ?>


