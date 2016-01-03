<?php
/**
 * Banner Settings (banner-setting)
 * @var $this SettingController
 * @var $model BannerSetting
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
	'id'=>'banner-setting-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<?php //begin.Messages ?>
	<div id="ajax-message">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<?php //begin.Messages ?>

	<fieldset>

		<div class="clearfix">
			<label>
				<?php echo $model->getAttributeLabel('license');?> <span class="required">*</span><br/>
				<span><?php echo Phrase::trans(28003,1);?></span>
			</label>
			<div class="desc">
				<?php echo $form->textField($model,'license',array('maxlength'=>32,'class'=>'span-4','disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'license'); ?>
				<span class="small-px"><?php echo Phrase::trans(24017,1);?></span>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'permission'); ?>
			<div class="desc">
				<span class="small-px"><?php echo Phrase::trans(28006,1);?></span>
				<?php echo $form->radioButtonList($model, 'permission', array(
					1 => Phrase::trans(28007,1),
					0 => Phrase::trans(28008,1),
				)); ?>
				<?php echo $form->error($model,'permission'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'media_validation'); ?>
			<div class="desc">
				<?php echo $form->radioButtonList($model, 'media_validation', array(
					1 => 'Yes, validation banner size before upload.',
					0 => 'No, not validation banner size before upload.',
				)); ?>
				<?php echo $form->error($model,'media_validation'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'media_resize'); ?>
			<div class="desc">
				<?php echo $form->radioButtonList($model, 'media_resize', array(
					1 => 'Yes, resize banner after upload.',
					0 => 'No, not resize banner after upload.',
				)); ?>
				<?php echo $form->error($model,'media_resize'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'meta_keyword'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'meta_keyword',array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
				<?php echo $form->error($model,'meta_keyword'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'meta_description'); ?>
			<div class="desc">
				<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
				<?php echo $form->error($model,'meta_description'); ?>
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


