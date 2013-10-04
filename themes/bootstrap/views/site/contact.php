<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<?php

/*$this->widget('ext.MjmChat.MjmChat', array(
                'title'=>'Chat room',
                'rooms'=>array('php'=>'PHP Room', 'html'=>'HTML Room'),
                'host'=>'http://localhost',
                'port'=>'3000',
            )
);*/

?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'ContactForm_name',
        'config'=>array(
               'action'=>Yii::app()->createUrl('site/upload'),
               'name' => 'ContactForm[name]',
               'id' => 'ContactForm_name',
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>1*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10*1024,// minimum file size in bytes
               'onSubmit'=>"js:function(id, fileName){ $('div.btn').button('loading'); }",
               'onComplete'=>"js:function(id, fileName, responseJSON){ var file = eval(responseJSON); console.log(file); $('div.btn').button('complete'); 
               					$('#image_select').attr('src', '/timeline/uploads/' + file.filename + '?' + new Date().getTime()); 
               					$('#ContactForm_name').val(file.filename); }
               					",
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               'showMessage'=>"js:function(message){ console.log(message); }"
              )
)); ?>

<a href="#" class="picProfile thumbnail"><img id="image_select" src="" width="240" /></a>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name'); ?>

    <?php echo $form->textFieldRow($model,'email'); ?>

    <?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>128)); ?>

    <?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'class'=>'span8')); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->captchaRow($model,'verifyCode',array(
            'hint'=>'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.',
        )); ?>
	<?php endif; ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Submit',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>